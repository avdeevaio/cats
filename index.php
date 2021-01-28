<?php
    // Получение данных из тела запроса
    function getFormData($method) {

        // GET: данные возвращаем как есть
        if ($method === 'GET') return $_GET;

        return $data;
    }

    // Определяем метод запроса
    $method = $_SERVER['REQUEST_METHOD'];

    // Получаем данные из тела запроса
    $formData = getFormData($method);


    // Разбираем url
    $url = (isset($_GET['q'])) ? $_GET['q'] : '';
    $url = rtrim($url, '/');
    $urls = explode('/', $url);

    // Определяем роутер и url data
    $router = $urls[0];
    $urlData = array_slice($urls, 1);

    // Подключаем файл-роутер и запускаем главную функцию
    include_once 'routers/' . $router . '.php';
    route($method, $urlData, $formData);
?>