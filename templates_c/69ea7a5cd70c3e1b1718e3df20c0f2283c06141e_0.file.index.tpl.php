<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 16:50:57
  from '/laravel/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f872c718dd2c7_09740854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69ea7a5cd70c3e1b1718e3df20c0f2283c06141e' => 
    array (
      0 => '/laravel/templates/index.tpl',
      1 => 1602694255,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f872c718dd2c7_09740854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10073688205f872c717c6e69_71957370', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "body"} */
class Block_10073688205f872c717c6e69_71957370 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_10073688205f872c717c6e69_71957370',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <body>
    <a class="btn btn-primary" href="/?action=InputDate">Внесення тестових даних</a>
    <a class="btn btn-warning" href="/?action=MakeRandomOrders">Створення замовлень</a>
    <a class="btn btn-danger" href="/?action=DeleteData">Видалення даних БД</a>
    <a class="btn btn-info"  href="/?action=ShowImportantUsers">Список цінних покупців</a>
    <a class="btn btn-success" href="/?action=ShowWeather"><svg width="2em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cloud-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
        </svg>Погода</a>
<table mt-10 width="460" height="49" border="0" cellpadding="0" cellspacing="2">
<tr>
<td height="19" valign="top">
                <h7><strong>Користувачі+замовлення в порядку спадання</strong></h7>
<div class="container" align="center">
<table border="2" cellpadding="5" bordercolor="blue">
<thead>
<th>Користувач</th>
<th>ID користувача</th>
<th>Кількість замовлень</th>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users_orders']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
    <form action="/?action=adminUpdateCategory" method="POST">
        <tr>

            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['USER_ID'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['COUNT(DISTINCT o.ID)'];?>
</td>
    </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<div class="container" align="center">
                            <table border="2" cellpadding="5" bordercolor="orange">
</table></td>
    <td valign="top"><table>
            <tr>
                <h7><strong>Загальна сумма витрачених коштів</strong></h7>
                    <td height="48" valign="top">
                        <table width="230" height="50" border="2" cellpadding="5" bordercolor="orange">
                                                <thead>
                                                <th>Користувач</th>
                                                <th>Загальна сума $</th>
                                                </thead>
                                                <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users_total']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                                                <form action="/?action=adminUpdateCategory" method="POST">
                                                    <tr>

                                                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['total_price'];?>
</td>
                                                    </tr>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </tbody>
                                                </td>
                                                </tr>
                                                </table></td>
                                        </tr>
                    </table></td>
                           <td valign="top">
                               <table>
                                    <tr>
                                        <h7><strong>ТОП 3 найпопулярніші товари</strong></h7>
                                        <td height="48" valign="top">
                                            <div class="container" align="center">
                                                <table border="2" cellpadding="5" bordercolor="red">
                                                    <thead>
                                                    <th>Назва товару</th>
                                                    <th>Ціна $</th>
                                                    <th>Кількість заказів</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users_top']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                                                    <form action="/?action=adminUpdateCategory" method="POST">
                                                        <tr>

                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['price'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['count(distinct o.id)'];?>
</td>
                                                        </tr>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </table></td>
                                    </table></td>
                           <td valign="top"><table>
                                    <tr>
                                       <h7><strong>Замовлення користувачів з 01.07.2020 по 30.07.2020</strong></h7>
                                        <td height="48" valign="top">
                                            <div class="container" align="center">
                                                <table width="460" height="49" border="2" cellpadding="5" bordercolor="green">
                                                    <thead>
                                                    <th>Користувач</th>
                                                    <th>ID замовлення</th>
                                                    <th>Дата</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users_date']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                                                    <form action="/?action=adminUpdateCategory" method="POST">
                                                        <tr>

                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['created_at_date'];?>
</td>
                                                        </tr>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    </tbody>
                            </tr>
                     </table>
<?php
}
}
/* {/block "body"} */
}
