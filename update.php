<?php
session_start();
include('functions.php');
chk_ssid();

//入力チェック(受信確認処理追加)
if(
  !isset($_POST['shop']) || $_POST['shop']=='' ||
  !isset($_POST['url']) || $_POST['url']=='' ||
  !isset($_POST['comment']) || $_POST['comment']==''
){
  exit('ParamError');
}

//1. POSTデータ取得
$id     = $_POST['id'];
$shop   = $_POST['shop'];
$url    = $_POST['url'];
$comment = $_POST['comment'];
// $icon = $_POST['icon'];
// $lid = $_POST['lid'];

//2. DB接続します(エラー処理追加)
$pdo = db_conn();


//3．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE '. $data_table .' SET shop=:a1, url=:a2, comment=:a3, indate=sysdate() WHERE id=:id ');
$stmt->bindValue(':a1', $shop, PDO::PARAM_STR);
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else if($_SESSION['kanri_flg']==0){
  header('Location: mypage.php');
  exit;
}else if($_SESSION['kanri_flg']==1){
 header('Location: reviewlist_admin.php');
  exit;
}
?>
