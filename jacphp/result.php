<?php
error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
require_once __DIR__.'/include/globals.php';
require_once INCLUDES.'TransTranslate.func.php';
require_once INCLUDES.'FuelTranslate.func.php';
require_once SERVER_CLASS;//Paste to unlock
require_once DB1_CLASS;
require_once MYSMARTY_CLASS;

if (!isset($_GET['cartype']) || !isset($_GET['maker']) || !isset($_GET['model']) || !isset($_GET['year']))
{
    header('Location: '.WEB_JACPHP.'index.php');
    exit;
}

$DB = new DB1($DBc);
$DB->OpenConnection(); 

//accociative select all
$fetchParams = array(
    'table'             =>	'records',
    'select_items'	=>	[   'year', 'maker', 'model', 'cartype', 'engine',
                                    'cylinders', 'transmission', 'fueltype', 'citylpkw',
                                    'hwylpkw', 'annualfuel', 'emission', 'img'  ],
    'where_items'       =>      [   'cartype'   => filter_input(INPUT_GET, 'cartype'),
                                    'maker'     => filter_input(INPUT_GET, 'maker'),
                                    'model'     => filter_input(INPUT_GET, 'model'),
                                    'year'      => filter_input(INPUT_GET, 'year')   ]
);

$result = $DB->FetchRow($fetchParams);	


foreach ($result as $key => $item)
{
    $result[$key]['transmission'] = TransTranslate($item['transmission']);
    $result[$key]['fueltype'] = FuelTranslate($item['fueltype']);
    if (empty($result[$key]['img'])) {
        $result[$key]['img'] = WEB_CONTENT.'images/missing_car.png';
    }
}

$smarty = new MySmarty();
//$smarty->assign('param', '?cartype='.$cartype.'&maker='.$maker.'&model='.$model.'&year='.$year);
$smarty->assign('res', $result);
$smarty->display('result.tpl');