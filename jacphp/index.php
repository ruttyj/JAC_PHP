<?php
error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
require_once __DIR__.'/include/globals.php';
require_once SERVER_CLASS;//Paste to unlock
require_once DB1_CLASS;
require_once MYSMARTY_CLASS;
ini_set('memory_limit', '640M');
session_start();

$_SESSION = array(); // Empty $_SESSION of former content.

$DB = new DB1($DBc);
$DB->OpenConnection(); 

 //==================================================================
 
//Fetch car dara ----------------------------
$fetchParams = array(
    'table' => 'records',
    'select_items' => array('year', 'maker', 'model', 'cartype', 'transmission'),
        //'row_key'       =>  'cartype',
        //'flat_result'   =>  true,
);
$fetch = $DB->FetchRow($fetchParams);

//Build array of Cars --------------------------
$A = array();
foreach ($fetch as $row) {
    $year = $row['year'];
    $model = $row['model'];
    $make = $row['maker'];
    $cartype = $row['cartype'];
    $A[$cartype][$make][$model][$year] = 1;
}
//SERVER::dump($A);
$_SESSION['carinfo'] = $A;      
        
$smarty = new MySmarty();
$smarty->assign('header', 'head_start.tpl');
$smarty->assign('question', '1. Select a class of car');
$smarty->assign('next_question', 'select_maker.php');
$smarty->assign('current', 'cartype');
$smarty->assign('usecover', '');
$smarty->assign('imageformat', 'jpg');
$smarty->assign('param', '?cartype=');
$smarty->assign('answers', $_SESSION['carinfo']);
$smarty->display('question.tpl');