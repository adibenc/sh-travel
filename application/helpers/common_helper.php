<?php

function encrypt_url($string)
{

	$output = false;
	/*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */
	// $security       = parse_ini_file("security.ini");
	$secret_key     = '7CxwUIuKrI7wUAGe';
	$secret_iv      = '2456378494765431';
	$encrypt_method = 'aes-256-cbc';

	// hash
	$key    = hash("sha256", $secret_key);

	// iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
	$iv     = substr(hash("sha256", $secret_iv), 0, 16);

	//do the encryption given text/string/number
	$result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	$output = base64_encode($result);
	return $output;
}



function decrypt_url($string)
{

	$output = false;
	/*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */

	$secret_key     = '7CxwUIuKrI7wUAGe';
	$secret_iv      = '2456378494765431';
	$encrypt_method = 'aes-256-cbc';

	// hash
	$key    = hash("sha256", $secret_key);

	// iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
	$iv = substr(hash("sha256", $secret_iv), 0, 16);

	//do the decryption given text/string/number

	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	return $output;
}

function rest_response($code, $response = '')
{
	$CI =&get_instance();
	$CI->output
	        ->set_status_header($code)
			->set_content_type('application/json', 'utf-8')
	        ->set_output(json_encode($response),JSON_PRETTY_PRINT)
	        ->_display();
	exit;
}

function pr($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

if (!function_exists('preout')) {
    function preout($v)
    {
        echo "<pre>";
        var_dump($v);
        echo "</pre>";
    }
}

if (!function_exists('preson')) {
    function preson($v)
    {
        echo "<pre>";
        echo json_encode($v,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        echo "</pre>";
    }
}

if (!function_exists('presonRet')) {
    function presonRet($v)
    {
        return json_encode($v,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}

if (!function_exists('lq')) {
    function lq($ctx)
    {
        echo $ctx->db->last_query();
    }
}

if (!function_exists('noHtml')) {
    function noHtml($data = ""){
        return preg_replace('/<(\w+)\b(?:\s+[\w\-.:]+(?:\s*=\s*(?:"[^"]*"|"[^"]*"|[\w\-.:]+))?)*\s*\/?>\s*<\/\1\s*>/', "", $data);
    }
}

if (!function_exists('jsonResponse')) {
    function jsonResponse($respCode,$msg,$data, $fmt=true)
    {
        if($fmt){
            $r = [
                'status' => $respCode ,
                'message' => $msg ,
                'data' => $data
            ];
        }else{
            $r = $data;
        }

        $CI = &get_instance();
        $CI->output
            ->set_status_header($respCode)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($r));
    }
}

if (!function_exists('toFile')) {
    function toFile($content = "cnt", $file = "file")
    {
        $f = fopen($file, "w");
        fwrite($f,$content);
        fclose($f);
        return true;
    }
}

if (!function_exists('arrayGet')) {
    function arrayGet($array, $key, $default = NULL)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}

if (!function_exists('sbadmin')) {
    function sbadmin($file)
    {
        return base_url($file);
    }
}