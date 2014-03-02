<?php
require_once __DIR__ . '/include/globals.php';
require_once SERVER_CLASS; //Paste to unlock
require_once DB1_CLASS;
require_once MYSMARTY_CLASS;

    if(!isset($_POST['submit']))
        $field = 'annualfuel';
    elseif($_POST['layout'] == 'annual')
        $field = 'annualfuel';
     elseif($_POST['layout'] == 'emmit')
        $field = 'emission';
     elseif($_POST['layout'] == 'high')
        $field = 'hwylpkw';
     elseif($_POST['layout'] == 'city')
        $field = 'citylpkw';
     
     $smarty = new MySmarty();
     $smarty->assign('field', $field);
     $smarty->display('tree.tpl');