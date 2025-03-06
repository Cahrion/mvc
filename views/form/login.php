
<?php require 'views/header.php'; ?>

<body style="overflow-x: hidden;">
  <?php require 'views/navbar.php'; ?>
  <form action="<?php echo URL; ?>/Login/accountCheck" method="post">
    <div class="text-center mt-5" style="min-height:100vh">
      <div class="row col-lg-4 mx-auto m-2 border bg-light">
        <div class="col-lg-12 border-bottom">GİRİŞ FORMU</div>
        <div class="col-lg-6 p-2">KULLANICI ADI </div>
        <div class="col-lg-6 p-2">
          <input type="text" name="ad" class="form-control" />
        </div>

        <div class="col-lg-6 p-2">ŞİFRE </div>
        <div class="col-lg-6 p-2"> <input type="password" name="sifre" class="form-control" /> </div>

        <div class="col-lg-12"> <input type="submit" name="buton" value="GİRİŞ YAP" class="btn btn-success mb-2" /></div>
      </div>
    </div>
  </form>
  <?php require 'views/footer.php'; ?>
</body>

</html>