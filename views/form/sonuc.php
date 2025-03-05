<?php require 'views/header.php'; ?>

<body style="overflow-x: hidden;">
  <?php require 'views/navbar.php'; ?>
  <div class="text-center mt-5" style="min-height:100vh">
    <?php

    if (is_array($data)) {
      echo '<div class="alert alert-danger mt-5">';

      foreach ($data as $value) {
        echo $value . "<br>";
      }

      echo '</div>';
    } else {
      echo $data;
    }
    ?>
  </div>
  <?php require 'views/footer.php'; ?>
</body>

</html>