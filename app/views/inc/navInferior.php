<div class="container-fluid fixed-bottom bg-white py-2">
    <div class="d-flex justify-content-around align-items-center">
        <a href="#PATH#home/inicio" class="text-center text-dark text-decoration-none">
            <img src="../img/house.svg" alt="Inicio" class="mb-1" style="width: 25px; height: 20px;">
            <div>Inicio</div>
        </a>
        <a href="#" class="text-center text-dark text-decoration-none">
            <img src="../img/filters.svg" alt="Filtros" class="mb-1" style="width: 25px; height: 20px;">
            <div>Filtros</div>
        </a>
        <a href="#" class="text-center text-dark text-decoration-none">
            <img src="../img/car.svg" alt="Autos" class="mb-1" style="width: 25px; height: 20px;">
            <div>Vehículos</div>
        </a>
        <a href="#" class="text-center text-dark text-decoration-none">
            <img src="../img/stars.svg" alt="Favoritos" class="mb-1" style="width: 25px; height: 20px;">
            <div>Favoritos</div>
        </a>
        <a href="#" class="text-center text-dark text-decoration-none">
            <img src="../img/search.svg" alt="Buscar" class="mb-1" style="width: 25px; height: 20px;">
            <div>Buscar</div>
        </a>
    </div>
</div>


<div class="collapse" id="panelFiltros">
    <div class="card card-body ventana filtros">
        <h3 class="titulo-ventana">Tiempo de estadía</h3>
        <form class="filtros-form">
            <label class="filtro-label" for="hora">
                <span class="filtro-text">Hora</span>
                <input class="filtro-checkbox" type="checkbox" id="hora" name="hora">
            </label>
            <label class="filtro-label" for="media">
                <span class="filtro-text">Media (12hs)</span>
                <input class="filtro-checkbox" type="checkbox" id="media" name="media">
            </label>
            <label class="filtro-label" for="diaria">
                <span class="filtro-text">Diaria (24hs)</span>
                <input class="filtro-checkbox" type="checkbox" id="diaria" name="diaria">
            </label>
            <label class="filtro-label" for="semanal">
                <span class="filtro-text">Semanal</span>
                <input class="filtro-checkbox" type="checkbox" id="semanal" name="semanal">
            </label>
            <label class="filtro-label" for="mensual">
                <span class="filtro-text">Mensual</span>
                <input class="filtro-checkbox" type="checkbox" id="mensual" name="mensual">
            </label>
            <input class="filtros-submit" type="submit" value="Aplicar">
        </form>
    </div>
</div>

<div class="collapse" id="panelVehiculos">
    <div class="card card-body ventana vehiculos">
        <h3 class="titulo-ventana">Vehículos</h3>
        <form class="vehiculos-form">
            <div class="vehiculos-item">
                <span class="vehiculos-text">Auto</span>
                <input class="filtro-checkbox" type="checkbox" id="auto" name="vehiculo" value="auto">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">Camioneta</span>
                <input class="filtro-checkbox" type="checkbox" id="camioneta" name="vehiculo" value="camioneta">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">Camión</span>
                <input class="filtro-checkbox" type="checkbox" id="camion" name="vehiculo" value="camion">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">Bicicleta</span>
                <input class="filtro-checkbox" type="checkbox" id="bicicleta" name="vehiculo" value="bicicleta">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">Mini</span>
                <input class="filtro-checkbox" type="checkbox" id="mini" name="vehiculo" value="mini">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">Monopatín</span>
                <input class="filtro-checkbox" type="checkbox" id="monopatin" name="vehiculo" value="monopatin">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">Moto</span>
                <input class="filtro-checkbox" type="checkbox" id="moto" name="vehiculo" value="moto">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">4x4</span>
                <input class="filtro-checkbox" type="checkbox" id="4x4" name="vehiculo" value="4x4">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">Ómnibus</span>
                <input class="filtro-checkbox" type="checkbox" id="omnibus" name="vehiculo" value="omnibus">
            </div>
            <div class="vehiculos-item">
                <span class="vehiculos-text">Utilitario</span>
                <input class="filtro-checkbox" type="checkbox" id="utilitario" name="vehiculo" value="utilitario">
            </div>
            <input class="vehiculos-submit" type="submit" value="Aplicar">
        </form>
    </div>
</div>

<div class="collapse" id="panelFavoritos">
    <div class="card card-body ventana favoritos">
        Contenido de Favoritos
    </div>
</div>


<div class="collapse" id="panelBuscar">
    <div class="card card-body ventana buscar">
        Contenido de Buscar
    </div>
</div>