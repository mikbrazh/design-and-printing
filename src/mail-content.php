<?php

// Переменные
$sitename = "design-print.spb.ru";

// Формирование письма
$color = false; // Переключает чередование цветов ячеек таблицы

$formId = isset( $_POST['form_id'] ) ? $_POST['form_id'] : 1; // Получаем значение form_id

if ( $formId == 2) { // Формируем письмо из формы с form_id == 2

  $subject= "СРОЧНО! Перезвоните клиенту с сайта \"$sitename\"";
  $name  = trim($_POST["user_name"]);
  $phonenumber  = trim($_POST["user_phonenumber"]);

  $content .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
      <td style='padding: 10px; border: #e9e9e9 1px solid; width: 15%'><b>Имя:</b></td>
      <td style='padding: 10px; border: #e9e9e9 1px solid;'>$name</td>
    </tr>";

  $content .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid; width: 15%'><b>Телефон:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$phonenumber</td>
  </tr>";

  $content = "<h2>СРОЧНО! Перезвоните клиенту с сайта \"design-print.spb.ru\"</h2>

  <table style='width: 100%;'>$content</table>

  <table style='font-family: Arial, Helvetica, sans-serif; font-size: 10px; margin-top: 10px'>
    <tbody>
      <tr style='font-size: 14px;'>
       <td style='color: #2b2e83'>
         <b>Создание и тех. поддержка сайтов</b>
       </td>
      </tr>
      <tr>
       <td rowspan='6'>
         <a href='http://design-print.spb.ru/' target='_blank'><img src='https://res.cloudinary.com/mikbrazh/image/upload/v1570019272/design-print/design-print-logo_j44zzy.png' height='90'/></a>
       </td>
      </tr>
      <tr>
       <td>
         <span>Телефон:</span> <a href='tel:+9052250523' style='color: #009fe3'>+7 (905) 225-05-23</a>
       </td>
      </tr>
      <tr>
       <td>
         <span>ВКонтакте:</span> <a style='color: #009fe3' href='https://vk.com/designprint2018' target='_blank'>vk.com/designprint2018</a>
       </td>
      </tr>
      <tr>
       <td>
         <span>Instagram:</span>
         <a class='social-elem' style='color: #009fe3' href='https://instagram.com/design_print_2018/' target='_blank'>instagram.com/design_print_2018</a>
       </td>
      </tr>
      <tr>
       <td>
         <span>Whatsapp:</span> <a style='color: #009fe3' href='https://wa.me/79052250523whatsapp/?text=Здравствуйте!' target='_blank'>+7 (905) 225-05-23</a>
       </td>
      </tr>
      <tr>
       <td>
         <span>Viber:</span> <span style='color: #2b2e83'>+7 (905) 225-05-23</span>
       </td>
      </tr>
    </tbody>
  </table>

  ";

}
else { // Формируем письмо из формы с form_id != 2

  $subject= "СРОЧНО! Сообщение с сайта \"$sitename\"";
  $name  = trim($_POST["user_name"]);
  $phonenumber  = trim($_POST["user_phonenumber"]);
  $email = trim($_POST["user_email"]);
  $message = trim($_POST["user_message"]);

  $content .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid; width: 10%'><b>Имя:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$name</td>
  </tr>";

  $content .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid; width: 10%'><b>Телефон:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$phonenumber</td>
  </tr>";

  $content .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid; width: 10%'><b>Эл. почта:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$email</td>
  </tr>";

  $content .= "" . ( ($color = !$color) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
    <td style='padding: 10px; border: #e9e9e9 1px solid;vertical-align: top; width: 10%'><b>Сообщение:</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$message</td>
  </tr>";

  $content = "<h2>СРОЧНО! Сообщение с сайта \"design-print.spb.ru\"</h2>

  <table style='width: 100%;'>$content</table>

  <table style='font-family: Arial, Helvetica, sans-serif; font-size: 10px; margin-top: 10px'>
    <tbody>
      <tr style='font-size: 14px;'>
       <td style='color: #2b2e83'>
         <b>Создание и тех. поддержка сайтов</b>
       </td>
      </tr>
      <tr>
       <td rowspan='6'>
         <a href='http://design-print.spb.ru/' target='_blank'><img src='https://res.cloudinary.com/mikbrazh/image/upload/v1570019272/design-print/design-print-logo_j44zzy.png' height='90'/></a>
       </td>
      </tr>
      <tr>
       <td>
         <span>Телефон:</span> <a href='tel:+9052250523' style='color: #009fe3'>+7 (905) 225-05-23</a>
       </td>
      </tr>
      <tr>
       <td>
         <span>ВКонтакте:</span> <a style='color: #009fe3' href='https://vk.com/designprint2018' target='_blank'>vk.com/designprint2018</a>
       </td>
      </tr>
      <tr>
       <td>
         <span>Instagram:</span>
         <a class='social-elem' style='color: #009fe3' href='https://instagram.com/design_print_2018/' target='_blank'>instagram.com/design_print_2018</a>
       </td>
      </tr>
      <tr>
       <td>
         <span>Whatsapp:</span> <a style='color: #009fe3' href='https://wa.me/79052250523whatsapp/?text=Здравствуйте!' target='_blank'>+7 (905) 225-05-23</a>
       </td>
      </tr>
      <tr>
       <td>
         <span>Viber:</span> <span style='color: #2b2e83'>+7 (905) 225-05-23</span>
       </td>
      </tr>
    </tbody>
  </table>

  ";
}