{extends file="layout.tpl"}

{block name="body"}
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
{foreach from=$users_orders item=user}
    <form action="/?action=adminUpdateCategory" method="POST">
        <tr>

            <td>{$user['email']}</td>
            <td>{$user['USER_ID']}</td>
            <td>{$user['COUNT(DISTINCT o.ID)']}</td>
    </tr>
{/foreach}
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
                                                {foreach from=$users_total item=user}
                                                <form action="/?action=adminUpdateCategory" method="POST">
                                                    <tr>

                                                        <td>{$user['email']}</td>
                                                        <td>{$user['total_price']}</td>
                                                    </tr>
                                                    {/foreach}
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
                                                    {foreach from=$users_top item=user}
                                                    <form action="/?action=adminUpdateCategory" method="POST">
                                                        <tr>

                                                            <td>{$user['name']}</td>
                                                            <td>{$user['price']}</td>
                                                            <td>{$user['count(distinct o.id)']}</td>
                                                        </tr>
                                                        {/foreach}
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
                                                    {foreach from=$users_date item=user}
                                                    <form action="/?action=adminUpdateCategory" method="POST">
                                                        <tr>

                                                            <td>{$user['email']}</td>
                                                            <td>{$user['id']}</td>
                                                            <td>{$user['created_at_date']}</td>
                                                        </tr>
                                                        {/foreach}
                                                    </tbody>
                            </tr>
                     </table>
{/block}