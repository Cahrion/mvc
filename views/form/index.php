<?php require 'views/header.php'; ?>

<body style="overflow-x: hidden;">
  <?php require 'views/navbar.php'; ?>
  <form action="<?php echo URL; ?>/kayit/addData" method="post">
    <div class="text-center mt-5" style="min-height:100vh">


      <div class="row col-lg-4 mx-auto m-2 border bg-light">
        <div class="col-lg-12 border-bottom"> KAYIT FORMU</div>
        <div class="col-lg-6 p-2">ADI </div>
        <div class="col-lg-6 p-2">
          <input type="text" name="ad" class="form-control" />
        </div>

        <div class="col-lg-6 p-2">SOYADI </div>
        <div class="col-lg-6 p-2"> <input type="text" name="soyad" class="form-control" /> </div>

        <div class="col-lg-6 p-2">YAŞI </div>
        <div class="col-lg-6 p-2"><input type="text" name="yas" class="form-control" /> </div>

        <div class="col-lg-12"> <input type="submit" name="buton" value="EKLE" class="btn btn-success mb-2" /></div>


      </div>
    </div>
  </form>
  <?php require 'views/footer.php'; ?>
</body>

</html>