<?php
/* Smarty version 3.1.29, created on 2017-06-16 23:51:24
  from "E:\xampp\htdocs\myshop.local\views\default\user.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594452dc754d96_61534495',
  'file_dependency' => 
  array (
    'b0bbdc864f7e505993fc248ec7a7d3e1192469f5' => 
    array (
      0 => 'E:\\xampp\\htdocs\\myshop.local\\views\\default\\user.tpl',
      1 => 1497649882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594452dc754d96_61534495 ($_smarty_tpl) {
?>

<h1>регистрационные данные</h1>

<div id="userDataBox">
<table border="0">
    <tr>
        <td>Логин (e-mail)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td><input type="text" id="newName" name="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"/></td>
    </tr>
    <tr>
        <td>Тел.</td>
        <td><input type="text" id="newPhone" name="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"/></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAddress" name="newAddress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
</textarea></td>
    </tr>
    <tr>
        <td>Новый пароль</td>
        <td><input type="password" id="newPwd1" name="newPwd1" value=""/></td>
    </tr>
     <tr>
        <td>Повтор пароля</td>
        <td><input type="password" id="newPwd2" name="newPwd2" value=""/></td>
    </tr>
    <tr>
        <td>Старый пароль для подтверждения изменений</td>
        <td><input type="password" id="curPwd" name="curPwd" value=""/></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" onclick="updateUserData();" value="Сохранить изменения"/></td>
    </tr>
</table>    
    <h2>Orders:</h2>
    <?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
        NO ORDERS!
        <?php } else { ?>
            <table border = "1">
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Payment Transaction</th>
                    <th>Info</th>
                </tr>
                <?php
$_from = $_smarty_tpl->tpl_vars['rsUserOrders']->value;
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
                        <td><a href="#" onclick="showProducts(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;">Show products in order</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['status'];
$_tmp1=ob_get_clean();
if ($_tmp1 == 1) {?> Payed
                                <?php } else { ?> Not payed <?php }?></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp;</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
                    </tr>
                    <tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <td colspan = "7">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                                <table border="1" cellpadding="1" cellspacing="1" width="100%">
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
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
                                            <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
                                            <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
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
</div><?php }
}
