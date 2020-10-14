<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-07 10:22:41
  from 'D:\XAAMP\htdocs\PHPStormProject\shop_homework\templates\test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f55edd19660b4_15302745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2486231580c79433ddbacdf00d141df75dfaccdd' => 
    array (
      0 => 'D:\\XAAMP\\htdocs\\PHPStormProject\\shop_homework\\templates\\test.tpl',
      1 => 1599466958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f55edd19660b4_15302745 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17036298335f55edd1953410_04832758', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'body'} */
class Block_17036298335f55edd1953410_04832758 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17036298335f55edd1953410_04832758',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Hello
    <tr>
        <td>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['site_name']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
</li>
                    <li><?php echo $_smarty_tpl->tpl_vars['foo']->value['email'];?>
</li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </td>
    </tr>
<?php
}
}
/* {/block 'body'} */
}
