<?php
/* Smarty version 3.1.29, created on 2017-06-07 13:10:00
  from "D:\xampp\htdocs\myshop.local\views\default\order.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5937df082b1807_92925395',
  'file_dependency' => 
  array (
    '3a554c83dbb766b84e16a95e9737499be25625a0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop.local\\views\\default\\order.tpl',
      1 => 1496833704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5937df082b1807_92925395 ($_smarty_tpl) {
?>


<h2>Данные заказа</h2>
<form id="formOrder" action="/cart/saveorder/" method="POST">
    <table>
        <tr>
            <td>#</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Стоимость</td>
        </tr>
        
        <?php
$_from = $_smarty_tpl->tpl_vars['rsProducts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_products_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products'] : false;
$__foreach_products_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_products_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                <td>
                    <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
"/>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

                    </span>
                </td>
                                <td>
                    <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"/>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>
                </td>
                                <td>
                    <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
"/>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

                    </span>
                </td>

            </tr>
        <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_0_saved_local_item;
}
if ($__foreach_products_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_0_saved;
}
if ($__foreach_products_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_0_saved_item;
}
?>
    </table>
    
    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'buttonClass', 0);?>
        <h2>Данные заказчика</h2>
        <div id="orederUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
            <?php $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable($_smarty_tpl->tpl_vars['arUser']->value['name'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'name', 0);?>        
            <?php $_smarty_tpl->tpl_vars['phone'] = new Smarty_Variable($_smarty_tpl->tpl_vars['arUser']->value['phone'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'phone', 0);?>        
            <?php $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable($_smarty_tpl->tpl_vars['arUser']->value['address'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'address', 0);?>    
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" /></td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" /></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea id="address" name="address" /><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea></td>
                </tr>
            </table>
        </div>
    <?php } else { ?>
        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>
            <table>
                <tr>
                    <td>Логин</td>
                    <td><input type="text" id="loginEmail" name="loginEmail" value=""/> </td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td><input type="text" id="loginPwd" name="loginPwd" value=""/> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" onclick="login();" value="Войти"></td>
                </tr>
            </table>
        </div>
        
        <div id="registerBox"> или <br />
            <div class="menuCaption"> Регистрация пользователя:</div>
            email*:<br />
            <input type="text" id="email" name="email" value=""/><br />
            пароль*: <br />
            <input type="password" id="pwd1" name="pwd1" value=""/><br />
            подтверждение пароля*: <br />
            <input type="password" id="pwd2" name="pwd2" value=""/><br />
            
            Имя*:<input type="name" id="name" name="name" value=""/><br />
            Тел*:<input type="phone" id="phone" name="phone" value=""/><br />
            Адрес*:<textarea id="address" name="address"/></textarea><br />
        
            <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />
        </div>
        <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_Variable("class='hideme'", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'buttonClass', 0);?>
            
    <?php }?>
        
    <input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 id="btnSaveOrder" type="button" value="оформить заказ" onclick="saveOrder();"/>
</form><?php }
}
