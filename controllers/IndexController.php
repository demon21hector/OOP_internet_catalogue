<?php

/**
 * Контроллер главной страницы
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование главной страницы сайта
 * @param $smarty
 * @var TYPE_NAME $rsCategories
 *
 */
function indexAction($smarty, $mysqli){
    // + PAGINATION BLOCK
    $paginator = array();
    $paginator['perPage'] = 9;
    $paginator['currentPage'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $paginator['offset'] = $paginator['currentPage'] * $paginator['perPage'] - $paginator['perPage'];
    $paginator['link'] = '/index/?page=';
    
    list($rsProducts, $allCount) = getLastProducts($paginator['offset'], $paginator['perPage'], $mysqli);
    $paginator['pageCnt'] = ceil($allCount / $paginator['perPage']);
    
    $smarty->assign('paginator', $paginator);
    // - PAGINATION BLOCK
    
    $rsCategories = getAllMainCatsWithChildren($mysqli);

    $smarty->assign('pageTitle', 'Главная страница');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}