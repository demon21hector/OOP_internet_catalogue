{*шаблон корзины*}

<h1>Корзина</h1>

{if ! $rsProducts}
    <h2> Вы ещё ничего не выбрали! </h2>
{else}
    <form action="/cart/order/" method="POST">
        <h2>Данные заказа:</h2>
        <table>
            <tr>
                <td>
                    №
                </td>
                <td>
                    Наименование
                </td>
                <td>
                    Количество
                </td>
                <td>
                    Цена за единицу
                </td>
                <td>
                    Цена
                </td>
                <td>
                    Действие
                </td>
            </tr>
            {foreach $rsProducts as $item name=products}
                <tr>
                    <td>
                        {$smarty.foreach.products.iteration}
                    </td>
                    <td>
                        <a href="/product/{$item['id']}/">{$item['name']}</a><br />
                    </td>
                    <td>
                        <input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});"/>
                    </td>
                    <td>
                        <span id="itemPrice_{$item['id']}" value="{$item['price']}">
                            {$item['price']}
                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_{$item['id']}">
                            {$item['price']}
                        </span>
                    </td>
                    <td>
                        <a href="#" alt="Убрать из корзины"  id="removeCart_{$item['id']}" onclick="removeFromCart({$item['id']}); return false;" title="Удалить из корзины">Удалить</a>
                        <a href="#" alt="Добавить в корзину" class="hideme" id="addCart_{$item['id']}" onclick="addToCart({$item['id']}); return false;" title="Восстановить в корзине">Восстановить</a>
                    </td>
                </tr>
            {/foreach}
        </table>
            <input type="submit" value="Оформить заказ"/>
    </form>
{/if}
