<?php
/* Smarty version 3.1.29, created on 2017-07-06 14:28:10
  from "E:\xampp\htdocs\myshop.local\views\admin\adminProducts.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595e2cdad5c8b1_83983507',
  'file_dependency' => 
  array (
    'c7e99f897846f73ebf3901fe67b6cd5ecea7e049' => 
    array (
      0 => 'E:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminProducts.tpl',
      1 => 1499344088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595e2cdad5c8b1_83983507 ($_smarty_tpl) {
?>
<h2>Products</h2>
<input type="button" onclick="createXML();" value="Save products to XML">
<div id="xml-place"></div>
<br />
<h2>Import</h2>
<form action="/admin/loadfromxml/" method="post" enctype="multipart/form-data">
    <input type="file" name="filename"><br />
    <input type="submit" value="Upload"><br />
</form>

<table border="1" cellpadding="1" cellspacing="1">
    <caption>Add product in database</caption>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Description</th>
        <th>Approve</th>
    </tr>
    
    <tr>
        <td><input type="edit" id="newItemName" value=""/></td>
        <td><input type="edit" id="newItemPrice" value=""/></td>
        <td>
            <select id="newItemCatId">
                <?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_itemCat_0_saved_item = isset($_smarty_tpl->tpl_vars['itemCat']) ? $_smarty_tpl->tpl_vars['itemCat'] : false;
$_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['itemCat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
$__foreach_itemCat_0_saved_local_item = $_smarty_tpl->tpl_vars['itemCat'];
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
</option>
                <?php
$_smarty_tpl->tpl_vars['itemCat'] = $__foreach_itemCat_0_saved_local_item;
}
if ($__foreach_itemCat_0_saved_item) {
$_smarty_tpl->tpl_vars['itemCat'] = $__foreach_itemCat_0_saved_item;
}
?>
            </select>
        </td>
        <td><textarea id="newItemDesc"></textarea></td> 
        <td><input type="button" value="Add" onclick="addProduct();"></td> 
    </tr>
</table>

            <table border="1" cellpadding="1" cellspacing="1">
                <capion>List of all products</capion>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Desc</th>
                    <th>Delete</th>
                    <th>Pic</th>
                    <th>Save</th>
                </tr>
                <?php
$_from = $_smarty_tpl->tpl_vars['rsProducts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_products_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products'] : false;
$__foreach_products_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_products_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
                <tr>
                    <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                    <td><input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"</td>
                    <td><input type="edit" id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"</td>
                    <td>
                        <select id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                <option value="0">Main Category</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_itemCat_2_saved_item = isset($_smarty_tpl->tpl_vars['itemCat']) ? $_smarty_tpl->tpl_vars['itemCat'] : false;
$_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['itemCat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
$__foreach_itemCat_2_saved_local_item = $_smarty_tpl->tpl_vars['itemCat'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
" 
                                            <?php if ($_smarty_tpl->tpl_vars['itemCat']->value['id'] == $_smarty_tpl->tpl_vars['item']->value['category_id']) {?> selected="1" <?php }?>><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

                                    </option>
                                <?php
$_smarty_tpl->tpl_vars['itemCat'] = $__foreach_itemCat_2_saved_local_item;
}
if ($__foreach_itemCat_2_saved_item) {
$_smarty_tpl->tpl_vars['itemCat'] = $__foreach_itemCat_2_saved_item;
}
?>
                        </select>
                    </td>
                    <td><textarea id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</textarea></td>
                    <td><input type="checkbox"  id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?> checked="checked"<?php }?> /></td>
                    <td>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['image'];
$_tmp1=ob_get_clean();
if ($_tmp1) {?>
                            <img src="/images/products/<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['image'];
$_tmp2=ob_get_clean();
echo $_tmp2;?>
" width="100">
                        <?php }?>
                        <form action="/admin/upload/" method="post" enctype="multipart/form-data">
                            <input type="file" name="filename"><br/>
                            <input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <input type="submit" value="Upload"><br/>
                        </form>
                    </td>
                    <td><input type="button" value="Save" onclick="updateProduct('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"/></td>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_1_saved_local_item;
}
if ($__foreach_products_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_1_saved;
}
if ($__foreach_products_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_1_saved_item;
}
?>
            </table><?php }
}
