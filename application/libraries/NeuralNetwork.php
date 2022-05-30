<?php

// translated from https://github.com/jgabriellima/backpropagation

class NeuralNetwork{
    public $alpha = 0.5;

    public $inputs;
    public $labels;
    public $outputs;

    public $ni;
    public $nh;
    public $no;
    
    public $ai;
    public $ah;
    public $ao;

    public $wi;
    public $wo;
    
    public $ci;
    public $co;

    public $outputFunc = "sigmoid";

    public $lastOutput = 0,
        $lastErr = 0,
        $lastIterErr = 0,
        $lastIter = 0;
    
    public $testResults = [];
    
    public $logs = [];

    public $iterCondition;
    public $iterAction;

    public function __construct($ni = 4, $nh = 4, $no = 4){
        #test
        // gmp_random_seed()
        $this->ni = $ni;
        $this->nh = $nh;
        $this->no = $no;
        
        $this->ai = self::makeMatrix(1, $ni, 1);
        $this->ah = self::makeMatrix(1, $nh, 1);
        $this->ao = self::makeMatrix(1, $no, 1);

        $this->wi = 1;
        $this->wo = 1;
        
        $this->ci = 1;
        $this->co = 1;

        $this->iterCondition = function($i){
            return true;
        };

        $this->iterAction = function($ins, $i){
            echo $i."<br>";
            return false;
        };
    }

    public function setFull($ni = 4, $nh = 4, $no = 4){
        $this->ni = $ni;
        $this->nh = $nh;
        $this->no = $no;

        $this->ai = self::makeMatrix(1, $ni, 1);
        $this->ah = self::makeMatrix(1, $nh, 1);
        $this->ao = self::makeMatrix(1, $no, 1);

        $this->wi = self::makeMatrix($ni, $nh, 1, true);
        $this->wo = self::makeMatrix($nh, $no, 1, true);

        $this->ci = self::makeMatrix($ni, $nh, 1, true);
        $this->co = self::makeMatrix($nh, $no, 1, true);

        return $this;
    }

    public static function sigmoid($x){
        // return math.tanh(x)
        return tanh($x);
    }
    
    public static function dsigmoid($y){
        return 1 - $y ** 2;
    }

    public static function binaryActivation($x){
        // return math.tanh(x)
        return $x > 0 ? 1 : 0;
    }
    
    public static function getRand($min=0, $max=1, $degree=1){
        return rand($min*10**$degree, $max*10**$degree) / 10**$degree;
    }

    public static function makeMatrix($i, $j, $fill=0.0, $random=false){
        $m = [];
        
        $is = 0;

        while($is < $i){
            $ar = [];
            $js = 0;
            while($js < $j){
                $ar[] = $random ? self::getRand(-0.2, 0.2, 2) : $fill;
                $js++;
            }

            if($i <= 1){
                $m = $ar;
                break;
            }else{
                $m[] = $ar;
            }

            $is++;
        }

        return $m;
    }

    public function update($input){
        $i = 0;

        // input
        while($i < $this->ni){
            $this->ai[$i] = 
                $input[$i];
            $i++;
        }

        // hidden
        $j = 0;
        while($j < $this->nh){
            $sum = 0;
            $i = 0;
            while($i < $this->ni){
                $sum += $this->ai[$i] * $this->wi[$i][$j];
                $i++;
            }
            $this->ah[$j] = self::sigmoid($sum);
            $j++;
        }

        // output
        $j = 0;
        while($j < $this->no){
            $sum = 0;
            $i = 0;
            while($i < $this->nh){
                $sum += $this->ah[$i] * $this->wo[$i][$j];
                $i++;
            }

            if($this->outputFunc == "binary") {
                $this->ao[$j] = self::binaryActivation($sum);
            } else {
                $this->ao[$j] = self::sigmoid($sum);
            }

            $j++;
        }

        return;
    }

