<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/question.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178331674953133df79b74c4-26166963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b30e57666e789f5442911a7346938a67a85764c5' => 
    array (
      0 => './templates/question.tpl',
      1 => 1393773753,
      2 => 'file',
    ),
    'a9a02e96b49934ea73f862acb747581689774fc9' => 
    array (
      0 => './templates/_layout.tpl',
      1 => 1393777425,
      2 => 'file',
    ),
    '8913f48352ffd7a7ba3cddb8c622ed2ffad6b0ab' => 
    array (
      0 => './templates/nav.tpl',
      1 => 1393777956,
      2 => 'file',
    ),
    '187182987a6d7fd743601a3900e9cc5df0e61be6' => 
    array (
      0 => './templates/head_start.tpl',
      1 => 1393777641,
      2 => 'file',
    ),
    'e885c08653c05474bb620f231ff7d0898c4176ff' => 
    array (
      0 => './templates/head_leftbar.tpl',
      1 => 1393725966,
      2 => 'file',
    ),
    '7614229ef053b4ff7ad2cbf588816c6a2c939df1' => 
    array (
      0 => './templates/head_rightbar.tpl',
      1 => 1393725958,
      2 => 'file',
    ),
    '65662870e3401eea7df035208d3dcb3090cc022e' => 
    array (
      0 => './templates/head_simple.tpl',
      1 => 1393725856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178331674953133df79b74c4-26166963',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53133df7c6b360_20140738',
  'variables' => 
  array (
    'HELIOS' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53133df7c6b360_20140738')) {function content_53133df7c6b360_20140738($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_start.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '178331674953133df79b74c4-26166963');
content_53135d26ee7fa3_79054773($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_start.tpl" */?>
    <?php  } else { if (!isset($_smarty_tpl->tpl_vars['header'])) $_smarty_tpl->tpl_vars['header'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['header']->value = 'head_leftbar.tpl') {?>
        <?php /*  Call merged included template "head_leftbar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_leftbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '178331674953133df79b74c4-26166963');
content_53135d26efe445_52167450($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_leftbar.tpl" */?>
    <?php  } else { if (!isset($_smarty_tpl->tpl_vars['header'])) $_smarty_tpl->tpl_vars['header'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['header']->value = 'head_rightbar.tpl') {?>
        <?php /*  Call merged included template "head_rightbar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_rightbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '178331674953133df79b74c4-26166963');
content_53135d26f12c33_96680405($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_rightbar.tpl" */?>
    <?php } else { ?>
        <?php /*  Call merged included template "head_simple.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_simple.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '178331674953133df79b74c4-26166963');
content_53135d26f27c39_96102652($_smarty_tpl);
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
#banner" class="image featured"><img src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
images/pic01.jpg" alt="Submit Form" /></a>
                    <header>
                        <h3><a href="#"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</a></h3>
                    </header>
                    <p>Description</p>							
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
                                <h3>Designed for&nbsp;&nbsp;<a href="https://www.canadianopendataexperience.com/"><img src="<?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>
images/code_white.png" height="32" width="40" style="margin-bottom: -6px;" /> CODE</a></h3>
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
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/head_start.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135d26ee7fa3_79054773')) {function content_53135d26ee7fa3_79054773($_smarty_tpl) {?><body class="homepage">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '178331674953133df79b74c4-26166963');
content_53135d26eebf38_62660861($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div><?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135d26eebf38_62660861')) {function content_53135d26eebf38_62660861($_smarty_tpl) {?><!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
index.php">Home</a></li>
        <li>
            <span>Preset Selections</span>
            <ul>
                <li><a href="#">Most fuel efficent</a></li>
                <li><a href="#">Most highway milage</a></li>
                <li><a href="#">Most city milage</a></li>
                <li>
                    <span>And a submenu &hellip;</span>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Phasellus consequat</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam dolore nisl</a></li>
                    </ul>
                </li>
                <li><a href="#">Least CO2 emissions</a></li>
            </ul>
        </li>
        <li><a href="popular.html">Popular</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
tree.php">Browse Car data</a></li>
    </ul>
</nav><?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/head_leftbar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135d26efe445_52167450')) {function content_53135d26efe445_52167450($_smarty_tpl) {?><body class="left-sidebar">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '178331674953133df79b74c4-26166963');
content_53135d26f02076_06368343($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135d26f02076_06368343')) {function content_53135d26f02076_06368343($_smarty_tpl) {?><!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
index.php">Home</a></li>
        <li>
            <span>Preset Selections</span>
            <ul>
                <li><a href="#">Most fuel efficent</a></li>
                <li><a href="#">Most highway milage</a></li>
                <li><a href="#">Most city milage</a></li>
                <li>
                    <span>And a submenu &hellip;</span>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Phasellus consequat</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam dolore nisl</a></li>
                    </ul>
                </li>
                <li><a href="#">Least CO2 emissions</a></li>
            </ul>
        </li>
        <li><a href="popular.html">Popular</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
tree.php">Browse Car data</a></li>
    </ul>
</nav><?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/head_rightbar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135d26f12c33_96680405')) {function content_53135d26f12c33_96680405($_smarty_tpl) {?><body class="right-sidebar">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '178331674953133df79b74c4-26166963');
content_53135d26f164f3_88099429($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135d26f164f3_88099429')) {function content_53135d26f164f3_88099429($_smarty_tpl) {?><!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
index.php">Home</a></li>
        <li>
            <span>Preset Selections</span>
            <ul>
                <li><a href="#">Most fuel efficent</a></li>
                <li><a href="#">Most highway milage</a></li>
                <li><a href="#">Most city milage</a></li>
                <li>
                    <span>And a submenu &hellip;</span>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Phasellus consequat</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam dolore nisl</a></li>
                    </ul>
                </li>
                <li><a href="#">Least CO2 emissions</a></li>
            </ul>
        </li>
        <li><a href="popular.html">Popular</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
tree.php">Browse Car data</a></li>
    </ul>
</nav><?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/head_simple.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135d26f27c39_96102652')) {function content_53135d26f27c39_96102652($_smarty_tpl) {?><body class="no-sidebar">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '178331674953133df79b74c4-26166963');
content_53135d26f2c004_21360486($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:32:38
         compiled from "./templates/nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135d26f2c004_21360486')) {function content_53135d26f2c004_21360486($_smarty_tpl) {?><!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
index.php">Home</a></li>
        <li>
            <span>Preset Selections</span>
            <ul>
                <li><a href="#">Most fuel efficent</a></li>
                <li><a href="#">Most highway milage</a></li>
                <li><a href="#">Most city milage</a></li>
                <li>
                    <span>And a submenu &hellip;</span>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Phasellus consequat</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam dolore nisl</a></li>
                    </ul>
                </li>
                <li><a href="#">Least CO2 emissions</a></li>
            </ul>
        </li>
        <li><a href="popular.html">Popular</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
tree.php">Browse Car data</a></li>
    </ul>
</nav><?php }} ?>
