<?php
require(__DIR__ . '/includes/core.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>金融機関コード検索</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./includes/style.css">
</head>

<body>
  <main style="padding-top:10px;">
    <?php
    if (isset($_GET['gid']) && ((int)$_GET['gid'] > 0)) {
    ?>
      <section class="info">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="table-secondary">銀行コード</th>
              <th class="table-secondary">銀行名</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $gid = getInput($_GET['gid']);

            $sql = "select ginko_id, ginko_code_id, ginko_name from `ginko` where branch=1 and gojuon_id=:gid order by ginko_name_kana ";

            $prepare = $dbh->prepare($sql);
            $prepare->bindValue(':gid', $gid, PDO::PARAM_INT);
            $prepare->execute();

            if ($prepare->rowCount() > 0) {
              while ($result = $prepare->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                  <td><a href="search.php?cid=<?= $result['ginko_code_id']; ?>" style="display:block;"><?= $result['ginko_code_id']; ?></a></td>
                  <td><a href="search.php?cid=<?= $result['ginko_code_id']; ?>" style="display:block;"><?= $result['ginko_name']; ?></a></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
        <div class=" text-center m-5"><a href="search.php" class="btn btn-outline-secondary">戻る</a></div>
      </section>


      <?php
    } elseif (isset($_GET['cid']) && ((int)$_GET['cid'] > 0)) {
      $cid = getInput($_GET['cid']);

      $sql = "select ginko_id, ginko_name from `ginko` where ginko_code_id=:code_id limit 0,1 ";
      $prepare = $dbh->prepare($sql);
      $prepare->bindValue(':code_id', $cid, PDO::PARAM_INT);
      $prepare->execute();

      $ginko = $prepare->fetch(PDO::FETCH_ASSOC);

      if (isset($_GET['goid']) && ((int)$_GET['goid'] > 0)) {
        $goid = getInput($_GET['goid']);
      ?>
      <section class="info">
        <p>ボタンをクリックで、フォームに自動入力します。</p>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="bg-light">銀行コード</th>
              <th class="bg-light">銀行名称</th>
              <th class="bg-light">支店コード</th>
              <th class="bg-light">支店名</th>
              <th class="bg-light">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql2 = "select ginko_id, siten_code_id, ginko_name, branch from `ginko` where ginko_code_id = :code_id and gojuon_id = :gojuon_id order by ginko_name_kana";

            $prepare2 = $dbh->prepare($sql2);
            $prepare2->bindValue(':code_id', $cid, PDO::PARAM_INT);
            $prepare2->bindValue(':gojuon_id', $goid, PDO::PARAM_INT);
            $prepare2->execute();

            if ($prepare2->rowCount() > 0) {
              $row = 0;
              while ($result2 = $prepare2->fetch(PDO::FETCH_ASSOC)) {
                $row++;
            ?>
                <tr>
                  <td><span id="ginko_id<?php echo $row; ?>"><?php echo $cid; ?></span></td>
                  <td><span id="ginko_name<?php echo $row; ?>"><?php echo $ginko['ginko_name']; ?></span></td>
                  <td><span id="siten_id<?php echo $row; ?>"><?php echo $result2['siten_code_id']; ?></span></td>
                  <td><span id="siten_name<?php echo $row; ?>"><?php echo $result2['ginko_name']; ?></span></td>
                  <td><button class="btn btn-outline-success btn-block" id="push<?php echo $row; ?>" data-n="<?php echo $row; ?>">クリック</button></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>

        <div class=" text-center m-5"><a href="search.php" class="btn btn-outline-secondary">戻る</a>
      </section>

      <?php
      } else {
      ?>
      <section class="info">
        <p>支店名の先頭の文字を選択してください。</p>
        <div class="d-flex gojuon">
          <?php
            $sql2 = "select gojuon_id, gojuon_name, gojuon_group_id from `gojuon` where gojuon_group_top = 1 order by gojuon_id ";
            $prepare2 = $dbh->prepare($sql2);
            $prepare2->execute();

            if ($prepare2->rowCount() > 0) {
              while ($gojuon = $prepare2->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <div class="d-flex flex-column">
            <a class="btn1" href="search.php?cid=<?= $cid; ?>&goid=<?= $gojuon['gojuon_id']; ?>"><?= $gojuon['gojuon_name']; ?></a>
          <?php
                $sql3 = "select gojuon_id, gojuon_name from `gojuon` where gojuon_group_top<>:group_top and gojuon_group_id =:group_id  order by gojuon_id ";
                $prepare3 = $dbh->prepare($sql3);
                $prepare3->bindValue(':group_top', 1, PDO::PARAM_INT);
                $prepare3->bindValue(':group_id', $gojuon['gojuon_group_id'], PDO::PARAM_INT);
                $prepare3->execute();

                if ($prepare3->rowCount() > 0) {
                  while ($gojuon2 = $prepare3->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <a class="btn1" href="search.php?cid=<?= $cid; ?>&goid=<?= $gojuon2['gojuon_id']; ?>"><?= $gojuon2['gojuon_name']; ?></a>

          <?php
                  }
                }
          ?>
          </div>
          <?php
              }
            }
          ?>
        </div>

        <div class=" text-center m-5"><a href="search.php" class="btn btn-outline-secondary">戻る</a>
      </section>
        
      <?php
      }
      ?>
      
      <?php
    } else {
      ?>
        <section class="info my-3 p-2">
          <h1 class="m-2">金融機関コード</h1>
          <p>お探しの金融機関の先頭の文字を選択してください。</p>

          <div class="d-flex gojuon">
            <?php
            $sql = "select * from `gojuon` where gojuon_group_top=:group_top order by gojuon_id ";

            $prepare = $dbh->prepare($sql);
            $prepare->bindValue(':group_top', 1, PDO::PARAM_INT);
            $prepare->execute();

            while ($gojuon = $prepare->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <div class="d-flex flex-column">
                <a class="btn1" href="search.php?gid=<?= $gojuon['gojuon_id']; ?>"><?= $gojuon['gojuon_name']; ?></a>
                <?php
                $sql2 = "select gojuon_id, gojuon_name from `gojuon` where gojuon_group_top<>:group_top and gojuon_group_id =:ggid order by gojuon_id";
                $prepare2 = $dbh->prepare($sql2);
                $prepare2->bindValue(':group_top', 1, PDO::PARAM_INT);
                $prepare2->bindValue(':ggid', $gojuon['gojuon_group_id'], PDO::PARAM_INT);
                $prepare2->execute();

                while ($gojuon2 = $prepare2->fetch(PDO::FETCH_ASSOC)) {
                ?>
                  <a class="btn1" href="search.php?gid=<?= $gojuon2['gojuon_id']; ?>"><?= $gojuon2['gojuon_name']; ?></a>
                <?php
                }
                ?>
              </div>
            <?php
            }
            ?>
          </div>
        </section>
      <?php
    }
      ?>

  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $("[id^=push]").click(function() {
      var index = $(this).data("n");

      var ginko_id = $("#ginko_id" + index).text();
      var ginko_name = $("#ginko_name" + index).text();
      var siten_id = $("#siten_id" + index).text();
      var siten_name = $("#siten_name" + index).text();

      window.opener.$('#form1 input[name="bankname"]').val(ginko_name);
      window.opener.$('#form1 input[name="bankcode"]').val(ginko_id);
      window.opener.$('#form1 input[name="bankbranch"]').val(siten_name);
      window.opener.$('#form1 input[name="branchcode"]').val(siten_id);
      window.close();
    });
  </script>
</body>

</html>