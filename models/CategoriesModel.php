<?php
/**
 * Модель для таблицы категорий
 * */

/**
 * Функция отлова детей родительской категории
 *
 * @param $catId id главной (родительской категории), для которой ищем детей
 * @param $mysqli объект для работы с базой данных
 * @return array|bool массив с детьми категории
 */
function getChildrenForCat($catId, $mysqli){
    $sql = "SELECT *
            FROM categories
            WHERE parent_id = '{$catId}'";
    $rs = $mysqli->query($sql);

    return createSmartyRsArray($rs, $mysqli);
}

/**
 * Вывод списка категорий в главном меню
 *
 * @param $mysqli объект для работы с базой данных
 * @return array массив с выборкой родительских категорий товаров
 */
function getAllMainCatsWithChildren($mysqli){
    $sql = 'SELECT *
            FROM categories
            WHERE parent_id = 0;';
    $rs =  $mysqli->query($sql);

    $smartyRs = array();

    while ($row = $rs->fetch_assoc()) {

        $rsChildren = getChildrenForCat($row['id'], $mysqli);

        if ($rsChildren){
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    }
    return $smartyRs;
}

/**
 * @param $catId    id категории
 * @param $mysqli
 * @return mixed    массив - строка категории
 */
function getCategoryById($catId, $mysqli){
    $catId = intval($catId);

    $sql = "SELECT *
            FROM categories
            WHERE
            id = '{$catId}'";

    $rs = $mysqli->query($sql);

    return $rs->fetch_assoc();
}

/* get all main product categories from db
 * @return array of categories
 */
function getAllMainCategories($mysqli){
    $sql = "SELECT *
            FROM `categories`
            WHERE `parent_id` = 0";
    $rs = $mysqli->query($sql);
    
    return createSmartyRsArray($rs, $mysqli);
}

/*
 * Create new category of products and
 * get ID of new created category
 * 
 * @return $id - category ID
*/
function insertCat($mysqli, $catName, $catParentId = 0){
    
    $sql = "INSERT INTO `categories` "
            . "(`parent_id`, `name`) "
            . "VALUES ('{$catParentId}', '{$catName}')";
    $mysqli->query($sql);
    
    $id = $mysqli->insert_id;
    return $id;
}
function getAllCategories($mysqli){
    
    $sql = "SELECT *
            FROM `categories`
            ORDER BY `parent_id` ASC";
    $rs = $mysqli->query($sql);
    
    return createSmartyRsArray($rs, $mysqli);
}

function updateCategoryData($itemID, $mysqli, $parentID = -1, $newName = ''){
    $set = array();
    
    if($newName){
        $set[] = "`name` = '{$newName}'";
    }
    
    if($parentID > -1){
        $set[] = "`parent_id` = '{$parentID}'";
    }
    
    $setStr = implode(", ", $set);
        
    $sql = "UPDATE `categories`"
            . " SET {$setStr}"
            . " WHERE `id` = '{$itemID}'";
    $rs = $mysqli->query($sql);
    
    return $rs;
}