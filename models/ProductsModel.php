<?php
/**
 * Модель таблицы продукции
 */

/**
 * @param null $limit   количество выводимых элементов товара на странице
 * @param $mysqli       объект для работы с бд
 * @return array|bool   массив с выборкой товаров
 */
function getLastProducts($offset = 1, $limit = 9, $mysqli){
    
    $sqlCnt = "SELECT count(id) as cnt FROM `products`";
    $rs = $mysqli->query($sqlCnt);
    $cnt = createSmartyRsArray($rs, $mysqli);
    
    $sql = "SELECT *
            FROM `products`
            ORDER by `id` DESC
            LIMIT {$offset}, {$limit}";
    $rs = $mysqli->query($sql);
    $rows = createSmartyRsArray($rs, $mysqli);
    
    return array($rows, $cnt[0]['cnt']);
}

function getProductsByCat($itemId, $mysqli){
    $itemId = intval($itemId);

    $sql = "SELECT * FROM `products`
            WHERE `category_id` = '{$itemId}'
            ORDER by `id` DESC";

    $rs = $mysqli->query($sql);

    return createSmartyRsArray($rs, $mysqli);
}

/**
 * Получение данных о продукте по его iD
 * @param $itemId
 * @param $mysqli
 * @return mixed
 */
function getProductById($itemId, $mysqli){

    $itemId = intval($itemId);
    $sql = "SELECT *
            FROM `products`
            WHERE `id` = '{$itemId}'";

    $rs = $mysqli->query($sql);
    return $rs->fetch_assoc();
}

function getProductsFromArray($itemsIds, $mysqli){

    $strIds = implode($itemsIds, ", ");
    $sql = "SELECT *
            FROM `products`
            WHERE `id` in ({$strIds})";
    $rs = $mysqli->query($sql);

    return createSmartyRsArray($rs, $mysqli);
}

function getProducts($mysqli){
    $sql = "SELECT * FROM `products`"
            . " ORDER BY `category_id`";
    
    $rs = $mysqli->query($sql);
    
    return createSmartyRsArray($rs, $mysqli);
}


function insertProduct($itemName, $itemPrice, $itemDesc, $ItemCat, $mysqli){
    $sql = "INSERT INTO `products`"
            . " SET"
            . " `name` = '{$itemName}',"
            . " `price` = '{$itemPrice}',"
            . " `description` = '{$itemDesc}',"
            . " `category_id` = '{$ItemCat}'";
    $rs = $mysqli->query($sql);
    
    return $rs;
}

/**
 * 
 * @param type $mysqli
 * @param type $itemId
 * @param type $itemName
 * @param type $itemPrice
 * @param type $itemStatus
 * @param type $itemDesc
 * @param type $itemCat
 * @param type $newFileName
 * @return type
 */
function updateProduct($mysqli, $itemId, $itemName, $itemPrice, $itemStatus,
                        $itemDesc, $itemCat, $newFileName = NULL){
    $set = array();
    if($itemName){
        $set[] = "`name` = '{$itemName}'";
    }
    if($itemPrice > 0){
        $set[] = "`price` = '{$itemPrice}'";
    }
    if($itemStatus !== NULL){
        $set[] = "`status` = '{$itemStatus}'";
    }
    if($itemDesc){
        $set[] = "`description` = '{$itemDesc}'";
    }
    if($itemCat){
        $set[] = "`category_id` = '{$itemCat}'";
    }
    if($newFileName){
        $set[] = "`image` = '{$newFileName}'";
    }
    $setStr = implode(', ', $set);
    
    $sql = "UPDATE `products` "
            . "SET {$setStr} "
            . "WHERE `id` = '{$itemId}'";
       
    $rs = $mysqli->query($sql);
    
    return $rs;
}

function updateProductImage($mysqli, $itemId, $newFileName){
    
    $rs = updateProduct($mysqli, $itemId, NULL, NULL, NULL, 
                            NULL, NULL, $newFileName);
    return $rs;
}

function insertImportProducts($mysqli, $aProducts){
    $sql = "INSERT INTO `products`
            (`name`, `category_id`, `description`, `price`, `status`)
            VALUES ";
    $cnt = count($aProducts);
    
    for ($i = 0; $i < $cnt; $i++){
        if($i > 0) {$sql .= ", ";}
        $sql .= "('" . implode("', '", $aProducts[$i]) . "')";
    }
    $rs = $mysqli->query($sql);
    return $rs;
}