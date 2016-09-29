<?php
session_start();
include("bm_functions.php");

//パラメーターチェック
if(
    !isset($_POST["lid"]) || $_POST["lid"]=="" ||
    !isset($_POST["lpw"]) || $_POST["lpw"]==""
    )
{
    header("Location: bm_login.php");
    exit();
}


//１．接続します
$pdo = db_book();
//データ登録SQL
$sql="SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $_POST["lid"]);
$stmt->bindValue(':lpw', $_POST["lpw"]);
$res = $stmt->execute();


//SQL実行時にエラーがある場合
if($res==false){
    queryError($stmt);
}

//5.抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能
$val = $stmt->fetch();

//6.該当レコードがあればSESSIONに値を代入
if( $val["id"] !=""){
    $_SESSION["schk"] = session_id();
    $_SESSION["name"] = $val["name"];
    $_SESSION["kanri_flg"] =$val["kanri_flg"];
    header("Location: bm_select.php");
}else{
    //logout処理を経由して全画面へ
    header("Location: bm_login.php");
}

exit();

?>