<?php

function setPurchaseForOrder($orderId, $cart, $mysqli){
    $sql = "INSERT INTO purchase "
            . "(`order_id`, `product_id`, `price`, `amount`) "
            . "VALUES ";
    $values = array();
    //forming array of strings for every merchandize
    foreach ($cart as $item){
        $values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
    }
    $sql .= implode($values, ', ');
    $rs = $mysqli->query($sql);
    
    return $rs;
}

function getPurchaseForOrder($smarty, $orderId, $mysqli){
    $sql = "SELECT `pe`.*, `ps`.`name`
            FROM purchase as `pe`
            JOIN products as `ps` ON `pe`.`product_id` = `ps`.`id`
            WHERE `pe`.`order_id` = {$orderId}";
    
    $rs = $mysqli->query($sql);
    return createSmartyRsArray($rs, $mysqli);
}