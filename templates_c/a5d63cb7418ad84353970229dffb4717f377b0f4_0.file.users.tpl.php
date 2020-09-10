<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-07 15:52:37
  from '/laravel/templates/admin/users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f56574555b982_85683138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5d63cb7418ad84353970229dffb4717f377b0f4' => 
    array (
      0 => '/laravel/templates/admin/users.tpl',
      1 => 1599493955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f56574555b982_85683138 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15798333865f5657453ab968_83044675', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_15798333865f5657453ab968_83044675 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_15798333865f5657453ab968_83044675',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Registered At</th>
            <th>Role</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['site_name']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['foo']->value['email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['foo']->value['created_at'];?>
</td>
            <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['foo']->value['is_admin'] === 1;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
                    admin
                <?php } else { ?>
                    user
                <?php }?>
            </td>
            <td>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['foo']->value['is_admin'] === 1;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2) {?>
                <form action="" method="POST">
                <button class="btn btn-success" formaction="/?action=makeUser">Make user</button>
                <button class="btn btn-danger" formaction="/?action=deleteUser">Delete</button>
                <?php } else { ?>
                    <button class="btn btn-primary" formaction="/?action=makeAdmin">Make admin</button>
                    <button class="btn btn-danger" formaction="/?action=deleteAdmin">Delete</button>
                <?php }?>
            </td>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tr>
        </tbody>
    </table>
<?php
}
}
/* {/block "body"} */
}
