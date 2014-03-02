<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:39:20
         compiled from ".\templates\tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1381753139a912feed1-48027255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd1b2b54581af2be2be1cbcdb30f66520d60d865' => 
    array (
      0 => '.\\templates\\tree.tpl',
      1 => 1393794681,
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
  'nocache_hash' => '1381753139a912feed1-48027255',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53139a916a87b8_49949041',
  'variables' => 
  array (
    'HELIOS' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53139a916a87b8_49949041')) {function content_53139a916a87b8_49949041($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Car Picker</title>
        
    <!-- CSS Files -->
        <link type="text/css" href="http://philogb.github.io/jit/static/v20/Jit/Examples/css/base.css" rel="stylesheet" /> 
        <link type="text/css" href="http://philogb.github.io/jit/static/v20/Jit/Examples/css/Treemap.css" rel="stylesheet" />

<!--[if IE]><script language="javascript" type="text/javascript" src="../../Extras/excanvas.js"></script><![endif]-->

        <!-- JIT Library File -->
        <script language="javascript" type="text/javascript" src="http://philogb.github.io/jit/static/v20/Jit/jit-yc.js"></script>

        <!-- Example File -->
        <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
include/treescript.php?field=<?php echo $_smarty_tpl->tpl_vars['field']->value;?>
"></script>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_simple.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1381753139a912feed1-48027255');
content_5313a508472f11_96202001($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_simple.tpl" */?>
    
    <body onload="init();">
        <div id="container">

            <div id="left-container">



                <div class="text">
                    <h4>
                        Data browser   
                    </h4>    

                </div>

                <div id="id-list">
                    <table>
                        <tr>
                            <td>
                                <label for="r-sq">Squarified </label>
                            </td>
                            <td>
                                <input type="radio" id="r-sq" name="layout" checked="checked" value="left" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="r-st">Strip </label>
                            </td>
                            <td>
                                <input type="radio" id="r-st" name="layout" value="top" />
                            </td>
                            <tr>
                                <td>
                                    <label for="r-sd">SliceAndDice </label>
                                </td>
                                <td>
                                    <input type="radio" id="r-sd" name="layout" value="bottom" />
                                </td>
                            </tr>
                    </table>
                </div>
                
                <a id="back" href="javascript:void(0)" class="theme button white">Go Back</a>
            </div>

            <div id="center-container">
                <div id="infovis"></div>    
            </div>

            <div id="right-container">

                <div id="inner-details"></div>

            </div>

            <div id="log"></div>
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
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:39:20
         compiled from ".\templates\head_simple.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a508472f11_96202001')) {function content_5313a508472f11_96202001($_smarty_tpl) {?><body class="no-sidebar">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1381753139a912feed1-48027255');
content_5313a5084a1d23_21821526($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:39:20
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a5084a1d23_21821526')) {function content_5313a5084a1d23_21821526($_smarty_tpl) {?><!-- Nav -->
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
