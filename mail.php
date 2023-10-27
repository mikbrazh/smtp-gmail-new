<?php

require_once __DIR__ . '/vendor/autoload.php';
$settings = require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/functions.php';

if (isset($_POST)) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = [
       'day' => date('d.m.Y'),
       'time' => date('H:i'),
    ];        

    $body = "<p style=\"font-size: 18px\"><strong>Имя:</strong> $name</p>\n
             <p style=\"font-size: 18px\"><strong>E-mail:</strong> $email</p>\n
             <p style=\"font-size: 18px\"><strong>Отправлено:</strong> {$date['day']} в {$date['time']}</p>\n
             <p style=\"font-size: 18px\"><strong>Сообщение:</strong> $message</p>\n";


$attachments = [];

if($_FILES)
{
    foreach ($_FILES["uploads"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_filename = $_FILES["uploads"]["tmp_name"][$key];
            $filename = "uploads/" . $_FILES["uploads"]["name"][$key];
            move_uploaded_file($tmp_filename, "$filename");
            array_push($attachments, $filename);
        }
    }
    echo "Файлы загружены";
} else {
    echo "Файл НЕ загружен";
}

    // $attachments = [
    //     __DIR__ . "uploads/" . $_FILES["uploads"]["name"][$key],
    // ];

    // $attachments = $photo;

    // var_dump($image);

//    echo $image["name"];
//    echo $image["type"];
//    echo $image["size"];
//    echo $image["tmp_name"];
//    echo $image["error"];

    var_dump(send_mail($settings['mail_settings_prod'], ['e-mail_to'], "Письмо с SMPT mikbrazh – отправитель $name", $body, $attachments));

}


// if ($_FILES && $_FILES["image"]["error"]== UPLOAD_ERR_OK)
// {
//     $name = "uploads/" . $_FILES["image"]["name"];
//     move_uploaded_file($_FILES["image"]["tmp_name"], $name);
//     echo "Файл загружен";
// } else {
//     echo "Файл НЕ загружен";
// }



// $image = $_FILES['image'];