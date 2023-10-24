<script>
    hideLink("Pedidos");
    handleClick("#btnLogin", "index.php?content=login");
</script>

<?php
$msgLogin = "Debes iniciar sesión para poder realizarlo.";
$msgButton = "Iniciar sesión";

if (isset($_POST['login'])) {
    require('controller/querys.php');
    if (findUser($_POST['user'], $_POST['password'])) {
        $msgLogin = "Bienvenido <strong>" . $_POST['user'] . ",</strong> escoge una opción:";
        $msgButton = "Cambiar usuario";
    } else {
        echo "<script>alert ('¡ Usuario o contraseña incorrecta !');</script>";
    }
}

?>

<section class="container-fluid text-center">
    <div class="row bg-dark p-4">
        <div class="col-6">
            <h4 class="text-info">Tu pedido:</h4>
        </div>
        <div class="col-6 text-right">
            <button type="button" id="btnLogin" class="btn btn-outline-info"><?php echo $msgButton; ?></button>
        </div>
    </div>
    <div class="row p-4">
        <p class="text-center"><?php echo $msgLogin; ?></p>
    </div>
    <hr>
</section>