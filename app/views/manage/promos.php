<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <?= $head ?>
     <style>
        .fa-percent {
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <?= $header ?>
    <div class="d-flex justify-content-center pt-5 bg-body-tertiary sticky-top">
        <div class="navbar col-11 d-flex">
            <div class="d-flex justify-content-center col-12 py-5">
                <div class="col-12 d-flex justify-content-between align-items-center text-secondary">
                    <div style="font-size:30px;font-weight:600;">LISTADO DE PROMOCIONES</div>
                    <a href="agregar" class="btn py-2 px-4 bg-azul-500 text-white btn-primary"
                        style="font-size:30px; font-weight: 600;"> + Nueva promo</a>
                </div>
            </div>
        </div>
    </div>


    <?php

    foreach ($promos as $promo) {

        if ($promo == null) {
            echo ("No hay promociones");
        }

        ?>

        <div class="d-flex justify-content-center mt-5">
            <div class="d-flex justify-content-left bg-azul-200 p-5 radio-lg col-10">
                <div class="d-flex justify-content-center align-items-center bg-azul-900 p-1 radio-small col-1 me-2"
                    style="max-height: 55px;max-width: 55px;">
                    <i class="fa fa-percent"></i>
                </div>
                <div class="pl-2 col-7">
                    <span style="font-size:20px;color:gray;"><?= $promo->nombre ?></span>
                    <p style="font-size:30px;" class="my-1">De <?= date("H:i", strtotime($promo->hora_inicio)) ?>hs a
                        <?= date("H:i", strtotime($promo->hora_fin)) ?>hs</p>
                    <p style="font-size:30px;" class="my-1">Del <?= date("d/m/Y", strtotime($promo->fecha_inicio)) ?> al
                        <?= date("d/m/Y", strtotime($promo->fecha_fin)) ?></p>
                    <p style="font-size:30px;font-weight: bold;" class="mt-1"><?= $promo->descuento ?> %</p>
                </div>
                <div class="d-flex justify-content-between align-items-center col-4">
                    <div class="col-8 <?= $promo->estado == 1 ? "alert-success" : "alert-danger" ?> radio-small d-flex justify-content-center p-1"
                        style="font-size:30px;font-weight: bold;"><?= $promo->estado == 1 ? "Activa" : "Inactiva" ?></div>
                    <i class="fa fa-arrow-right"></i>
                </div>
            </div>
        </div>

        <?php

    }
    ?>


</body>

</html>