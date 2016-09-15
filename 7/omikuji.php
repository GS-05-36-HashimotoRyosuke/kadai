<?php
$br = "<br>";
$r = rand(1,5);
if($r==1){
    echo "大吉<br>\n";
}else if($r==2){
    echo "中吉<br>\n";
}
else if($r==3){
    echo "小吉<br>\n";
}
else if($r==4){
    echo "吉<br>\n";
}
else if($r==5){
    echo "凶<br>\n";
}
$name = $_POST["name"];
$age = $_POST["age"];
echo $name."さん".$br;
echo $age."歳";
?>