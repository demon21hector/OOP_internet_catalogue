<?php
/**
 * Контролер страницы категорий (/category/1)
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function indexAction($smarty, $mysqli){
    $catId = isset($_GET['id'])?$_GET['id'] : null;
    if(!$catId)exit();

    $rsProducts  = null;
    $rsChildCats = null;
    $rsCategory = getCategoryById($catId, $mysqli);

    //если категория главная (parent_id == 0) -> показываем дочерние категории
    //если категория дочерняя -> показываем продукцию категории
    if($rsCategory['parent_id'] == 0){
        $rsChildCats = getChildrenForCat($catId, $mysqli);
    }
    else {
        $rsProducts = getProductsByCat($catId, $mysqli);
    }

    //готовим переменные к выводу через Smarty
    $rsCategories = getAllMainCatsWithChildren($mysqli);

    $smarty->assign('pageTitle', 'Товары категории ' . $rsCategory['name']);

    $smarty->assign('rsCategory', $rsCategory);     //текущая категория
    $smarty->assign('rsProducts', $rsProducts);     //parent_id == 3+       ->массив продуктов
    $smarty->assign('rsChildCats', $rsChildCats);   //parent_id == 1, 2  ->массив с дочерними категориями относительно текущей

    $smarty->assign('rsCategories', $rsCategories); //многомерный массив (с элементами в виде массивов) с главными и дочерними категориями

    loadTemplate($smarty, 'header'); 
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}
