<?php
define('HELIOS', __DIR__.'/../content/helios');
define('INCLUDES', __DIR__.'/');

define('TEMPLATES', __DIR__.'/../templates');
define('TEMPLATES_C', TEMPLATES.'/templates_c');

define('SMARTY_CLASS', __DIR__.'/Smarty-3.1.16/libs/Smarty.class.php');
define('MYSMARTY_CLASS', __DIR__.'/MySmarty.class.php');

define('SERVER_CLASS', __DIR__.'/OpenData/lib/server.class.php');
define('DB1_CLASS', __DIR__.'/OpenData/lib/db1.class.php');


//============================
//      EASYPHP CREDENTIALS
//============================
$DBc = array(
	'host'		=>	'127.0.0.1',
	'username'	=>	'jacphp',
	'password'	=>	'kittens',
	'database'	=>	'jacphp',
);

//============================
//      MAMP CREDENTIALS
//============================
/*$DBc = array(
	'host'		=>	'127.0.0.1',
	'username'	=>	'root',
	'password'	=>	'root',
	'database'	=>	'jacphp',
);*/



define('CONTAINING_DIR', 'CODE/');              //DIR the site is contained in, path from host root
define('WEB_HOST', $_SERVER['HTTP_HOST'].'/');  //Dynamicly fetch host name

define('WEB_ROOT', 'http://'.WEB_HOST.CONTAINING_DIR);
define('WEB_JACPHP', WEB_ROOT.'jacphp/');
define('WEB_CONTENT', WEB_JACPHP.'content/');
define('WEB_HELIOS', WEB_CONTENT.'helios/');