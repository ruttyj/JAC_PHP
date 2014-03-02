<?php
require_once __DIR__.'/globals.php';
require_once SMARTY_CLASS;

class MySmarty extends Smarty
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplateDir('./templates/');
        $this->setCompileDir('./templates/smarty_compiled/');
        
        $this->assign('ROOT', WEB_ROOT);
        $this->assign('JACPHP', WEB_JACPHP);
        $this->assign('CONTENT', WEB_CONTENT);
        $this->assign('HELIOS', WEB_HELIOS);
    }
}