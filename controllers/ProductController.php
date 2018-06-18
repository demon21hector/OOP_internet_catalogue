<?php
/**
 * Контроллер страницы продуктов
 */

//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование страницы продуктов
 * @param $smarty
 * @var TYPE_NAME $rsCategories
 *
 */
function indexAction($smarty, $mysqli){

    $itemId = isset($_GET['id'])?$_GET['id'] : null;
    if(!$itemId)exit();

    $rsProduct = getProductById($itemId, $mysqli);          //массив данных о продукте
    $rsCategories = getAllMainCatsWithChildren($mysqli);    //все категории с дитями

    if(in_array($itemId, $_SESSION['cart'])){
        $inCart = 1;
    } else $inCart = 0;
    $smarty->assign('inCart', $inCart);

    $smarty->assign('pageTitle', 'Главная страница');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}