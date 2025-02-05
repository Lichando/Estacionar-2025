<!-- <nav>
    <div class="brand">
        <a href="#PATH#home/inicio" class="name-brand">EstacionApp</a>
    </div>
    <ul>
        <li><a href="#PATH#"></a></li>
        <li><a href="#PATH#"></a></li>
        <li><a href="#PATH#"></a></li>
    </ul>
</nav> -->
<?php

$tituloMenu = '';

$rolSession='';

$datos = '';
$franja = '';
$tarifa = '';
$promociones= '';
$cochera = '';
$gestionUser = '';
$perfil = '';


$classDatos = '';
$classFranja = '';
$classTarifa = '';
$classPromociones= '';
$classCochera = '';
$classGestionUser = '';
$classPerfil = '';
if (isset($_SESSION)) {
    $datos=$_SESSION['datos'];
    $franja=$_SESSION['franja'];
    $tarifa=$_SESSION['tarifa'];
    $promociones=$_SESSION['promociones'];
    $cochera=$_SESSION['cochera'];
    $gestionUser=$_SESSION['gestionUser'];
    $perfil=$_SESSION['perfil'];
}else{
    $datos=1;
    $franja=1;
    $tarifa=1;
    $promociones=1;
    $cochera=1;
    $gestionUser=1;
    $perfil=1;
}

if (isset($_SESSION)) {
    $rolSession=$_SESSION['rol'];
}else{
    $rolSession=6;
}

if($rol===1){
    //1=root
}
if($rol===2){
    //2=superAdmin
    $tituloMenu = 'SuperAdmin';
}
if($rol===3){
    //3=Admin
    $tituloMenu = 'Administrador'/*.$_SESSION['nombre']*/;
}
if($rol===4){
    //5=operador
    $tituloMenu = 'Operador: '/*.$_SESSION['nombre']*/;
}
if($rol===5){
    //4=usuario
    $tituloMenu = 'Usuario: '/*.$_SESSION['nombre']*/;
}
if($rol===6){
    //6=guest
    $tituloMenu = 'Invitado';
}

if ($datos===1) {
    $disable=true;
    $classDatos = $disable ? 'disable' : '';
} else {
    $classDatos =  '';
}
if ($franja===1) {
    $disable=true;
    $classFranja = $disable ? 'disable' : '';
} else {
    $classFranja =  '';
}
if ($tarifa===1) {
    $disable=true;
    $classTarifa = $disable ? 'disable' : '';
}else {
    $classTarifa =  '';
}
if ($promociones===1) {
    $disable=true;
    $classPromociones = $disable ? 'disable' : '';
}else {
    $classPromociones =  '';
}
if ($cochera===1) {
    $disable=true;
    $classCochera = $disable ? 'disable' : '';
}else {
    $classCochera =  '';
}
if ($gestionUser===1) {
    $disable=true;
    $classGestionUser = $disable ? 'disable' : '';
}else {
    $classGestionUser =  '';
}
if ($perfil===1) {
    $disable=false;
    $classPerfil = $disable ? 'disable' : '';
}else {
    $classPerfil =  '';
}

?>
<header>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center bold color-900" href="#">
                <img src="/Public/CSS/image/logo-estacionar-rem-bg.png" alt="Logo" width="80" class="d-inline-block align-text-top">
                Estacionar
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Estacionar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <h4 class="bold"><?php echo $tituloMenu; ?></h4>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu <?php echo $classDatos; ?>" href="#PATH#home/inicio" role="button" 
                        data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Mis datos
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Vehiculos</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Locaciones</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu <?php echo $classFranja; ?>" href="#PATH#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Horarios
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Franja 1</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Franja 2</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Franja 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu <?php echo $classTarifa; ?>" href="#PATH#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Tarifas
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Tarifa 1</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Tarifa 2</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Tarifa 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu <?php echo $classPromociones; ?>" href="#PATH#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Promociones
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Promociones 1</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Promociones 2</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Promociones 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu <?php echo $classGestionUser; ?>" href="#PATH#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Gestionar usuarios
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Usuario 1</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Usuario 2</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Usuario 3</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Añadir usuario</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu <?php echo $classCochera; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Gestionar disponibilidad
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Disponibilidad 1</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Disponibilidad 2</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Disponibilidad 3</a></li>
                        </ul>
                    </li>
                    <li class="dotted-line"></li>
                    <li class="nav-item"><a class="nav-link" href='#PATH#'>
                        <a><img src="/Public/CSS/image/user.png" style="width: 50px;">Estacionar Ahora!</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Estacionamiento mensual
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Opcion 1</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Opcion 2</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Opcion 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu <?php echo $classPerfil; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Mi perfil
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Editar</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Ver</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Dar de baja</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-menu" href="#PATH#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Public/CSS/image/user.png" style="width: 50px;">
                            Acerca de
                        </a>
                        <ul class="dropdown-menu border-0 ms-3">
                            <li><a class="dropdown-item" href="#PATH#">Funcionamiento App</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Nosotros</a></li>
                            <li><a class="dropdown-item" href="#PATH#">Iniciativa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#PATH#" class="nav-link text-decoration-none d-flex justify-content-center">Cerrar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>