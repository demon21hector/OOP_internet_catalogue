<?php
/* Smarty version 3.1.29, created on 2017-06-29 00:09:36
  from "E:\xampp\htdocs\myshop.local\views\admin\adminCategory.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595429205c73f2_50897401',
  'file_dependency' => 
  array (
    '4099c902b43d5a0fd7e4e3f14e95c1fbfb565031' => 
    array (
      0 => 'E:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminCategory.tpl',
      1 => 1498687774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595429205c73f2_50897401 ($_smarty_tpl) {
?>
<h2>Categories</h2>
<table border="1" cellpadding="1" cellspacing="1">
    <tr>
        <th>#</th>
        <th>ID</th>
        <th>Name</th>
        <th>Parent Category</th>
        <th>Action</th>
    </tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_categories_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_categories']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categories'] : false;
$__foreach_categories_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_categories'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']++;
$__foreach_categories_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
        <tr>
            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration'] : null);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
            <td><input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"</td>
            <td>
                <select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <option value="0">Main Category</option>
                    <?php
$_from = $_smarty_tpl->tpl_vars['rsMainCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_mainItem_1_saved_item = isset($_smarty_tpl->tpl_vars['mainItem']) ? $_smarty_tpl->tpl_vars['mainItem'] : false;
$_smarty_tpl->tpl_vars['mainItem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['mainItem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->value) {
$_smarty_tpl->tpl_vars['mainItem']->_loop = true;
$__foreach_mainItem_1_saved_local_item = $_smarty_tpl->tpl_vars['mainItem'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id'] == $_smarty_tpl->tpl_vars['mainItem']->value['id']) {?> selected="1" <?php }?>><?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>
 </option>
                    <?php
$_smarty_tpl->tpl_vars['mainItem'] = $__foreach_mainItem_1_saved_local_item;
}
if ($__foreach_mainItem_1_saved_item) {
$_smarty_tpl->tpl_vars['mainItem'] = $__foreach_mainItem_1_saved_item;
}
?>
                </select>
            </td>
            <td>
                <input type="button" value="Save" onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
            </td>
        </tr>
    <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_categories_0_saved_local_item;
}
if ($__foreach_categories_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_categories'] = $__foreach_categories_0_saved;
}
if ($__foreach_categories_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_categories_0_saved_item;
}
?>
</table><?php }
}
