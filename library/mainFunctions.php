<?php
/**
 * Основные функции контроллера страницы
 */

/**
 * Controller and Action activation
 * 
 * @param $smarty               обект для работы с шаблонизатором
 * @param $mysqli               объект для работы с бд
 * @param $controllerName       имя активного контроллера
 * @param string $actionName    функция описания страницы
 */
function loadPage ($smarty, $mysqli, $controllerName, $actionName = 'index') {
    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action';
    $function($smarty, $mysqli);
}

/**
 * @param $smarty
 * @param $templateName
 */
function loadTemplate($smarty, $templateName){
    $smarty->display($templateName . TemplatePostfix);
}

/**
 * Фунция тестирования переменных
 * @param null $value переменная для исследования (null по умолчанию)
 * @param int $die при 0 - продолжение работы, при 1 - остановка выполнения кода
 */
function d($value = null, $die = 1){
    
    function debugOut($a){
        echo '<br /><b>' . basename ($a['file']) . '<br />'
                . "&nbsp;<font color='red'>({$a['line']})</font>"
                . "&nbsp;<font color='green'>{$a['function']}()</font>"
                . "&nbsp; -- " . dirname($a['file']);
    }
    echo '<pre>';
        $trace = debug_backtrace();
        array_walk($trace, 'debugOut');
        echo "\n\n";
        var_dump($value);
    echo '</pre>';
    
    if($die) die;
}

/**
 * Обработка (форматирование) данных из sql-запроса
 * @param type $rs -  необработанный набор данных
 * @param type $mysqli
 * @return boolean false
 *      or array - если даные обработаны
 */
function createSmartyRsArray($rs, $mysqli){
    if( ! $rs) return false;

    $smartyRs = array();
    while($row = $rs->fetch_assoc()){
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

/**
 * Редирект
 * @param string $url адрес перенаправления
 */
function redirect($url = "/"){
    header("Location: {$url}");
    exit();
}

function uploadFile($localFilename, $localPath = '/upload/'){
    $maxFilesize = 2*1024*1024;
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
    $accessExt = array('xml', 'png', 'jpg', 'jpeg');
    $path = $_SERVER['DOCUMENT_ROOT'] . $localPath;
    
    // + ACCESS BLOCK ON
    if(! in_array($ext, $accessExt) ){
        return FALSE;
    }
    if($_FILES["filename"]["size"] > $maxFilesize){
        return FALSE;
    }
    // - ACCESS BLOCK OFF
    
    if($ext == 'xml'){
        $newFilename = $localFilename . '_' . time() . '.' . $ext;
    } else {
        $newFilename = $localFilename . '.' . $ext;
    }

    if(! file_exists($path)){
        mkdir($path);
    }
    
    if(is_uploaded_file($_FILES["filename"]["tmp_name"])){
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $path . $newFilename);
        return ($res == true) ? $newFilename : FALSE;
    } else {
        return FALSE;
    }
}