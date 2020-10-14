{extends file="layout.tpl"}

{block name="body"}
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
            {foreach from=$weather_item item=weather}
                <tr>
                    <td align="center">{$weather['year_num']}</td>
                    <td align="center">{$weather['month_txt']}</td>
                    <td align="center">{$weather['hour_num']}:00</td>
                    <td align="center">{$weather['avg_temperature']}</td>
                </tr>
            {/foreach}
        </table>
    </div>
{/block}