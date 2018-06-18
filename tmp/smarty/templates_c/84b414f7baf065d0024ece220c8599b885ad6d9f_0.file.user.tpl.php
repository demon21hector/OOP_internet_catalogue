<?php
/* Smarty version 3.1.29, created on 2016-08-01 14:08:58
  from "D:\xampp\htdocs\myshop.local\views\default\user.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579f3bdacb45c0_48789291',
  'file_dependency' => 
  array (
    '84b414f7baf065d0024ece220c8599b885ad6d9f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop.local\\views\\default\\user.tpl',
      1 => 1470053317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579f3bdacb45c0_48789291 ($_smarty_tpl) {
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
</div><?php }
}
