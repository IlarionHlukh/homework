{extends file="layout.tpl"}

{block name="body"}
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
{foreach from=$users_imp item=user}
    <tr>
        <td>{$user['email']}</td>
        <td align="center">{$user['orders_qty']}</td>
        <td align="center">{$user['total_price']}</td>
        <td align="center">{$user['formula_result']}</td>
    </tr>
    {/foreach}
    </table>
</div>
{/block}