<?php

//Функция вывода данных
function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

//k - ключ, v - значение
function load($data) {
    foreach ($_POST as $k => $v) {

        //Проверяем, существует ли ключ
        if(array_key_exists($k, $data)) {
             //Если существует, то к 'field_name' и 'requiered' добавляем еще и 'value'
            $data[$k]['value'] = trim($v);     //Удаляем лишние пробелы с конца ("тримим")
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
    return $errors;
}