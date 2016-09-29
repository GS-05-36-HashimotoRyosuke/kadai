<?php
include("bm_functions.php");

$id = $_GET["id"];

$pdo = db_book();


$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id =:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: bm_select.php");
    exit;
}

?>