<?php
/* Smarty version 3.1.29, created on 2018-06-16 12:30:48
  from "C:\xampp\htdocs\myshop.local\views\default\leftcolumn.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b24e6d897e155_91145672',
  'file_dependency' => 
  array (
    '729145b4f4f2e6a7b3f096fbd4fa779733b42ec2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1501452526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b24e6d897e155_91145672 ($_smarty_tpl) {
?>

<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
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
            <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />

            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['children'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_1_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_1_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                    --<a href="/category/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a><br />
                <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_1_saved_local_item;
}
if ($__foreach_child_1_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_1_saved_item;
}
?>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
    </div>
        
    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <div id="userBox">
        <a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
        <a href="/user/logout/" onclick="logout();">Выход</a>
    </div>
        
    <?php } else { ?>
    <div id="userBox" class="hideme">
        <a href="#" id="userLink"></a><br />
        <a href="#" onclick="logout();">Выход</a>
    </div>
    
        <?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>
            <div id="loginBox">
                <div class="menuCaption">Авторизация </div>
                <input type="text" id="loginEmail" name="loginEmail" value=""><br />
                <input type="password" id="loginPwd" name="loginPwd" value=""><br />
                <input type="button" onclick="login();" value="Войти"><br />
            </div>

            <div id="registerBox">
                <div class="menuCaption" onclick="showRegisterBox();" value=""><a href="#">Регистрация</a></div>
                <div id="registerBoxHidden" class="hideme">
                    e-mail: <br />
                    <input type="text" id="email" name="email" value=""/><br />
                    пароль: <br />
                    <input type="password" id="pwd1" name="pwd1" value=""/><br />
                    повторить пароль: <br />
                    <input type="password" id="pwd2" name="pwd2" value=""/><br />
                    <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/><br />
                </div>
            </div>
        <?php }?>
    <?php }?>
    
    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
    <span id="cartCntItems">
        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?>
            <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>

            <?php } else { ?> Пусто
        <?php }?>
    </span>
</div><?php }
}
