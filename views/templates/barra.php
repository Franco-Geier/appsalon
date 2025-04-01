<div class="barra">
    <p>Hola: <?php echo $nombre ?? ""; ?></p>
    <a href="./logout" class="boton">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION["admin"])) { ?>
    <div class="barra-servicios contenedor">
        <a href="/appsalon/public/admin" class="boton">Ver Citas</a>
        <a href="/appsalon/public/servicios" class="boton">Ver Servicios</a>
        <a href="/appsalon/public/servicios/crear" class="boton">Nuevo Servicio</a>
    </div>
<?php } ?>