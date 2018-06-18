<?php
/**
 * Контроллер работы с корзиной покупок
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';


/**
 * Добавление продукта в корзину
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if ( ! $itemId) return false;

    $resData = array();

    //если в сессии ЕСТЬ корзина, но НЕТ товара с индексом в базе "$itemID", то добавляем его:
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    }
    else { $resData['success'] = 0; d($_SESSION['cart']);}

    echo json_encode($resData);
}

/**
 * Удаление продукта с номером из корзины
 */
function removefromcartAction(){

    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if ( ! $itemId) exit();

    $resData = array();
    $keyToDelete = array_search($itemId, $_SESSION['cart']);

    //если в корзине ЕСТЬ товар с номером в базе "$itemID", то удаляем его:
    if($keyToDelete !== false){
        unset($_SESSION['cart'][$keyToDelete]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    }
    else { $resData['success'] = 0; d($_SESSION['cart']);}

    echo json_encode($resData);
}

/**
 * Формирование страницы корзины
 * @param $smarty
 * @param $mysqli
 * @link /cart/
 */
function indexAction($smarty, $mysqli){ 

    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllMainCatsWithChildren($mysqli);
    $rsProducts = getProductsFromArray($itemsIds, $mysqli);

    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

/**
 * Оформление заказа товара
 * 
 * @param type $smarty
 * @param type $mysqli
 * @return type
 */
function orderAction($smarty, $mysqli){
   
    //при пустой корзине -> редирект в обратно в корзину
    if(! $_SESSION['cart']){
        redirect();
    }
    $itemsCart = $_POST; //получаем массив с id и кол-вом товара
    
    //Форматируем индексы входящего массива $itemsCart из [text_id] в [id]
    foreach($itemsCart as $id => $cnt ){
        $i = explode('_', $id); 
        $k = $i[1];
        $itemsCart[$k] = $cnt;
        unset($itemsCart[$id]);
    }
    //подгружаем всю инфу из базы по товарам из корзины
    $rsProducts = getProductsFromArray($_SESSION['cart'], $mysqli);
    
    //добавляем в массив инфой по товарам их КОЛИЧЕСТВО для заказа
    foreach ($rsProducts as &$item){
        $item['cnt'] = isset($itemsCart[$item['id']]) ? $itemsCart[$item['id']] : 0;
        if($item['cnt']){
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            unset($item); //хз как это будет работать, надо дебажить!
        }
    }
    if( ! $rsProducts){
        echo "Корзина пуста";
        return;
    }
    $_SESSION['saleCart'] = $rsProducts;
    
    if( ! isset($_SESSION['user'])){
       $smarty->assign('hideLoginBox', "1");
    }
    $rsCategories = getAllMainCatsWithChildren($mysqli);
    
    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
}
/**
 * AJAX-function for save orders data in DB
 * @param type $mysqli
 * @return type
 */
function saveorderAction($smarty, $mysqli){
    //get array of products
    $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
    //if cart is empty -> construct aswer with error and get it back in json-format
    //leave function
    if(!$cart){
        $resData['success'] = 0;
        $resData['message'] = 'No products for order!';
        echo json_encode($resData);
        return;
    }
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    //make new order and get it id back
    $orderId = makeNewOrder($smarty, $name, $phone, $address, $mysqli);
    
    if(! $orderId){
        $resData['success'] = 0;
        $resData['message'] = "Error! Order wasn't created!";
        echo json_encode($resData);
        return;
    }
    
    //Save commodity for current order
    $res = setPurchaseForOrder($orderId, $cart, $mysqli);
    
     if($res){
        $resData['success'] = 1;
        $resData['message'] = "Order saved!";
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
        $resData['message'] = "Error with order-data saving. Order # " . $orderId;  
    }
    echo json_encode($resData);
}