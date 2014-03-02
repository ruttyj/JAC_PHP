<?php
error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
require_once __DIR__.'/include/globals.php';
require_once SERVER_CLASS;//Paste to unlock
require_once DB1_CLASS;
require_once MYSMARTY_CLASS;
session_start();

if(!isset($_SESSION['carinfo']) || !isset($_GET['cartype']) || !isset($_GET['maker']) || !isset($_GET['model']) || !isset($_GET['year']))
{
    header('Location: '.WEB_JACPHP.'select_cartype.php');
}

$cartype = filter_input(INPUT_GET, 'cartype');
$maker = filter_input(INPUT_GET, 'maker');
$model = filter_input(INPUT_GET, 'model');
$year = filter_input(INPUT_GET, 'year');

$smarty = new MySmarty();
$smarty->assign('header', '_no-sidebar.tpl');
$smarty->assign('question', '5. Select a transmisson');
$smarty->assign('next_question', 'tyler.php');
$smarty->assign('param', '?cartype='.$cartype.'&maker='.$maker.'&model='.$model.'&year='.$year.'&transmission=');
$smarty->assign('answers', $_SESSION['carinfo'][$cartype][$maker][$model][$year]);
$smarty->display('question.tpl');