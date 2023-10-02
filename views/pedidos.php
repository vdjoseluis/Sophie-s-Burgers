<script>hideLink("Pedidos");</script>
<?php
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['login']))) {
        $user= $_POST['user'];
        $password= $_POST['password'];
        $msgLogin= "Bienvenido ". $user . ", escoge una opción:";
        $msgButton= "Cambiar usuario";
    } else {
        $msgLogin="Debes iniciar sesión para poder realizarlo.";
        $msgButton= "Iniciar sesión";
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