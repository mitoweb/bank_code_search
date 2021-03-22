<?php
//$id:template_bottom.php;
?>
</main>
<?php
include_once('footer.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
  const typewriter = (param) => {

    let el = document.querySelector(param.el);
    let speed = param.speed;
    let string = param.string.split("");
    string.forEach((char, index) => {
      setTimeout(() => {
        el.textContent += char;
      }, speed * index);
    });
  };
  typewriter({
    el: "#typewriter",
    string: "1文字クリックで簡単検索・楽ちん入力",
    speed: 200
  });

  $(function() {
        let topBtn = $('#to_top');
        topBtn.hide();
        $(window).scroll(function() {
          if ($(this).scrollTop() > 100) {
            topBtn.fadeIn();
          } else {
            topBtn.fadeOut();
          }
        });

        topBtn.click(function() {
          $('body,html').animate({
            scrollTop: 0
          }, 1000);
          return false;
        });

        $('a').click(function() {
          if ($(this).is(['name'])) {

          }
        });

        $("#openLink").on('click', function() {
            window.open('search.php', 'search', 'top=50,left=50,width=800,height=400');
              return false;
            });
        });
</script>
</body>

</html>