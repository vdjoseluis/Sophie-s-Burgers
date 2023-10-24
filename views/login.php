<?php
if (isset($_POST['rememberEmail'])) {
    echo "<script>alert ('¡ Te hemos enviado un email con tus datos registrados !');</script>";
}
?>

<section class="rounded d-flex justify-content-center">
    <div class="col-md-6 shadow-lg p-5">
        <form action="index.php?content=pedidos" method="POST" id="formLogin">
            <div class="p-4">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Usuario" name="user" autofocus required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                </div>
                <button class="btn btn-outline-primary text-center mt-2 col-4" type="submit" name="login">
                    Iniciar
                </button>
            </div>
            <hr>
            <p class="text-center mt-4">¿ No tienes cuenta ?
                <span class="text-primary"><a href="index.php?content=formUser">Regístrate</a></span>
            </p>
            <p class="text-center text-primary"><a href="#" id="rememberLink">He olvidado mi contraseña?</a></p>
        </form>

        <form id="formRemember" class="d-none" action="index.php?content=login" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-envelope-fill text-white"></i></span>
                <input type="email" class="form-control" name="recipient" placeholder="Escribe tu email" required>
                <button class="btn btn-outline-primary text-center col-4" name="rememberEmail" type="submit">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</section>