<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\question.tpl" */ ?>
<?php /*%%SmartyHeaderCode:782053126b3b645c06-84152120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cd0d4d3321283f22761f3ac03d69316c2fc7acb' => 
    array (
      0 => '.\\templates\\question.tpl',
      1 => 1393796273,
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
    'beb4080d7465beda1c4c269975c637796bfbdd65' => 
    array (
      0 => '.\\templates\\head_start.tpl',
      1 => 1393779314,
      2 => 'file',
    ),
    'c0e3e6547554bf72dd58d219cd624a24947f1d0f' => 
    array (
      0 => '.\\templates\\head_leftbar.tpl',
      1 => 1393779314,
      2 => 'file',
    ),
    'c3d0f23a5fff8ad51f85ecc9e800d10b9ee94060' => 
    array (
      0 => '.\\templates\\head_rightbar.tpl',
      1 => 1393779314,
      2 => 'file',
    ),
    '709e458e8200583bcddf66b9278f333e124110a6' => 
    array (
      0 => '.\\templates\\head_simple.tpl',
      1 => 1393779314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '782053126b3b645c06-84152120',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53126b3b9d00d9_89026040',
  'variables' => 
  array (
    'HELIOS' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53126b3b9d00d9_89026040')) {function content_53126b3b9d00d9_89026040($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
    
    <?php if ($_smarty_tpl->tpl_vars['header']->value==='head_start.tpl') {?>
        <?php /*  Call merged included template "head_start.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_start.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '782053126b3b645c06-84152120');
content_5313a4b98d2138_85315249($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_start.tpl" */?>
    <?php  } else { if (!isset($_smarty_tpl->tpl_vars['header'])) $_smarty_tpl->tpl_vars['header'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['header']->value = 'head_leftbar.tpl') {?>
        <?php /*  Call merged included template "head_leftbar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_leftbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '782053126b3b645c06-84152120');
content_5313a4b99a11e1_09315901($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_leftbar.tpl" */?>
    <?php  } else { if (!isset($_smarty_tpl->tpl_vars['header'])) $_smarty_tpl->tpl_vars['header'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['header']->value = 'head_rightbar.tpl') {?>
        <?php /*  Call merged included template "head_rightbar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_rightbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '782053126b3b645c06-84152120');
content_5313a4b9a5ca19_89067107($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_rightbar.tpl" */?>
    <?php } else { ?>
        <?php /*  Call merged included template "head_simple.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_simple.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '782053126b3b645c06-84152120');
content_5313a4b9b10536_20966909($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_simple.tpl" */?>
    <?php }}}?>

    
    <!-- Banner -->
    <a name="banner"></a>
    <div id="banner">
        <h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['question']->value)===null||$tmp==='' ? 'Error' : $tmp);?>
</h2>
    </div>

    <!-- Carousel -->
    <div class="carousel">
        <div class="reel">

            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['answers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <article>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
<?php echo $_smarty_tpl->tpl_vars['next_question']->value;?>
<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
#banner" class="image featured"><?php if (isset($_smarty_tpl->tpl_vars['current']->value)) {?><div class='carimage<?php echo $_smarty_tpl->tpl_vars['usecover']->value;?>
' style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>
images/<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['imageformat']->value;?>
');"></div><?php }?></a>
                    <header>
                        <h3><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
<?php echo $_smarty_tpl->tpl_vars['next_question']->value;?>
<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
#banner"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</a></h3>
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
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\head_start.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a4b98d2138_85315249')) {function content_5313a4b98d2138_85315249($_smarty_tpl) {?><body class="homepage">

    <!-- Header -->
    <div id="header">

        <!-- Inner -->
        <div class="inner">
            <header>
                <h1><a href="#" id="logo">Find a Car</a></h1>
                <hr />
                <span class="byline">Easy Car-Finding Questionnaire</span>
            </header>
            <footer>
                <a href="#banner" class="button circled scrolly">Start</a>
            </footer>
        </div>

        <?php /*  Call merged included template "nav.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '782053126b3b645c06-84152120');
content_5313a4b98f9234_36462921($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div><?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a4b98f9234_36462921')) {function content_5313a4b98f9234_36462921($_smarty_tpl) {?><!-- Nav -->
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
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\head_leftbar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a4b99a11e1_09315901')) {function content_5313a4b99a11e1_09315901($_smarty_tpl) {?><body class="left-sidebar">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '782053126b3b645c06-84152120');
content_5313a4b99c82e8_47148295($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a4b99c82e8_47148295')) {function content_5313a4b99c82e8_47148295($_smarty_tpl) {?><!-- Nav -->
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
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\head_rightbar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a4b9a5ca19_89067107')) {function content_5313a4b9a5ca19_89067107($_smarty_tpl) {?><body class="right-sidebar">

		<!-- Header -->
			<div id="header">

				<!-- Inner -->
					<div class="inner">
						<header>
							<h1><a href="#" id="logo">Helios</a></h1>
						</header>
					</div>

        <?php /*  Call merged included template "nav.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '782053126b3b645c06-84152120');
content_5313a4b9a83b15_29955934($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a4b9a83b15_29955934')) {function content_5313a4b9a83b15_29955934($_smarty_tpl) {?><!-- Nav -->
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
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\head_simple.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a4b9b10536_20966909')) {function content_5313a4b9b10536_20966909($_smarty_tpl) {?><body class="no-sidebar">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '782053126b3b645c06-84152120');
content_5313a4b9b37642_70789822($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:38:01
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a4b9b37642_70789822')) {function content_5313a4b9b37642_70789822($_smarty_tpl) {?><!-- Nav -->
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
