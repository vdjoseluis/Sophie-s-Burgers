<?php
if (isset($_POST['btnLoginOrder']) || isset($_POST['btnLoginBookings'])) {
    $url = $_POST['previousUrl'];
} elseif (isset($_POST['btnUpdateUser'])) {
    $url = $_POST['previousUrl'];
    $actionRecord= "update";
} elseif (isset($_POST['btnDeleteUser'])) {
    $url = $_POST['previousUrl'];
    $actionRecord="delete";
}
?>

<section class="rounded d-flex justify-content-center">
    <div class="col-md-6 shadow-lg p-5">
        <form action="<?php echo $url; ?>" method="post" id="formLogin">
            <div class="p-4">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Usuario" name="user" autofocus required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                </div>
                <input type="hidden" name="actionRecord" value="<?php echo $actionRecord; ?>">
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

        <form id="formRemember" class="d-none" action="sendEmail.php" method="post">
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