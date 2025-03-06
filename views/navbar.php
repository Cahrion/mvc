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
               href="<?= URL; ?>/data/data"
               role="button"
               >KAYIT EKLE</a
            >
            <a
               name=""
               id=""
               class="btn btn-secondary"
               href="<?= URL; ?>/data/getData"
               role="button"
               >KAYITLAR</a
            >
        </div>

        <div class="col-lg-4 d-flex justify-content-center mb-3">
            <form action="<?php echo URL; ?>/data/searchData" method="post" class="d-flex">
                <input type="text" name="kelime" placeholder="Kelime" style="margin-right:10px"/>
                <input type="submit" name="btn" value="ARA" class="btn btn-danger" />
            </form>
        </div>

        <div class="col-lg-4 d-flex justify-content-end mb-3">
             <a
                name=""
                id=""
                class="btn btn-secondary" style="margin-right:10px;"
                href="<?= URL; ?>/returnTest"
                role="button"
                >Return TEST</a
             >
             <a
                name=""
                id=""
                class="btn btn-secondary" style="margin-right:10px;"
                href="<?= URL; ?>/data/updData"
                role="button"
                >{id?} TEST</a
             >
             <a
                name=""
                id=""
                class="btn btn-secondary" style="margin-right:10px;"
                href="<?= URL; ?>/data/delData/Asd"
                role="button"
                >{\d+} TEST</a
             >
             <a
                name=""
                id=""
                class="btn btn-secondary" style="margin-right:10px;font-size:14px"
                href="<?= URL; ?>/panel"
                role="button"
                >MiddleWare TEST</a
             >
            <?php
            if (Session::get("kulad") == true) {
            ?>
             <a
                name=""
                id=""
                class="btn btn-danger"
                href="<?= URL; ?>/panel/leave"
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