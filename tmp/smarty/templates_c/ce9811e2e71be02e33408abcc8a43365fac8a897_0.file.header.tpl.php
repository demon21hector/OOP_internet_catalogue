<?php
/* Smarty version 3.1.29, created on 2017-06-13 19:16:18
  from "E:\xampp\htdocs\myshop.local\views\default\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59401de272f361_89642574',
  'file_dependency' => 
  array (
    'ce9811e2e71be02e33408abcc8a43365fac8a897' => 
    array (
      0 => 'E:\\xampp\\htdocs\\myshop.local\\views\\default\\header.tpl',
      1 => 1468593234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_59401de272f361_89642574 ($_smarty_tpl) {
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
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>
</head>
<body>

<div id="header">
    <h1>myshop</h1>
</div>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div id="centerColumn"><?php }
}
