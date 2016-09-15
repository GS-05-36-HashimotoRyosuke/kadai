<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p><?= $name ?></p>
    //phpのショートカット　環境によって使えるかどうかが決まる
    <p><?php echo $mail; ?></p>
</body>
</html>