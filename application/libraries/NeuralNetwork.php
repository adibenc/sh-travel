<?php

// translated from https://github.com/jgabriellima/backpropagation

class NeuralNetwork{
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
                $ar[] = $random ? self::getRand(-0.2, 0.2, 3) : $fill;
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
        return;
    }

    public function backPropagate($target){
        return;
    }

    public function train($patterns, $iter=1000, $N=0, $M=0.1){
        return;
    }

    public function test($patterns){
        return;
    }
}