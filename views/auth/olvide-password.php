<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</p>

<?php
    include_once __DIR__ . "/../templates/alertas.php"
?>

<form class="contenedor" method="POST" action="./olvide">
    <div class="campo">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Tu E-mail">
    </div>
    <input class="boton" type="submit" value="Enviar Instrucciones">
</form>

<div class="acciones contenedor">
    <a href="./">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="./crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
</div>