<?php
session_start();
error_reporting(0);
//date_default_timezone_get('Asia/Kolkata');
ini_set('date.timezone', 'Asia/Kolkata');

spl_autoload_register(function ($class_name) {
	include "classes/" . $class_name . '.php';
});
//include_once '../vendor/autoload.php';
//include_once 'barcode128.php';
global $pagename;
global $CONFIG_;
$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$pagename = $parts[count($parts) - 1];

/************************************/
/* global functions                 */
/************************************/
function hex2dec($color = "#000000") {
	$tbl_color = array();
	$tbl_color['R'] = hexdec(substr($color, 1, 2));
	$tbl_color['G'] = hexdec(substr($color, 3, 2));
	$tbl_color['B'] = hexdec(substr($color, 5, 2));
	return $tbl_color;
}

function px2mm($px) {
	return $px * 25.4 / 72;
}

function txtentities($html) {
	$trans = get_html_translation_table(HTML_ENTITIES);
	$trans = array_flip($trans);
	return strtr($html, $trans);
}
function numberFormat($number){
	$result=number_format($number,2);
	return $result;
}
function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}
function itemCodeFormat($item_code){
	$prefix='';
	$len=strlen($item_code);
	if($len<6){
	for($i=1;$i<=(6-$len);$i++){
		$prefix=$prefix."0";
	}
	$i_code=$prefix.$item_code;
	}else
	{
	$i_code=$prefix.$item_code;
	}
	return $i_code;
}
?>