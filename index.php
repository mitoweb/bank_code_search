<?php
require_once(__DIR__ . '/includes/template_top.php');
?>
<section class="my-5 py-5" id="content">
  <div class="container">
    <article class="p-5">
      <h2 class="mb-5">金融機関検索</h2>
      <div class="content">
        <p class="my-3"><button id="openLink" class="btn btn-info">金融機関検索を開始</button></p>
        <form action="#" method="get" class="need-validation border p-5 my-5" id="form1">
          <div class="row form-group mb-5">
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
          <div class="row form-group mb-5">
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
<?php
require_once('includes/template_bottom.php');
?>
