<?php
/* Smarty version 3.1.29, created on 2017-06-20 13:48:45
  from "E:\xampp\htdocs\myshop.local\views\admin\adminHeader.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59490b9d0a2a04_66732320',
  'file_dependency' => 
  array (
    '4b317a54bc7008490accec7310d24e542daed6f6' => 
    array (
      0 => 'E:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminHeader.tpl',
      1 => 1497959322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftcoloumn.tpl' => 1,
  ),
),false)) {
function content_59490b9d0a2a04_66732320 ($_smarty_tpl) {
?>

<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-3.0.0.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/admin.js"><?php echo '</script'; ?>
>
    </head>
    
    <body>
        <div id="header">
            <h1>Site administration panel</h1>
        </div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:adminLeftcoloumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="centerColumn">   <?php }
}
