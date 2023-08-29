<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <a href="/perfil" class="enlace">Volver al Perfil</a>

    <form action="/cambiar-password" method="POST" class="formulario">
        <div class="campo">
            <label for="password">Password Actual</label>
            <input 
                type="password"
                name="password_actual"
                id="password"
                placeholder="Tu Password Actual"
                />
        </div>
        <div class="campo">
            <label for="password">Password Nueva</label>
            <input 
                type="password"
                name="password_nuevo"
                id="password"
                placeholder="Tu Nueva Password"
                />
        </div>
        <div class="campo">
            <label for="password2">Confirmar Password</label>
            <input 
                type="password"
                name="password2"
                id="password2"
                placeholder="Confirma tu Password"
                />
        </div>

        <input type="submit" value="Guardar Cambios">
    </form>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>