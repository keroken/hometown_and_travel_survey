<?php
  include 'header.php';

// セッションの開始
session_start();
if (empty($_SESSION)) {exit;}

// 入力内容の取得（$_SESSIONから）
$name = htmlspecialchars($_SESSION["name"],ENT_QUOTES,"UTF-8");
$email = htmlspecialchars($_SESSION["email"],ENT_QUOTES,"UTF-8");
$gender = htmlspecialchars($_SESSION["gender"],ENT_QUOTES,"UTF-8");
$work = htmlspecialchars($_SESSION["work"],ENT_QUOTES,"UTF-8");
$hometown = htmlspecialchars($_SESSION["hometown"],ENT_QUOTES,"UTF-8");
$memory = htmlspecialchars($_SESSION["memory"],ENT_QUOTES,"UTF-8");
$destination = htmlspecialchars($_SESSION["destination"],ENT_QUOTES,"UTF-8");

// 回答受け付け日時の取得
$date_sbm = date("Y/m/d H:i:s");

// データの追加
$line = array($name, $email, $gender, $work, $hometown, $memory, $destination, $date_sbm);
mb_convert_variables("SJIS-win", "UTF-8", $line);//エクセルはSJIS-winしか読まないのでUTF-8からSJIS-winへ変換が必要。
//CSVファイルへの書き込み
$file_name = "data/data.csv";
$file = fopen($file_name, "a");
flock($file, LOCK_EX);
$result = fputcsv($file, $line);
flock($file, LOCK_UN);
fclose($file);

// エラーチェック
if($result) {
  $result_message = "ご回答ありがとうございました。";
} else {
  $result_message = "エラーが発生しました。";
}
echo '<hr/>';
echo '<p>'.$result_message.'</p>';
echo '<hr/>';

// セッションデータの破棄
$_SESSION = array();
session_destroy();
?>

<!-- 処理結果の表示 -->
<?php
  include 'navbar.php';
?>
<!-- FORM_AREA -->
  <div class="form_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h1>【回答完了画面】</h1>
          <h3><?php echo $name ?>様</h3>
          <h3>回答を受け付けました。ありがとうございました！</h3><br />
          <a href="index.php"><button class="btn btn-default">回答一覧へ</button></a>
        </div>
      </div>
    </div>
  </div>
<!-- END FORM_AREA -->

<?php
  include 'footer.php';
?>
