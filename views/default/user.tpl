{*Страница кабинета авторизованного пользователя*}
<h1>регистрационные данные</h1>

<div id="userDataBox">
<table border="0">
    <tr>
        <td>Логин (e-mail)</td>
        <td>{$arUser['email']}</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td><input type="text" id="newName" name="newName" value="{$arUser['name']}"/></td>
    </tr>
    <tr>
        <td>Тел.</td>
        <td><input type="text" id="newPhone" name="newPhone" value="{$arUser['phone']}"/></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAddress" name="newAddress">{$arUser['address']}</textarea></td>
    </tr>
    <tr>
        <td>Новый пароль</td>
        <td><input type="password" id="newPwd1" name="newPwd1" value=""/></td>
    </tr>
     <tr>
        <td>Повтор пароля</td>
        <td><input type="password" id="newPwd2" name="newPwd2" value=""/></td>
    </tr>
    <tr>
        <td>Старый пароль для подтверждения изменений</td>
        <td><input type="password" id="curPwd" name="curPwd" value=""/></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" onclick="updateUserData();" value="Сохранить изменения"/></td>
    </tr>
</table>    
    <h2>Orders:</h2>
    {if ! $rsUserOrders}
        NO ORDERS!
        {else}
            <table border = "1">
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Payment Transaction</th>
                    <th>Info</th>
                </tr>
                {foreach $rsUserOrders as $item name=orders}
                    <tr>
                        <td>{$smarty.foreach.orders.iteration}</td>
                        <td><a href="#" onclick="showProducts({$item['id']}); return false;">Show products in order</a></td>
                        <td>{$item['id']}</td>
                        <td>{if {$item['status']} == 1} Payed
                                {else} Not payed {/if}</td>
                        <td>{$item['date_created']}</td>
                        <td>{$item['date_payment']}&nbsp;</td>
                        <td>{$item['comment']}</td>
                    </tr>
                    <tr class="hideme" id="purchasesForOrderId_{$item['id']}">
                        <td colspan = "7">
                            {if $item['children']}
                                <table border="1" cellpadding="1" cellspacing="1" width="100%">
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                    </tr>
                                    {foreach $item['children'] as $itemChild name=products}
                                        <tr>
                                            <td>{$smarty.foreach.products.iteration}</td>
                                            <td>{$itemChild['product_id']}</td>
                                            <td><a href="/product/{$itemChild['product_id']}/">{$itemChild['name']}</a></td>
                                            <td>{$itemChild['price']}</td>
                                            <td>{$itemChild['amount']}</td>
                                        </tr>
                                    {/foreach}
                                </table>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </table>
    {/if}
</div>