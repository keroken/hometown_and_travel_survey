<?php
  include 'header.php';
  include 'navbar.php';
?>

<div class="form_area">
  <div class="container">
    <div class="row">
      <div class="form-group">
      <input id="start_btn" type="button" class="btn btn-primary" onclick="location.href='form.php'" value="アンケートに回答する">
      </div>
      <div class="container">
        <table border="1px" class="table-responsive table-striped table-hover">
          <tr><th>名前</th><th>メールアドレス</th><th>性別</th><th>職業</th><th>ふるさと</th><th>思い出の場所</th><th>旅したい国</th>
  <?php
  //CSVファイルの読み込み
  $file_name = "data/data.csv";
  $file = fopen($file_name, 'r');
  while (($data = fgetcsv($file)) !== FALSE) {
    mb_convert_variables("utf-8","SJIS-win",$data);
      	echo '<tr>';
        	echo ' <td>',$data[0],'</td>';
        	echo ' <td>',$data[1],'</td>';
        	echo ' <td>',$data[2],'</td>';
          echo ' <td>',$data[3],'</td>';
          echo ' <td><a href="https://google.co.jp/maps/place/',$data[4],'" target="_blank">',$data[4],'</a></td>';
          echo ' <td><a href="https://google.co.jp/search?q=',$data[5],'" target="_blank">',$data[5],'</a></td>';
          echo ' <td><a href="https://google.com/maps/place/',$data[6],'" target="_blank">',$data[6],'</a></td>';
      	echo '</tr>';
    }
  fclose($file);
  ?>
      </table>
    </div>
    </div>
  </div>
</div>

<?php
  include 'footer.php';
?>
