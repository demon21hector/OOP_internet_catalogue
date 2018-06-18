<h2>Categories</h2>
<table border="1" cellpadding="1" cellspacing="1">
    <tr>
        <th>#</th>
        <th>ID</th>
        <th>Name</th>
        <th>Parent Category</th>
        <th>Action</th>
    </tr>
    {foreach $rsCategories as $item name=categories}
        <tr>
            <td>{$smarty.foreach.categories.iteration}</td>
            <td>{$item['id']}</td>
            <td><input type="edit" id="itemName_{$item['id']}" value="{$item['name']}"</td>
            <td>
                <select id="parentId_{$item['id']}">
                    <option value="0">Main Category</option>
                    {foreach $rsMainCategories as $mainItem}
                        <option value="{$mainItem['id']}" {if $item['parent_id'] == $mainItem['id']} selected="1" {/if}>{$mainItem['name']} </option>
                    {/foreach}
                </select>
            </td>
            <td>
                <input type="button" value="Save" onclick="updateCat({$item['id']});" />
            </td>
        </tr>
    {/foreach}
</table>