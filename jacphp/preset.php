<?php
error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
require_once __DIR__.'/include/globals.php';
require_once SERVER_CLASS;//Paste to unlock
require_once DB1_CLASS;
require_once MYSMARTY_CLASS;
ini_set('memory_limit', '640M');
session_start();

$_SESSION = array(); // Empty $_SESSION of former content.

switch ($_GET['by'])
{
    case 'citylpkw':
        $question = 'Best City Fuel Consumption';
        $get = $_GET['by'];
        continue;
    case 'hwylpkw':
        $question = 'Best Highway Fuel Consumption';
        $get = $_GET['by'];
        continue;
    case 'annualfuel':
        $question = 'Best Annual Fuel Consumption';
        $get = $_GET['by'];
        continue;
    case 'emission':
        $question = 'Least CO2 Emissions';
        $get = $_GET['by'];
        continue;
    default:
        header('Location: '.WEB_JACPHP.'index.php');
        exit;
}

$DB = new DB1($DBc);
$DB->OpenConnection(); 

 //==================================================================
 
//Fetch car dara ----------------------------
$fetchParams = array(
    'table' => 'records',
    'select_items' => array($get, 'year', 'maker', 'model', 'cartype', 'img'),
    'order_by' => $get.' ASC',
    'limit' => '0,10'
        //'row_key'       =>  'cartype',
        //'flat_result'   =>  true,
);
$fetch = $DB->FetchRow($fetchParams);

//Build array of Cars --------------------------
$A = array();
foreach ($fetch as $row) {
    $choice = $row[$get];
    $year = $row['year'];
    $model = $row['model'];
    $maker = $row['maker'];
    $cartype = $row['cartype'];
    if (empty($row['img'])) {
        $img = WEB_CONTENT.'images/missing_car.png';
    } else {
        $img = $row['img'];
    }
    $A[$choice.$cartype.$make.$model.$year] = [ $get => $choice, 'year' => $year, 'model' => $model, 'maker' => $maker, 'cartype' => $cartype, 'img' => $img];
}
//SERVER::dump($A);
             
$smarty = new MySmarty();
$smarty->assign('header', 'head_start.tpl');
$smarty->assign('question', $question);
$smarty->assign('results', $A);
$smarty->display('preset.tpl');