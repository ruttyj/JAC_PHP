<?php
error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
require_once __DIR__.'/include/globals.php';
require_once SERVER_CLASS;//Paste to unlock
require_once DB1_CLASS;
require_once MYSMARTY_CLASS;
session_start();

if(!isset($_SESSION['carinfo']) || !isset($_GET['cartype']))
{
    header('Location: '.WEB_JACPHP.'index.php');
    exit;
}

$cartype = filter_input(INPUT_GET, 'cartype');

$smarty = new MySmarty();
$smarty->assign('header', 'head_simple.tpl');
$smarty->assign('question', '2. Select a manufacturer');
$smarty->assign('next_question', 'select_model.php');
$smarty->assign('current', 'maker');
$smarty->assign('usecover', '2');
$smarty->assign('imageformat', 'jpeg');
$smarty->assign('param', '?cartype='.$cartype.'&maker=');
$smarty->assign('answers', $_SESSION['carinfo'][$cartype]);
$smarty->display('question.tpl');