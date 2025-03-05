<?php require 'views/header.php'; ?>

<body style="overflow-x: hidden;">
  <?php require 'views/navbar.php'; ?>
  <div class="text-center mt-5" style="min-height:100vh">
    <h5>PANELDESİN-HOŞGELDİNİZ</h5>
    <?php

    if (is_array($data)) {
      echo '<div class="alert alert-danger mt-5">';

      foreach ($data as $value) {
        echo $value . "<br>";
      }
    } else {

      echo  $data;
    }
    ?>
  </div>
  <?php require 'views/footer.php'; ?>
</body>

</html>