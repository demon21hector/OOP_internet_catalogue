<?php
/* Smarty version 3.1.29, created on 2017-06-20 13:55:51
  from "E:\xampp\htdocs\myshop.local\views\admin\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59490d471d81d0_99493668',
  'file_dependency' => 
  array (
    '9de39d31ba9ae804b0e3550607183e88a987ca84' => 
    array (
      0 => 'E:\\xampp\\htdocs\\myshop.local\\views\\admin\\admin.tpl',
      1 => 1497959739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59490d471d81d0_99493668 ($_smarty_tpl) {
?>
<div id="blockNewCategory">
    New category:
    <input name="newCategoryName" id="newCategoryName" type="text" value="" />
    <input type="button" onclick="newCategory();" value="Add category" />
    <br />
    
    Is undercategory for:
    <select name="generalCatId">
        <option value="0">Main Category</option>
            <?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
            <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
    </select>
    
    
</div><?php }
}
