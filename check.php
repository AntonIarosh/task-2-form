<?php
    $fio = "Не известно";
    $email = "Не известно";
    if (isset($_POST['fio'])) $fio  = $_POST['fio'];
    if (isset($_POST['email'])) $email  = $_POST['email'];
    $pos = strpos($email, "@gmail.com");
    echo "Ваше ФИО: $fio  <br> Ваш email: $email";
    echo "</br>";
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
    echo "</br>";
    echo $answer;
?>