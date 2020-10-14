<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 17:42:22
  from '/laravel/templates/weather.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f87387e0aa460_17809672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '266d7a6dd891bd70813fb79311d472741a95ab96' => 
    array (
      0 => '/laravel/templates/weather.tpl',
      1 => 1602697211,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f87387e0aa460_17809672 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11189367825f87387dee0269_27570250', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_11189367825f87387dee0269_27570250 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_11189367825f87387dee0269_27570250',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container" align="center">
        <h5><strong>Середня температура помісячно станом на 12:00</strong></h5>
        <table align="center" border="4" cellpadding="7" bordercolor="green">
            <thead>
            <th>Рік</th>
            <th>Місяць</th>
            <th>Година</th>
            <th>Середня температура</th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['weather_item']->value, 'weather');
$_smarty_tpl->tpl_vars['weather']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['weather']->value) {
$_smarty_tpl->tpl_vars['weather']->do_else = false;
?>
                <tr>
                    <td align="center"><?php echo $_smarty_tpl->tpl_vars['weather']->value['year_num'];?>
</td>
                    <td align="center"><?php echo $_smarty_tpl->tpl_vars['weather']->value['month_txt'];?>
</td>
                    <td align="center"><?php echo $_smarty_tpl->tpl_vars['weather']->value['hour_num'];?>
:00</td>
                    <td align="center"><?php echo $_smarty_tpl->tpl_vars['weather']->value['avg_temperature'];?>
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
