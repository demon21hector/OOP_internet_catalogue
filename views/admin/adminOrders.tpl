<h2>Orders</h2>
{if ! $rsOrders}
    No current orders
{else}
    <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th>#</th>
            <th>Action</th>
            <th>Order ID</th>
            <th width="100">Status</th>
            <th>Date of order</th>
            <th>Date of payment</th>
            <th>Info</th>
            <th>Date of changes</th>
        </tr>
        {foreach $rsOrders as $item name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td><a href="#" onclick="showProducts('{$item['id']}'); return false;">Show (hide) products on order</a></td>
                <td>{$item['id']}</td>
                <td><input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']} checked="checked" {/if} onclick="updateOrderStatus('{$item['id']}');">Closed</td>
                <td>{$item['date_created']}</td>
                <td>
                    <input id="datePayment_{$item['id']}" type="text" value="{$item['date_payment']}"/>
                    <input type="button" value="Save" onclick="updateDatePayment('{$item['id']}');"/>
                </td>
                <td>{$item['comment']}</td>
                <td>{$item['date_modification']}</td>
            </tr>
            <tr class="hideme" id="purchasesForOrderId_{$item['id']}">
                <td colspan="8">
                    {if $item['children']}
                        <table border="1" cellpaddinf="1" cellspacing="1" width="100%">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th><Name</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                            {foreach $item['children'] as $itemChild name=products}
                                <tr>
                                    <td>{$smarty.foreach.products.iteration}</td>
                                    <td>{$itemChild['id']}</td>
                                    <td><a href="/product/{$itemChild['id']}/">{$itemChild['name']}</a></td>
                                    <td>{$itemChild['price']}</td>
                                    <td>{$itemChild['amount']}</td>
                                </tr>
                            {/foreach }
                        </table>
                    {/if}
                </td>
            </tr>
        {/foreach}
    </table>
{/if}

