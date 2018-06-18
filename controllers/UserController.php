<?php
/**
 * Контроллер функций пользователя
 */

include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

function isInArray($array, $key, $default=NULL){
    return isset($array[$key]) ? $array[$key] : $default;        
}

function registerAction($smarty, $mysqli){

    $email = isInArray($_REQUEST, 'email');
    $email = trim($email);
    $pwd1 = isInArray($_REQUEST, 'pwd1');
    $pwd2 = isInArray($_REQUEST, 'pwd2');
    $phone = isInArray($_REQUEST, 'phone');
    $address = isInArray($_REQUEST, 'address');
    $name = isInArray($_REQUEST, 'name');
    $name = trim($name);

    //$resData == null при отсутствии ошибок регистрации
    // или массив с индексами: [message] == код ошибки и [success] != null
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);

    if(!$resData && checkUserEmail($email, $mysqli)){
        $resData['success'] = null;
        $resData['message'] = "Пользователь с таким email ('{$email}') уже существует";
    }

    if(! $resData ){
        $pwdMd5 = md5($pwd1);
        $userData = registerNewUser($email, $pwdMd5, $name, $phone, $address, $mysqli);

        if ($userData['success'] == 1){
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;
            
            $userData = $userData[0];
            
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $userData['email'];

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resData['success'] = null;
            $resData['message'] = 'Ошибка регистрации';}
    }

    echo json_encode($resData);
}

/**
 * Отлогинивание пользователя
 * Возвращаем в ajax 
 */
function logoutAction(){
    $logouted = NULL;
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        $logouted = TRUE;
    }
    redirect();    
}

/**
 * AJAX-авторизация пользователя
 * 
 * @return json Массив данных залогиненного пользователя
 */
function loginAction($smarty, $mysqli){
    $email = trim(isInArray($_REQUEST, 'email'));
    $pwd = trim(isInArray($_REQUEST, 'pwd'));
    
    $userData = loginUser($email, $pwd, $mysqli);
    
    if($userData['success']){
        $userData = $userData[0];
        
        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        
        $resData = $_SESSION['user'];
        $resData['success'] = 1;
        
    } else {
        $resData['success'] = null;
        $resData['message'] = 'Неверные данные авторизации';
    }
    
    echo json_encode($resData);
}

/**
 * Формирование страницы пользователя (кабинет)
 * @param type $smarty
 * @param type $mysqli
 */
function indexAction ($smarty, $mysqli){
    
    if(!isset($_SESSION['user'])){
        redirect();
    }
    
    $rsCategories = getAllMainCatsWithChildren($mysqli);    //все категории с дитями
    $rsUserOrders = getCurUserOrders($smarty, $mysqli);
      
    $smarty->assign('pageTitle', 'Главная страница');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsUserOrders', $rsUserOrders);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}

function updateAction($smarty, $mysqli){
    if(!isset($_SESSION['user'])){
        redirect();
    }
    $resData = array();
    $email = $_SESSION['user']['email'];
    $curPwd = isInArray($_REQUEST, 'curPwd');
    $pwd1 = isInArray($_REQUEST, 'newPwd1');
    $pwd2 = isInArray($_REQUEST, 'newPwd2');
    $phone = isInArray($_REQUEST, 'newPhone');
    $address = isInArray($_REQUEST, 'newAddress');
    $name = isInArray($_REQUEST, 'newName');
    
    $curPwdMD5 = md5($curPwd); //хэш пароля подтверждения
    if( ! $curPwd || $_SESSION['user']['pwd'] != $curPwdMD5){
        $resData['success'] = 0;
        $resData['message'] = "Текущий пароль не верен!";
    } else{
        $resUpdate = updateUserData($email, $name, $phone, $address, $pwd1, $pwd2, $curPwdMD5, $mysqli);

        if($resUpdate){
            $resData['success'] = 1;
            $resData['message'] = 'Данные успешно сохранены';
            
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['phone'] = $phone;
            $_SESSION['user']['address'] = $address;
            $_SESSION['user']['pwd'] = $pwd1 ? md5($pwd1) : $_SESSION['user']['pwd'];
            
            $resData['userName'] = $_SESSION['user']['dislayName'] = $name ? $name : $email;
        } else {
            $resData['success'] = 0;
            $resData['message'] = "Ошибка. Проверьте вводимые данные!";
        }
    }
    echo json_encode($resData);
}