    public function backPropagate($target, $N, $M){
        
        $outputDeltas = self::makeMatrix(1, $this->no );
        
        // calc err output
        $i = 0; while($i < $this->no){
            $cost = $target[$i] - $this->ao[$i];
            $outputDeltas[$i] = self::dsigmoid($this->ao[$i]) * $cost;
            $i++;
        }

        // calc err hidden
        # calculate error terms for hidden
        $hidden_deltas = self::makeMatrix(1, $this->nh);
        $j = 0; while($j < $this->nh){
            $cost = 0;
            $k = 0; while($k < $this->no){
                $cost += $outputDeltas[$k] * $this->wo[$j][$k];
                $k++;
            }
            $hidden_deltas[$j] = self::dsigmoid($this->ah[$j]) * $cost;
            $j++;
        }

        // update output weight
        $j = 0; while($j < $this->nh){
            $k = 0; while($k < $this->no){
                $change = $outputDeltas[$k] * $this->ah[$j];
                $this->wo[$j][$k] = 
                    $this->wo[$j][$k] + $N * $change + 
                        $M * $this->co[$j][$k];

                $this->co[$j][$k] = $change;

                $k++;
            }
            $j++;
        }

        // update input weight
        $i = 0; while($j < $this->ni){
            $j = 0; while($k < $this->nh){
                $change = $hidden_deltas[$k] * $this->ai[$j];
                $this->wi[$i][$j] = 
                    $this->wi[$i][$j] + $N * $change + 
                        $M * $this->ci[$i][$j];

                $this->ci[$i][$j] = $change;

                $j++;
            }
            $i++;
        }

        $error = 0;

        // exit;
        $i = 0; while($i < sizeof($target)){
            $error += $this->alpha * ($target[$i] - $this->ao[$i]) ** 2;
            
            $i++;
        }

        $this->setLastErr($error);

        return $this;
    }

    public function train($patterns, $iter=1000, $N=0, $M=0.1){
        # N: learning rate
        # M: momentum factor
        $iterCondition = $this->iterCondition;
        $iterAction = $this->iterAction;

        $this->setInputs(
            array_map(function($e){
                return $e[0];
            }, $patterns)
        );
        
        $this->setLabels(
            array_map(function($e){
                return $e[1];
            }, $patterns)
        );

        $i = 0; while($i < $iter){
            $err = 0;
            foreach($patterns as $idx => $p){
                $inputs = $p[0];
                $targets = $p[1];
                $this->update($inputs);
                $this->backPropagate($targets, $N, $M);
                $err += $this->lastErr;
            }

            $this->lastIterErr = $err;
            $this->lastIter = $i+1;

            if($iterCondition){
                if($iterCondition($i)){
                    $iterAction($this, $i);
                }
            }
            $i++;
        }

        return;
    }

    public function test($patterns){
        foreach($patterns as $idx => $p){
            $this->update($p[0]);
            $this->lastOutput = $this->ao;
            $this->testResults[] = $this->ao;
        }

        return;
    }

    public function saveModel($at = null){
        if(!$at){
            $date = date("Y-m-d");
            $at = __DIR__."/dummy-$date-model-nn-wisata";
        }

        $t1 = $this->iterCondition;
        $t2 = $this->iterAction;
        
        unset($this->iterCondition);
        unset($this->iterAction);

        $s = serialize($this);
        file_put_contents($at, $s);

        $this->iterCondition = $t1;
        $this->iterAction = $t2;

        return true;
    }

    /**
     * Get the value of lastErr
     */ 
    public function getLastErr()
    {
        return $this->lastErr;
    }

    /**
     * Set the value of lastErr
     *
     * @return  self
     */ 
    public function setLastErr($lastErr)
    {
        $this->lastErr = $lastErr;

        return $this;
    }

    /**
     * Get the value of inputs
     */ 
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * Set the value of inputs
     *
     * @return  self
     */ 
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;

        return $this;
    }

    /**
     * Get the value of outputs
     */ 
    public function getOutputs()
    {
        return $this->outputs;
    }

    /**
     * Set the value of outputs
     *
     * @return  self
     */ 
    public function setOutputs($outputs)
    {
        $this->outputs = $outputs;

        return $this;
    }

    /**
     * Get the value of labels
     */ 
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Set the value of labels
     *
     * @return  self
     */ 
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * Get the value of outputFunc
     */ 
    public function getOutputFunc()
    {
        return $this->outputFunc;
    }

    /**
     * Set the value of outputFunc
     *
     * @return  self
     */ 
    public function setOutputFunc($outputFunc)
    {
        $this->outputFunc = $outputFunc;

        return $this;
    }
}