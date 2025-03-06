<div class="bg-light border  mt-2 px-5 py-2">
    <h5>KAYIT SİSTEMİ</h5>
    <div class="row">
        <div class="col-lg-4 mb-3">
            <a
               name=""
               id=""
               class="btn btn-secondary"
               href="<?= URL; ?>/Main"
               role="button"
               >ANASAYFA</a
            >
            <a
               name=""
               id=""
               class="btn btn-secondary"
               href="<?= URL; ?>/kayit/kayitekle"
               role="button"
               >KAYIT EKLE</a
            >
            <a
               name=""
               id=""
               class="btn btn-secondary"
               href="<?= URL; ?>/kayit/listele"
               role="button"
               >KAYITLARI EKLE</a
            >
        </div>

        <div class="col-lg-4 d-flex justify-content-center mb-3">
            <form action="<?php echo URL; ?>/kayit/arama" method="post" class="d-flex">
                <input type="text" name="kelime" placeholder="Kelime" style="margin-right:10px"/>
                <input type="submit" name="btn" value="ARA" class="btn btn-danger" />
            </form>
        </div>

        <div class="col-lg-4 d-flex justify-content-end">
            <?php
            if (Session::get("kulad") == true) {
            ?>
             <a
                name=""
                id=""
                class="btn btn-danger"
                href="<?= URL; ?>/panel/cikis"
                role="button"
                >ÇIKIŞ YAP</a
             >
            
            <?php
            } else {
            ?>
            <a
               name=""
               id=""
               class="btn btn-primary"
               href="<?= URL; ?>/login/Form"
               role="button"
               >GİRİŞ YAP</a
            >
            <?php
            }
            ?>
        </div>


    </div>
</div>