<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-06 16:29:03
  from '/laravel/templates/test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f550e4f53c707_76851321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4228f2f93abaf7549fe144348a36b5d0f4d73341' => 
    array (
      0 => '/laravel/templates/test.tpl',
      1 => 1599409738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f550e4f53c707_76851321 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14500907445f550e4f3d2c78_73635848', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'body'} */
class Block_14500907445f550e4f3d2c78_73635848 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_14500907445f550e4f3d2c78_73635848',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Hello <?php ob_start();
echo $_smarty_tpl->tpl_vars['firstname']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
 <?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
, glad to see you can make it.
<br />
This weeks meeting is in <?php echo $_smarty_tpl->tpl_vars['meetingPlace']->value;?>
.
<?php
}
}
/* {/block 'body'} */
}
