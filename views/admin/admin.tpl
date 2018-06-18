<div id="blockNewCategory">
    New category:
    <input name="newCategoryName" id="newCategoryName" type="text" value="" />
    <input type="button" onclick="newCategory();" value="Add category" />
    <br />
    
    Is undercategory for:
    <select name="generalCatId">
        <option value="0">Main Category</option>
            {foreach $rsCategories as $item}
                <option value="{$item['id']}">{$item['name']}</option>
            {/foreach}
    </select>
    
    
</div>