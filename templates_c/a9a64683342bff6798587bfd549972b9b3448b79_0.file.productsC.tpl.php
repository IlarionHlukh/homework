<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-19 16:42:37
  from '/laravel/templates/productsCategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f660acd93a7a2_68185964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9a64683342bff6798587bfd549972b9b3448b79' => 
    array (
      0 => '/laravel/templates/productsCategory.tpl',
      1 => 1600522953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f660acd93a7a2_68185964 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2553780185f660acd7ef142_85815934', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_2553780185f660acd7ef142_85815934 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2553780185f660acd7ef142_85815934',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
            <li role="presentation" class="focus"><a href="#">All</a></li>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <?php if ($_GET['categoryId']) {?>
                    <li role="presentation" class="focus"><a href="/?action=ShowProduct&categoryId=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><div class="p-3 mb-2 bg-gradient-info text-white"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</div></a></li>
            <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productsCategory']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
            <div class="col-sm-6 col-md-4">
                    <?php if ($_smarty_tpl->tpl_vars['foo']->value['category_id'] === $_GET['categoryId']) {?>
                     <div class="thumbnail">
                    <img src=<?php echo $_smarty_tpl->tpl_vars['foo']->value['image'];?>
 alt="...">
                    <div class="caption">
                        <h3><?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['foo']->value['price'];?>
$</p>
                        <form action="/?action=addToCart" method="POST">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
">
                            <input type="submit" class="btn btn-success" role="button" value="Add to cart!">
                        </form>
                    </div>
                         <?php }?>
                </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
       </div>
   </div>
<?php
}
}
/* {/block "body"} */
}
