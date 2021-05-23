<?php

//Функция вывода данных
function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

//k - ключ, v - значение
function load($data){
    foreach ($_POST as $k => $v) {

        //Проверяем, существует ли ключ
        if(array_key_exists($k, $data)){
            //Если существует, то к 'field_name' и 'requiered' добавляем еще и 'value'
            $data[$k]['value'] = trim($v); //Удаляем лишние пробелы с конца ("тримим")
        }
    }
    //Возращаем $data с еще одним ключом 'value'
    return $data;
}

function validate($data){
    $errors = '';
    foreach ($data as $k => $v) {
        if($data[$k]['required'] && empty($data[$k]['value'])){
            $errors .= "<li>Вы не заполнили поле {$data[$k]['field_name']}</li>";
        }
    }
    if(!check_captcha($data['captcha']['value'])){
        $errors .= "<li>Неверно заполнено поле Captcha</li>";
    }
    return $errors;
}

//Функция для капчи
function set_captcha(){
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $_SESSION['captcha'] = $num1 + $num2;
    return "Сколько будет {$num1} + {$num2}?";
}

function check_captcha($res){
    return $_SESSION['captcha'] == $res;
}

function send_data($fields, $pdo_settings) {
    $db = new PDO($pdo_settings['dsn'], $pdo_settings['user'], $pdo_settings['pass'], array(PDO::ATTR_PERSISTENT => true));
    try {

        foreach ($fields as $k => $v) {
            debug($v['value']);
            if (isset($v['mailable']) && $v['mailable'] == 0) {
                continue;
            }
            $stmt = $db->prepare("INSERT INTO app SET $k = ?");
            $stmt -> execute([$v['value']]);
        }
//        $stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
//        $stmt->bindParam(':name', $name);
//        $stmt->bindParam(':value', $value);
//
//        $name = 'one';
//        $value = 1;
//        $stmt->execute();
//        $str = implode(',',$_POST['superpowers']);
//
//        $stmt = $db->prepare("INSERT INTO app SET name = ?, email = ?, yearOfBirth = ?, sex = ?, countLimbs = ?, biography = ?");
//        $stmt -> execute([$_POST['name'],$_POST['email'],$_POST['yearOfBirth'],$_POST['sex'],$_POST['countLimbs'],$_POST['biography']]);
//
//        $stmt = $db->prepare("INSERT INTO superpowers SET name = ?");
//        $stmt -> execute([$str]);
        return true;

    }
    catch(PDOException $e){
        print('Error : ' . $e->getMessage());
        return false;
    }
}

//function setCookie(name, value, options = {}) {
//
//    options = {
//        path: '/',
//    // при необходимости добавьте другие значения по умолчанию
//    ...options
//  };
//
//  if (options.expires instanceof Date) {
//      options.expires = options.expires.toUTCString();
//  }
//
//  let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
//
//  for (let optionKey in options) {
//        updatedCookie += "; " + optionKey;
//        let optionValue = options[optionKey];
//    if (optionValue !== true) {
//        updatedCookie += "=" + optionValue;
//    }
//  }
//
//  document.cookie = updatedCookie;
//}

