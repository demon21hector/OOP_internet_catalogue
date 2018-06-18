{*страница оформления заказа*}

<h2>Данные заказа</h2>
<form id="formOrder" action="/cart/saveorder/" method="POST">
    <table>
        <tr>
            <td>#</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Стоимость</td>
        </tr>
        
        {foreach $rsProducts as $item name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td>{$item['name']}</td>
                <td>
                    <span id="itemCnt_{$item['id']}">
                        <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}"/>
                        {$item['cnt']}
                    </span>
                </td>
                                <td>
                    <span id="itemPrice_{$item['id']}">
                        <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}"/>
                        {$item['price']}
                    </span>
                </td>
                </td>
                                <td>
                    <span id="itemRealPrice_{$item['id']}">
                        <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}"/>
                        {$item['realPrice']}
                    </span>
                </td>

            </tr>
        {/foreach}
    </table>
    
    {if isset($arUser)}
        {$buttonClass = ""}
        <h2>Данные заказчика</h2>
        <div id="orederUserInfoBox" {$buttonClass}>
            {$name = $arUser['name']}        
            {$phone = $arUser['phone']}        
            {$address = $arUser['address']}    
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" id="name" name="name" value="{$name}" /></td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input type="text" id="phone" name="phone" value="{$phone}" /></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea id="address" name="address" />{$address}</textarea></td>
                </tr>
            </table>
        </div>
    {else}
        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>
            <table>
                <tr>
                    <td>Логин</td>
                    <td><input type="text" id="loginEmail" name="loginEmail" value=""/> </td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td><input type="text" id="loginPwd" name="loginPwd" value=""/> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" onclick="login();" value="Войти"></td>
                </tr>
            </table>
        </div>
        
        <div id="registerBox"> или <br />
            <div class="menuCaption"> Регистрация пользователя:</div>
            email*:<br />
            <input type="text" id="email" name="email" value=""/><br />
            пароль*: <br />
            <input type="password" id="pwd1" name="pwd1" value=""/><br />
            подтверждение пароля*: <br />
            <input type="password" id="pwd2" name="pwd2" value=""/><br />
            
            Имя*:<input type="name" id="name" name="name" value=""/><br />
            Тел*:<input type="phone" id="phone" name="phone" value=""/><br />
            Адрес*:<textarea id="address" name="address"/></textarea><br />
        
            <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />
        </div>
        {$buttonClass = "class='hideme'"}
            
    {/if}
        
    <input {$buttonClass} id="btnSaveOrder" type="button" value="оформить заказ" onclick="saveOrder();"/>
</form>