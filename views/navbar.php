<div class="bg-light border  mt-2 px-5 py-2">
    <h5>KAYIT SİSTEMİ</h5>
    <div class="row">
        <div class="col-lg-4 ">
            <a href="<?php echo URL; ?>/Main">ANASAYFA</a> | <a href="<?php echo URL; ?>/kayit/kayitekle">KAYIT EKLE</a> | <a href="<?php echo URL; ?>/kayit/listele">KAYITLARI GÖSTER</a>
        </div>

        <div class="col-lg-4">
            <form action="<?php echo URL; ?>/kayit/arama" method="post">
                <input type="text" name="kelime" placeholder="Kelime" />
                <input type="submit" name="btn" value="ARA" class="btn btn-danger" />
            </form>
        </div>

        <div class="col-lg-4">
            <?php
            if (Session::get("kulad") == true) {
            ?>
                <a href="<?php echo URL; ?>/panel/cikis">ÇIKIŞ YAP</a>
            <?php
            } else {
            ?>
                <a href="<?php echo URL; ?>/login/Form">GİRİŞ YAP</a>
            <?php
            }
            ?>
        </div>


    </div>
</div>