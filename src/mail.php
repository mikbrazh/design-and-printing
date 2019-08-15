<?php

$method = $_SERVER['REQUEST_METHOD'];

$sitename = "designprint.local";
$from = "mikbrazh@yandex.ru";
$to = "mikbrazh@gmail.com";
// $to = "e.brazhnik2017@gmail.com";

$color = false; // Переключает чередование цветов ячеек таблицы

$formId = isset( $_POST['form_id'] ) ? $_POST['form_id'] : 1; // Получаем значение form_id

if ( $formId == 2) { // Формируем письмо из формы с form_id == 2

  $subject= "СРОЧНО! Перезвоните клиенту с сайта \"$sitename\"";
  $name  = trim($_POST["user_name"]);
  $phonenumber  = trim($_POST["user_phonenumber"]);

  $table .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
      <td style='padding: 10px; border: #e9e9e9 1px solid; width: 15%'><b>Имя:</b></td>
      <td style='padding: 10px; border: #e9e9e9 1px solid;'>$name</td>
    </tr>";

  $table .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid; width: 15%'><b>Телефон:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$phonenumber</td>
  </tr>";

  $table = "<table style='width: 100%;'>$table</table>";

}
else { // Формируем письмо из формы с form_id != 2

  $subject= "СРОЧНО! Сообщение с сайта \"$sitename\"";
  $name  = trim($_POST["user_name"]);
  $phonenumber  = trim($_POST["user_phonenumber"]);
  $email = trim($_POST["user_email"]);
  $message = trim($_POST["user_message"]);

  $table .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid; width: 10%'><b>Имя:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$name</td>
  </tr>";

  $table .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid; width: 10%'><b>Телефон:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$phonenumber</td>
  </tr>";

  $table .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid; width: 10%'><b>Эл. почта:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$email</td>
  </tr>";

  $table .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid;vertical-align: top; width: 10%'><b>Сообщение:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$message</td>
  </tr>";

  $table = "<table style='width: 100%;'>$table</table>";

}

// Кодируем текст в base64, чтобы небыло кракозябры
function adopt($text) {
  return '=?UTF-8?B?'.base64_encode($text).'?=';
}

// Формируем заголовки письма
$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
"From: '.adopt($name).' <'.$from.'>" . PHP_EOL .
"Reply-To: '.$from.'" . PHP_EOL;

// Отправляем письмо
mail($to, adopt($subject), $table, $headers );