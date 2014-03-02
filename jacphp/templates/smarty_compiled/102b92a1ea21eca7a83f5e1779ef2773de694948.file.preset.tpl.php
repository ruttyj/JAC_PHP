<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:39:27
         compiled from ".\templates\preset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1889353137c805a5b43-04180342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '102b92a1ea21eca7a83f5e1779ef2773de694948' => 
    array (
      0 => '.\\templates\\preset.tpl',
      1 => 1393789463,
      2 => 'file',
    ),
    '86ae7559e833dd82a4a7f379860ccab633513075' => 
    array (
      0 => '.\\templates\\_layout.tpl',
      1 => 1393783281,
      2 => 'file',
    ),
    '78dfd564017866b2a07d32220e5f711a454b3ecb' => 
    array (
      0 => '.\\templates\\nav.tpl',
      1 => 1393795155,
      2 => 'file',
    ),
    '709e458e8200583bcddf66b9278f333e124110a6' => 
    array (
      0 => '.\\templates\\head_simple.tpl',
      1 => 1393779314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1889353137c805a5b43-04180342',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53137c80aaed76_38770493',
  'variables' => 
  array (
    'HELIOS' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53137c80aaed76_38770493')) {function content_53137c80aaed76_38770493($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Find a Car</title>
        
            <meta name="description" content="" />
            <meta name="keywords" content="" />
            <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css" />
            <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/jquery.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/jquery.dropotron.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/skel.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/skel-panels.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/init.js"></script>

            <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>
images/jacphp.png" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
css/skel-noscript.css" type="text/css" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
css/style.css" type="text/css" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
css/style-desktop.css" type="text/css" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
css/style-noscript.css" type="text/css" />

            <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
        
    </head>
    
    <?php /*  Call merged included template "head_simple.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_simple.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1889353137c805a5b43-04180342');
content_5313a50f6d2024_67107843($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_simple.tpl" */?>

    
    <!-- Banner -->
    <a name="banner"></a>
    <div id="banner">
        <h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['question']->value)===null||$tmp==='' ? 'Error' : $tmp);?>
</h2>
    </div>

    <!-- Carousel -->
    <div class="carousel">
        <div class="reel">

            <?php  $_smarty_tpl->tpl_vars['car'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['car']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['car']->key => $_smarty_tpl->tpl_vars['car']->value) {
$_smarty_tpl->tpl_vars['car']->_loop = true;
?>
                <article>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
result.php?cartype=<?php echo $_smarty_tpl->tpl_vars['car']->value['cartype'];?>
&maker=<?php echo $_smarty_tpl->tpl_vars['car']->value['maker'];?>
&model=<?php echo $_smarty_tpl->tpl_vars['car']->value['model'];?>
&year=<?php echo $_smarty_tpl->tpl_vars['car']->value['year'];?>
#banner" class="image featured"><div class='carimage' style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['car']->value['img'];?>
');"></div></a>
                        <header>
                            <h4><a href="#"><?php echo $_smarty_tpl->tpl_vars['car']->value['year'];?>
 <?php echo $_smarty_tpl->tpl_vars['car']->value['maker'];?>
 <?php echo $_smarty_tpl->tpl_vars['car']->value['model'];?>
</a></h4>
                        </header>
                        <p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['description']->value)===null||$tmp==='' ? 'Description' : $tmp);?>
</p>						
                </article>
            <?php } ?>

        </div>
    </div>

    <!-- Footer -->
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="12u">

                        <!-- Contact -->
                        <section class="contact">
                            <header>
                                <h3><a class="red" href="https://www.canadianopendataexperience.com/">Designed for <span class="codeicon" href="https://www.canadianopendataexperience.com/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> CODE</a></h3>
                            </header>
                            <p>Developped by Tyler Lauzon, Marek Philibert, and Jordan Rutty.</p>
                            <ul class="icons">
                                <li><a href="https://twitter.com/FindaCarWebsite" class="fa fa-twitter solo"><span>Twitter</span></a></li>
                                <li><a href="https://facebook.com/FindaCarWebsite" class="fa fa-facebook solo"><span>Facebook</span></a></li>
                                <!--<li><a href="#" class="fa fa-google-plus solo"><span>Google+</span></a></li>
                                <li><a href="#" class="fa fa-pinterest solo"><span>Pinterest</span></a></li>
                                <li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
                                <li><a href="#" class="fa fa-linkedin solo"><span>Linkedin</span></a></li>-->
                            </ul>
                        </section>

                        <!-- Copyright -->
                        <div class="copyright">
                            <ul class="menu">
                                <li>&copy; JAC PHP. All rights reserved.</li>
                                <li>Design: <a href="http://html5up.net/">HTML5 UP</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:39:27
         compiled from ".\templates\head_simple.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a50f6d2024_67107843')) {function content_5313a50f6d2024_67107843($_smarty_tpl) {?><body class="no-sidebar">

    <!-- Header -->
    <div id="header">

        <!-- Inner -->
        <div class="inner">
            <header>
                <h1><a href="#" id="logo">Find a Car</a></h1>
            </header>
        </div>

        <?php /*  Call merged included template "nav.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1889353137c805a5b43-04180342');
content_5313a50f6fcfb5_54140206($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:39:27
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a50f6fcfb5_54140206')) {function content_5313a50f6fcfb5_54140206($_smarty_tpl) {?><!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
index.php">Find a Car</a></li>
        <li>
            <span>Preset Selections</span>
            <ul>
                <li>
                    <span>Fuel Efficiency &hellip;</span>
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
preset.php?by=annualfuel">Annual</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
preset.php?by=citylpkw">City Driving</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
preset.php?by=hwylpkw">Highway Driving</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
preset.php?by=emission">Least CO2 Emissions</a></li>
            </ul>
        </li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
tree.php">Browse Car Data</a></li>
    </ul>
</nav><?php }} ?>
