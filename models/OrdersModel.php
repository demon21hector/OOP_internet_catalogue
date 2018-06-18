<?php

/* 
 * Model for orders table (orders)
 */

/* 
 * Making order without product connection
 */

/**
 * @param type $name
 * @param type $phone
 * @param type $address
 * @return integer ID of new-created order
 */
function makeNewOrder($smarty, $name, $phone, $address, $mysqli){
    $userId = $_SESSION['user']['id'];
    $comment = "user ID: {$userId} <br />"
            . "Name: {$name} <br />"
            . "Phone: {$phone} <br />"
            . "Address {$address} <br />";
    $dateCreated = date('Y.m.d H:i:s');
    $userIp = $_SERVER['REMOTE_ADDR'];
    
    $sql = "INSERT INTO "
            . "orders (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)"
            . " VALUES ('{$userId}', '{$dateCreated}', 'null', '0', '{$comment}', '{$userIp}')";
    $rs = $mysqli->query($sql);
        
    //get id of current order
    if($rs){
        $sql = "SELECT id "
                . "FROM orders "
                . "ORDER by id DESC "
                . "LIMIT 1";
        $rs = $mysqli->query($sql);
        $rs = createSmartyRsArray($rs, $mysqli);
        if(isset($rs[0])){
            return $rs[0]['id'];
        }
    }  return false;
}

function getOrdersWithProductsByUser($smarty, $userId, $mysqli){
    $userId = intval($userId);
    $sql = "SELECT * FROM orders "
            . "WHERE `user_id` = '{$userId}' "
            . "ORDER BY id DESC";
    $rs = $mysqli->query($sql);
    $smartyRs = array();
    while($row = $rs->fetch_assoc()){
        $rsChildren = getPurchaseForOrder($smarty, $row['id'], $mysqli);
        
        if($rsChildren){
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs;
}

function getOrders($mysqli){
    $sql = "SELECT o.*, u.name, u.email, u.phone, u.address"
            . " FROM `orders` AS `o`"
            . " LEFT JOIN `users` as `u` ON u.id = o.user_id"
            . " ORDER BY `id` DESC";
    
    $rs = $mysqli->query($sql);
    
    $smartyRs = array();
    while($row = $rs->fetch_assoc()){
        $rsChildren = getProductsForOrder($mysqli, $row['id']);
        
        if($rsChildren){
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs;
}

function getProductsForOrder($mysqli, $orderId){
    $sql = "SELECT * FROM `purchase` AS `pe`"
            . " LEFT JOIN `products` AS `ps` "
            . " ON pe.product_id = ps.id"
            . " WHERE (`order_id` = '{$orderId}')";

    $rs = $mysqli->query($sql);

    return createSmartyRsArray($rs, $mysqli);
}

function updateOrderStatus($mysqli, $itemId, $status){
    
    $status = intval($status);
    $sql = "UPDATE `orders`"
            . " SET `status` = '{$status}'"
            . " WHERE `id` = '{$itemId}'";
    //d($sql);        
    $rs = $mysqli->query($sql);
    
    return $rs;
}

function updateOrderDatePayment($mysqli, $itemId, $datePayment){
    $sql = "UPDATE `orders`"
            . " SET `date_payment` = '{$datePayment}'"
            . " WHERE `id` = '{$itemId}'";
    //d($sql);
    $rs = $mysqli->query($sql);
    
    return $rs;
}