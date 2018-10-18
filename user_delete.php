<?php
session_start();
include('functions.php');
chk_ssid();

//1.POSTでParamを取得
$id = $_GET['id'];

//2.DB接続など
$pdo = db_conn();

//3．データ削除SQL作成
$stmt = $pdo->prepare('DELETE FROM '. $user_table .' WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  //管理者リダイレクト
  header('Location: userlist.php');
  exit;
}

?>
