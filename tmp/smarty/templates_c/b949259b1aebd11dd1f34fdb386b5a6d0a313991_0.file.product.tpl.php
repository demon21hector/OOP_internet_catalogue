<?php
/* Smarty version 3.1.29, created on 2016-07-17 15:05:35
  from "D:\xampp\htdocs\myshop.local\views\default\product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578b829f748147_85239120',
  'file_dependency' => 
  array (
    'b949259b1aebd11dd1f34fdb386b5a6d0a313991' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop.local\\views\\default\\product.tpl',
      1 => 1468760729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578b829f748147_85239120 ($_smarty_tpl) {
?>

<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>
<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" width="575">
Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a href="#" alt="Убрать из корзины"  <?php if ($_smarty_tpl->tpl_vars['inCart']->value == 0) {?>class="hideme"<?php }?> id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;">Убрать из корзины</a>
<a href="#" alt="Добавить в корзину" <?php if ($_smarty_tpl->tpl_vars['inCart']->value == 1) {?>class="hideme"<?php }?> id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;">Добавить в корзину</a>
<p>Описание<br /><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }
}
