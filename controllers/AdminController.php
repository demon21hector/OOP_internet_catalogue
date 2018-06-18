<?php

/*
 * AdminController.php
 * Controller for site's backend (/admin/)
 */

// Connecting modules:

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

/**
 * load default admin-page
 * 
 * @param type $smarty
 * @param type $mysqli
 */
function indexAction($smarty, $mysqli) {
    $rsCategories = getAllMainCategories($mysqli);

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('pageTitle', 'Site administration panel');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}

/**
 * Add new category
 * 
 * @param type $smarty
 * @param type $mysqli
 * @return type
 */
function addnewcatAction($smarty, $mysqli) {

    $catName = $_POST['newCategoryName'];
    $catParentId = $_POST['generalCatId'];

    $res = insertCat($mysqli, $catName, $catParentId);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Category was added';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Category was not added';
    }
    echo json_encode($resData);
    return;
}

/**
 * Load category tpl for amin-page
 * 
 * @param type $smarty
 * @param type $mysqli
 */
function categoryAction($smarty, $mysqli) {
    $rsCategories = getAllCategories($mysqli);
    $rsMainCategories = getAllMainCategories($mysqli);

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsMainCategories', $rsMainCategories);
    $smarty->assign('pageTitle', 'Site administration panel - Categories');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}

/**
 * Change categories of products
 * 
 * @param type $smarty
 * @param type $mysqli
 * @return type
 */
function updatecategoryAction($smarty, $mysqli) {
    $itemId = $_POST['itemId'];
    $parenId = $_POST['parentId'];
    $newName = $_POST['newName'];

    $res = updateCategoryData($itemId, $mysqli, $parenId, $newName);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Category was updated';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Category was not updated';
    }
    echo json_encode($resData);
    return;
}
/**
 * Load pade with products management
 * 
 * @param type $smarty
 * @param type $mysqli
 */
function productsAction($smarty, $mysqli) {
    $rsCategories = getAllCategories($mysqli);
    $rsProducts = getProducts($mysqli);

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('pageTitle', 'Site administration panel - Products');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');
}

/**
 * Add new product to DB
 * 
 * @param type $smarty
 * @param type $mysqli
 * @return type
 */
function addproductAction($smarty, $mysqli) {

    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemDesc = $_POST['itemDesc'];
    $itemCat = $_POST['itemCatId'];
    
    $res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat, $mysqli);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Product was updated';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Product was not updated';
    }
    echo json_encode($resData);
    return;
}
/**
 * Change/update information about product
 * 
 * @param type $smarty
 * @param type $mysqli
 * @return type
 */
function updateproductAction($smarty, $mysqli){
    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemStatus = $_POST['itemStatus'];
    $itemDesc = $_POST['itemDesc'];
    $itemCat = $_POST['itemCatId'];

    $res = updateProduct($mysqli, $itemId, $itemName, $itemPrice, 
                         $itemStatus, $itemDesc, $itemCat);
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Product was updated';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Product was not updated';
    }
    echo json_encode($resData);
    return;
}
/**
 * Upload image for products on administrative page
 * 
 * @param type $smarty
 * @param type $mysqli
  */
function uploadAction($smarty, $mysqli){
    $itemId = $_POST['itemId'];
    
    $newFileName = uploadFile($itemId, '/images/products/');
    if($newFileName){
        updateProductImage($mysqli, $itemId, $newFileName);
        redirect('/admin/products/');
    } else {
            echo "Error within upload file";
    }
}

function ordersAction($smarty, $mysqli){
    
    $rsOrders = getOrders($mysqli);
    
    $smarty->assign('rsOrders', $rsOrders);
    $smarty->assign('pageTitle', 'Site administration panel - Orders');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOrders');
    loadTemplate($smarty, 'adminFooter');
}

function setorderstatusAction($smarty, $mysqli){
    $itemId = $_POST['itemId'];
    $status = $_POST['status'];

    $res = updateOrderStatus($mysqli, $itemId, $status);
    
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Status was updated';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Status was not updated';
    }
    echo json_encode($resData);
    return;
}

function setorderdatepaymentAction($smarty, $mysqli){
    $itemId = $_POST['itemId'];
    $datePayment = $_POST['datePayment'];

    $res = updateOrderDatePayment($mysqli, $itemId, $datePayment);
    
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Status was updated';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Status was not updated';
    }
    echo json_encode($resData);
    return;
}
/**
 * Export in XML products database for outsource
 * 
 * @param type $smarty
 * @param type $mysqli
 */
function createxmlAction($smarty, $mysqli){
    $rsProducts = getProducts($mysqli);
    
    $xml = new DOMDocument('1.0', 'utf-8');
    $xmpProducts = $xml->appendChild($xml->createElement('products'));
    foreach ($rsProducts as $product){
        $xmpProduct = $xmpProducts->appendChild($xml->createElement('product'));
        foreach ($product as $key => $val){
            $xmlName = $xmpProduct->appendChild($xml->createElement($key));
            $xmlName->appendChild($xml->createTextNode($val));
        }
    }
    $xml->save($_SERVER["DOCUMENT_ROOT"] . '/xml/products.xml');
    echo 'ok!';
}

/**
 * Load XML file with products to database `products`
 * 
 * @param type $smarty
 * @param type $mysqli
 * @return type
 */
function loadfromxmlAction($smarty, $mysqli){
    $successUploadFileName = uploadFile('import_products', '/xml/import/');
    if(! $successUploadFileName){
        echo 'Error with file upload';
        return;
    }
    $xmlFile = $_SERVER['DOCUMENT_ROOT'] . '/xml/import/' . $successUploadFileName;
    $xmlProducts = simplexml_load_file($xmlFile);

    $products = array(); $i = 0;
    foreach($xmlProducts as $product){
        $products[$i]['name'] = htmlentities($product->name);
        $products[$i]['category_id'] = intval($product->category_id);
        $products[$i]['description'] = htmlentities($product->description);
        $products[$i]['price'] = intval($product->price);
        $products[$i]['status'] = intval($product->status);
        $i++;
    }
    $res = insertImportProducts($mysqli, $products);
    
    if($res){
        redirect('/admin/products/');
    }
}