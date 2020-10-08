<?php
    //$_POST = json_decode(file_get_contents("php://input"), true);
    $fio= trim($_POST["fio"]);
    $email  = trim($_POST["email"]);
    echo $fio;
    echo $email;
    $answer = '';
    $pos = strpos($email, "@gmail.com");
    if (empty($fio) || empty($email)) {
        $answer = $answer."Отсутствуют данные ФИО и E-mail.";
    }
    if ($pos === false) {
        echo "Строка '@gmail.com' не найдена в строке '$email'";
    } else {
        $answer = $answer."регистрация пользователей с таким почтовым адресом @gmail.com невозможна";
    }
    echo $answer;
?>