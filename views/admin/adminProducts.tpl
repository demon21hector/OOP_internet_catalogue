<h2>Products</h2>
<input type="button" onclick="createXML();" value="Save products to XML">
<div id="xml-place"></div>
<br />
<h2>Import</h2>
<form action="/admin/loadfromxml/" method="post" enctype="multipart/form-data">
    <input type="file" name="filename"><br />
    <input type="submit" value="Upload"><br />
</form>

<table border="1" cellpadding="1" cellspacing="1">
    <caption>Add product in database</caption>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Description</th>
        <th>Approve</th>
    </tr>
    
    <tr>
        <td><input type="edit" id="newItemName" value=""/></td>
        <td><input type="edit" id="newItemPrice" value=""/></td>
        <td>
            <select id="newItemCatId">
                {foreach $rsCategories as $itemCat}
                    <option value="{$itemCat['id']}">{$itemCat['name']}</option>
                {/foreach}
            </select>
        </td>
        <td><textarea id="newItemDesc"></textarea></td> 
        <td><input type="button" value="Add" onclick="addProduct();"></td> 
    </tr>
</table>

            <table border="1" cellpadding="1" cellspacing="1">
                <capion>List of all products</capion>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Desc</th>
                    <th>Delete</th>
                    <th>Pic</th>
                    <th>Save</th>
                </tr>
                {foreach $rsProducts as $item name=products}
                <tr>
                    <td>{$smarty.foreach.products.iteration}</td>
                    <td>{$item['id']}</td>
                    <td><input type="edit" id="itemName_{$item['id']}" value="{$item['name']}"</td>
                    <td><input type="edit" id="itemPrice_{$item['id']}" value="{$item['price']}"</td>
                    <td>
                        <select id="itemCatId_{$item['id']}">
                                <option value="0">Main Category</option>
                                {foreach $rsCategories as $itemCat}
                                    <option value="{$itemCat['id']}" 
                                            {if $itemCat['id'] == $item['category_id']} selected="1" {/if}>{$itemCat['name']}
                                    </option>
                                {/foreach}
                        </select>
                    </td>
                    <td><textarea id="itemDesc_{$item['id']}">{$item['description']}</textarea></td>
                    <td><input type="checkbox"  id="itemStatus_{$item['id']}" {if $item['status'] == 0} checked="checked"{/if} /></td>
                    <td>
                        {if {$item['image']}}
                            <img src="/images/products/{{$item['image']}}" width="100">
                        {/if}
                        <form action="/admin/upload/" method="post" enctype="multipart/form-data">
                            <input type="file" name="filename"><br/>
                            <input type="hidden" name="itemId" value="{$item['id']}">
                            <input type="submit" value="Upload"><br/>
                        </form>
                    </td>
                    <td><input type="button" value="Save" onclick="updateProduct('{$item['id']}');"/></td>
                </tr>
                {/foreach}
            </table>