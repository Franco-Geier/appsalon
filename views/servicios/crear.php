<h1 class="nombre-pagina">Nuevo Servicio</h1>
<p class="descripcion-pagina">Llena Todos Los Campos Para Añadir un Nuevo Servicio</p>

<?php
    // include_once __DIR__ . "/../templates/barra.php";
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/appsalon/public/servicios/crear" method="post" class= "contenedor">
    <?php include_once __DIR__ . "/formulario.php"; ?>
    <input type="submit" value="Guardar Servicio" class="boton">
</form>