<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



function viewDate($date)
{
	$date = str_replace('-', '/', $date);
	$namaBulan = array("0", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$day = date('d', strtotime($date));
	$month = date('n', strtotime($date));
	$year = date('Y', strtotime($date));
	$bulan = $namaBulan[$month];
	return $day . ' ' . $bulan . ' ' . $year;
}

function viewShortDate($date)
{
	if (empty($date) || $date == '0000-00-00') {
		return null;
	} else {
		$date = str_replace('-', '/', $date);
		$day = date('d', strtotime($date));
		$month = date('m', strtotime($date));
		$year = date('Y', strtotime($date));
		return $day . '-' . $month . '-' . $year;
	}
}

function dateFormatData($date)
{
	if (empty($date)) {
		return null;
	} else {
		// $dateArr = explode("/",$date);
		// return $dateArr[2].'-'.$dateArr[0].'-'.$dateArr[1];
		return $date;
	}
}

function dateFormatData2($date)
{
	//$date = new DateTime($date);
	return date('d-m-Y H:i:s', strtotime($date));
}

function dateFormatJS($date)
{
	if (empty($date)) {
		return null;
	} else {
		$date = str_replace('-', '/', $date);
		return date('m-d-Y', strtotime($date));
	}
}

function dateForJs($date)
{
	if (empty($date)) {
		return null;
	} else {
		$dateArr = explode("-", $date);
		return $dateArr[1] . '/' . $dateArr[2] . '/' . $dateArr[0];
	}
}

//check data/variable with treeview json
function pr($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

//////////////////////////get real max upload size////////////////////////////////
function parse_size($size)
{
	$unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
	$size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
	if ($unit) {
		// Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
		return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
	} else {
		return round($size);
	}
}

function get_max_upload_size()
{
	static $max_size = -1;

	if ($max_size < 0) {
		// Start with post_max_size.
		$post_max_size = parse_size(ini_get('post_max_size'));
		if ($post_max_size > 0) {
			$max_size = $post_max_size;
		}

		// If upload_max_size is less, then reduce. Except if upload_max_size is
		// zero, which indicates no limit.
		$upload_max = parse_size(ini_get('upload_max_filesize'));
		if ($upload_max > 0 && $upload_max < $max_size) {
			$max_size = $upload_max / 1000;
		}
	}
	return $max_size / 1024000;
}

function delete_file($file)
{
	if (file_exists($file)) {
		unlink($file);
		return true;
	} else {
		return false;
	}
}

function download_file($file, $custom_name = '')
{

	if ($custom_name == '') {
		$basename = basename($file);
	} else {
		$basename = $custom_name;
	}

	$length   = sprintf("%u", filesize($file));

	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . $basename . '"');
	header('Content-Transfer-Encoding: binary');
	header('Connection: Keep-Alive');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . $length);

	set_time_limit(0);
	readfile($file);
}
