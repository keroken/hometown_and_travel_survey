<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
$date = date("Y-m-d H:i:s");
$str = $name.",".$mail.",".$date;
?>

<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<?php
$file = fopen("data/data.csv","a");
flock($file, LOCK_EX);
fwrite($file, $str."\n");
flock($file, LOCK_UN);
fclose($file);
?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>
