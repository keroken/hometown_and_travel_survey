<?php
  include 'header.php';
  include 'navbar.php';

// セッションの開始
session_start();

// 入力値の取得・検証・加工
$name = chkString($_POST["name"], "名前");
$email = chkString($_POST["email"], "メールアドレス");
$gender = chkString($_POST["gender"], "性別");
$work = chkString($_POST["work"], "職業", true);
$hometown = chkString($_POST["hometown"], "ふるさと");
$memory = chkString($_POST["memory"], "思い出の場所", true);
$destination = chkString($_POST["destination"], "旅したい国");


// 入力値をセッション変数に格納
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
$_SESSION["gender"] = $gender;
$_SESSION["work"] = $work;
$_SESSION["hometown"] = $hometown;
$_SESSION["memory"] = $memory;
$_SESSION["destination"] = $destination;

// 入力値の検証・加工
function chkString($temp = "", $field, $accept_empty = false) {
    // 未入力チェック
    if (empty($temp) AND !$accept_empty) {
?>
        <div class="form_area">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<?php
        echo "<h3>「{$field}」を入力してください。</h3>";
        echo '<form><input type="button" class="btn btn-default" onclick="history.back()" value="戻る"></form>';
        exit;
?>
              </div>
            </div>
          </div>
        <div>
<?php
    }

    // 入力内容を安全な値に
    $temp = htmlspecialchars($temp, ENT_QUOTES, "UTF-8");

    // 戻り値
    return $temp;
}
?>

<!-- 入力確認フォーム -->
  <div class="form_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h1>【回答内容確認画面】</h1>
        <form role="form" method="POST" action="submit.php">
          <div class="form-group">
            <label for="name">名前:</label>
            <?php echo $name; ?>
          </div>
          <div class="form-group">
            <label for="email">メールアドレス:</label>
            <?php echo $email; ?>
          </div>
          <div class="form-group">
            <label for="gender">性別:</label>
            <?php echo $gender; ?>
          </div>
          <div class="form-group">
            <label for="work">職業:</label>
            <?php echo $work; ?>
          </div>
          <div class="form-group">
            <label for="hometown">ふるさと:</label>
            <?php echo $hometown; ?>
          </div>
          <div class="form-group">
            <label for="memory">思い出の場所:</label>
            <?php echo $memory; ?>
          </div>
          <div class="form-group">
            <label for="destination">旅したい国:</label>
            <?php echo $destination; ?>
          </div>

          <button type="submit" class="btn btn-primary">上記の内容で回答する</button>
          </br></br>
          <input type="button" class="btn btn-default" onclick="history.back()" value="戻る">
        </form>
        </div>
      </div>
    </div>
  </div>

<?php
  include 'footer.php';
?>
