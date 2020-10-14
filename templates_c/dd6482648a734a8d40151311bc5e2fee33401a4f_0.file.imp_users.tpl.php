<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 17:39:04
  from '/laravel/templates/imp_users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8737b846f857_15143427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd6482648a734a8d40151311bc5e2fee33401a4f' => 
    array (
      0 => '/laravel/templates/imp_users.tpl',
      1 => 1602697141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8737b846f857_15143427 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18982556805f8737b837f059_28507961', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_18982556805f8737b837f059_28507961 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_18982556805f8737b837f059_28507961',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container" align="center">
    <h3><strong>Список цінних покупців</strong></h3>
    <table border="3" cellpadding="5" bordercolor="#12ADA5">
    <thead>
    <th>Користувач</th>
    <th>Кількість замовлень</th>
    <th>Загальна сумма</th>
    <th>Результат за формулою</th>
    </thead>
    <tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users_imp']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['user']->value['orders_qty'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['user']->value['total_price'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['user']->value['formula_result'];?>
</td>
    </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
</div>
<?php
}
}
/* {/block "body"} */
}
