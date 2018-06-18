<?php
/* Smarty version 3.1.29, created on 2017-07-09 00:27:05
  from "E:\xampp\htdocs\myshop.local\views\default\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59615c3996a9d5_72777121',
  'file_dependency' => 
  array (
    'cdcc4e649960c8a8fc7082ffa135122b5d2749c9' => 
    array (
      0 => 'E:\\xampp\\htdocs\\myshop.local\\views\\default\\index.tpl',
      1 => 1499552823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59615c3996a9d5_72777121 ($_smarty_tpl) {
?>


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
    <div style="float: left; padding: 0px 30px 40px 0px;">
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
            <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100" />
        </a><br />
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
            <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

        </a>
    </div>
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
        <div style="clear: both;"></div>
    <?php }
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_0_saved_local_item;
}
if ($__foreach_products_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_0_saved;
}
if ($__foreach_products_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_0_saved_item;
}
?>

<div class="paginator">
    <?php if ($_smarty_tpl->tpl_vars['paginator']->value['currentPage'] != 1) {?>
        <span class='p_prev'>
            <a href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['link'];
echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage']-1;?>
"><--</a>
        </span>
    <?php }?>
    
    <strong> <span><?php echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage'];?>
</span></strong>
    
    <?php if ($_smarty_tpl->tpl_vars['paginator']->value['currentPage'] < $_smarty_tpl->tpl_vars['paginator']->value['pageCnt']) {?>
        <span class="p_next"><a href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['link'];
echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage']+1;?>
">--></a></span>
    <?php }?>
</div><?php }
}
