<?php
if (isset($_POST['signin'])) {
    require('controller/querys.php');
    if (!existsUser($_POST['username'])) {
        createUser($_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['surname'], $_POST['address'], $_POST['phone'], $_POST['email']);
        echo "<script>alert ('¡ Usuario registrado correctamente !');</script>";
    } else {
        echo "<script>alert ('¡ ERROR: El usuario ya existe !');</script>";
    }
}
?>

<script>
    handleClick("#btnCancel", "index.php");
</script>

<section class="rounded d-flex justify-content-center">
    <div class="col-md-8 shadow-lg p-5">
        <form action="index.php?content=formUser" method="POST">
            <div class="p-4">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                    <input type="text" class="form-control me-2" placeholder="Usuario" name="username" autofocus required>
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                </div>
                <hr>
                <p>Datos personales:</p>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-circle text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Nombre" name="firstname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-lines-fill text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Apellidos" name="surname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-geo-alt text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Dirección" name="address" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-telephone text-white"></i></span>
                    <input type="tel" class="form-control me-2" placeholder="Teléfono" name="phone" required>
                    <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="row justify-content-around">
                    <button class="btn btn-outline-success text-center mt-3 col-4" type="submit" name="signin">
                        Registrarse
                    </button>
                    <button class="btn btn-outline-danger text-center mt-3 col-4" type="reset" id="btnCancel">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>