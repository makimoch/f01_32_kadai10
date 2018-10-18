<!DOCTYPE html>
<html lang="ja">
<head>
      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous">
  <title>User登録/ひそコミ</title>
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4">
      <a class="navbar-brand" href="#">みんなのひそコミ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">>>> Top </a>
        </ul>
      </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
      <div class="container">
        <fieldset>
          <h1 class="h3 mb-3 font-weight-normal">User登録</h1>
          <label>UserName：<input type="text" name="name" autofocus></label><br>
          <label>Icon：<input type="file" name="upicon" accept="image/*" capture="camera"></label></br>
          <label>Login ID：<input name="lid" type="name"></label><br>
          <label>Password：<input type="password" name="lpw"></label><br>
          <input type="hidden" name="kanri_flg" value="0">
          <input type="hidden" name="life_flg" value="0">
          <button type="submit" class="btn btn-primary">登録</button>
        </fieldset>
      </div>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
