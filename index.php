<?php
require_once(__DIR__ . '/includes/template_top.php');
?>
<section class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><i class="fas fa-mouse"></i> <span id="typewriter"></span></h1>
    <hr class="my-5">
    <p class="lead">全国の銀行コードや支店コードが、頭文字の1文字をクリックするだけで、簡単に検索できます。</p>
    <p class="lead">選択した金融機関は、そのまま、フォームの値に入力されるので、手間がありません。</p>
    <a class="btn btn-light btn-lg" href="#content" role="button">試してみる</a>
  </div>
</section>

<section class="my-5 py-5" id="about">
  <div class="container">
    <article>
      <h2>制作に至った理由</h2>
      <div class="content">
        <p>CMSにおける会員登録のフォームにて、金融機関の情報を入力する場面があり、顧客側の手間をなるべく減らす目的で考案。<br />
          最初は表示されたものをそのまま手入力させる予定でしたが、それではまた入力間違いが発生する可能性があるので、フォームの入力欄に自動入力する形をとりました。<br />
          結果的に、いろんな場面で使用できるものになったと思います。
        </p>
        <p>PHPとMySQLで制作しています。</p>
      </div>
    </article>
  </div>
</section>

<section class="my-5 py-5" id="content">
  <div class="container">
    <article>
      <h2>金融機関検索</h2>
      <div class="content">
        <p class="my-3"><button id="openLink" class="btn btn-secondary">金融機関検索を開始</button></p>
        <form action="#" method="get" class="need-validation" id="form1">
          <div class="row form-group">
            <div class="col-md-4">
              <label for="bankname" class="col-form-label">金融機関名</label>
            </div>
            <div class="col-md-4">
              <input type="text" name="bankname" placeholder="みずほ銀行" class="form-control" required>
            </div>
            <div class="col-md-4">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">銀行コード</span>
                </div>
                <input type="text" name="bankcode" placeholder="4桁数字" class="form-control" required aria-describedby="basic-addon1">
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <label for="bankbranch" class="col-form-label">本支店名</label>
            </div>
            <div class="col-md-4">
              <input type="text" name="bankbranch" placeholder="本店" class="form-control" required>
            </div>
            <div class="col-md-4">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon2">支店コード</span>
                </div>
                <input type="text" name="branchcode" placeholder="4桁数字" class="form-control" required aria-describedby="basic-addon2">
              </div>
            </div>
          </div>
        </form>
      </div>
    </article>
  </div>
</section>

<section class="my-5 py-5" id="download">
  <div class="container">
    <article>
      <h2>ダウンロード</h2>
      <div class="text-left">
        <p></p>
      </div>
    </article>
  </div>
</section>

<section class="my-5 py-5" id="contact">

</section>
<?php
require_once('includes/template_bottom.php');
?>