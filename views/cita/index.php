<h1 class="nombre-pagina">Crear Nueva Cita</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

<?php
    include_once __DIR__ . "/../templates/barra.php";
?>

<div class="app">
    <nav class="tabs contenedor">
        <button class="actual" type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Información Cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>

    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios a continuación</p>
        <div id="servicios" class="listado-servicios contenedor"></div>
    </div>

    <div id="paso-2" class="seccion">
        <h2>Tus Datos y Citas</h2>
        <p class="text-center">Coloca tus datos y fecha de tu cita</p>
        
        <form class="contenedor">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" value="<?php echo $nombre; ?>" disabled>
            </div>

            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha">
            </div>

            <div class="campo">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora">
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>">
        </form>
    </div>

    <div id="paso-3" class="seccion contenido-resumen contenedor">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
    </div>

    <div class="paginacion contenedor">
        <button id="anterior" class="boton">
            &laquo; Anterior
        </button>

        <button id="siguiente" class="boton">
            Siguiente &raquo;
        </button>
    </div>
</div>

<?php 
    $script = "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='./build/js/bundle.min.js'></script>
    "; 
?>