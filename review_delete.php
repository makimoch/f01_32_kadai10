<?php
session_start();
include('functions.php');
chk_ssid();

//1.POSTでParamを取得
$id = $_GET['id'];

//2.DB接続など
$pdo = db_conn();

//3．データ削除SQL作成
$stmt = $pdo->prepare('DELETE FROM '. $data_table .' WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else if($_SESSION['kanri_flg']==0){
  //一般ユーザーリダイレクト
  header('Location: mypage.php');
  exit;
}else if($_SESSION['kanri_flg']==1){
  //管理者リダイレクト
  header('Location: reviewlist_admin.php');
  exit;
}

?>
