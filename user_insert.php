<?php

include('functions.php');

//入力チェック(受信確認処理追加)
if(
  !isset($_POST['name']) || $_POST['name']=="" ||
  !isset($_POST['lid']) || $_POST['lid']=="" ||
  !isset($_POST['lpw']) || $_POST['lpw']==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$name   = $_POST['name'];
$lid  = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg  = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];

// アップロード関連を追加
if (isset($_FILES['upicon'] ) && $_FILES['upicon']['error'] ==0 ) {
    // ファイルをアップロードしたときの処理
    //アップロードしたファイルの情報取得
    $file_name = $_FILES['upicon']['name'];     //アップロードしたファイルのファイル名
    $tmp_path  = $_FILES['upicon']['tmp_name']; //アップロード先のTempフォルダ
    $file_dir_path = 'upload_icon/';                 //画像ファイル保管先のディレクトリ名，自分で設定する

    //File名の変更
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);              //拡張子の取得
    //メモ　YmdHisで日時　md5は暗号化＝session_idを暗号化して送信する
    $uniq_name = date('YmdHis').md5(session_id()) . "." . $extension;   //ユニークファイル名作成
    $file_name = $file_dir_path.$uniq_name;                             //ファイル名とパス
    //メモ　htmlで表示させる際に使える！下記参照。

    // FileUpload [--Start--]
    $img='';
    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_name ) ) {
            chmod( $file_name, 0644 );  //権限を変更する
        } else {
            exit('Error:アップロードできませんでした．');
        }
    }
    // FileUpload [--End--]
}else{
    // ファイルをアップしていないときの処理
    $img = '画像が送信されていません'; //Error文字
}


//2. DB接続します(エラー処理追加)

$pdo = db_conn();

//３．データ登録SQL作成
$sql = 'INSERT INTO '. $user_table .'(id, name, icon, lid, lpw, kanri_flg, life_flg )
VALUES(NULL, :a1, :icon, :a2, :a3, :a4, :a5)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':icon', $file_name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  //５．index.phpへリダイレクト
  header('Location: login.php');
  exit;
}

?>
