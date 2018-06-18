<?php
/* Smarty version 3.1.29, created on 2017-06-29 00:16:53
  from "E:\xampp\htdocs\myshop.local\views\admin\adminOrders.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59542ad5b929f6_13809339',
  'file_dependency' => 
  array (
    '5ed1a8e109ae9227eec3cc541aec422c8fa33369' => 
    array (
      0 => 'E:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminOrders.tpl',
      1 => 1498688212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59542ad5b929f6_13809339 ($_smarty_tpl) {
?>
<h2>Orders</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value) {?>
    No current orders
<?php } else { ?>
    <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th>#</th>
            <th>Action</th>
            <th>Order ID</th>
            <th width="100">Status</th>
            <th>Date of order</th>
            <th>Date of payment</th>
            <th>Info</th>
            <th>Date of changes</th>
        </tr>
        <?php
$_from = $_smarty_tpl->tpl_vars['rsOrders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_orders_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders'] : false;
$__foreach_orders_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_orders'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
$__foreach_orders_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
                <td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">Show (hide) products on order</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td><input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?> checked="checked" <?php }?> onclick="updateOrderStatus('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');">Closed</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
                <td>
                    <input id="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
"/>
                    <input type="button" value="Save" onclick="updateDatePayment('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"/>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>
</td>
            </tr>
            <tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                <td colspan="8">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                        <table border="1" cellpaddinf="1" cellspacing="1" width="100%">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th><Name</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['children'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_products_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products'] : false;
$__foreach_products_1_saved_item = isset($_smarty_tpl->tpl_vars['itemChild']) ? $_smarty_tpl->tpl_vars['itemChild'] : false;
$_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['itemChild']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_products_1_saved_local_item = $_smarty_tpl->tpl_vars['itemChild'];
?>
                                <tr>
                                    <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
</td>
                                    <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
                                </tr>
                            <?php
$_smarty_tpl->tpl_vars['itemChild'] = $__foreach_products_1_saved_local_item;
}
if ($__foreach_products_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_1_saved;
}
if ($__foreach_products_1_saved_item) {
$_smarty_tpl->tpl_vars['itemChild'] = $__foreach_products_1_saved_item;
}
?>
                        </table>
                    <?php }?>
                </td>
            </tr>
        <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_orders_0_saved_local_item;
}
if ($__foreach_orders_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders'] = $__foreach_orders_0_saved;
}
if ($__foreach_orders_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_orders_0_saved_item;
}
?>
    </table>
<?php }?>

<?php }
}
