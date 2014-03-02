<?php
error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
require_once __DIR__.'/include/globals.php';
require_once SERVER_CLASS;//Paste to unlock
require_once DB1_CLASS;
require_once MYSMARTY_CLASS;
session_start();

if(!isset($_SESSION['carinfo']) || !isset($_GET['cartype']) || !isset($_GET['maker']) || !isset($_GET['model'] ))
{
    header('Location: '.WEB_JACPHP.'index.php');
    exit;
}

$cartype = filter_input(INPUT_GET, 'cartype');
$maker = filter_input(INPUT_GET, 'maker');
$model = filter_input(INPUT_GET, 'model');

$smarty = new MySmarty();
$smarty->assign('header', 'head_simple.tpl');
$smarty->assign('question', '4. Select a year');
$smarty->assign('usecover', '');
$smarty->assign('next_question', 'result.php');
$smarty->assign('param', '?cartype='.$cartype.'&maker='.$maker.'&model='.$model.'&year=');
$smarty->assign('answers', $_SESSION['carinfo'][$cartype][$maker][$model]);
$smarty->display('question.tpl');