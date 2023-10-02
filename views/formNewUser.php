<?php
require('./header.php');
?>
<section class="rounded d-flex justify-content-center">
    <div class="col-md-8 shadow-lg p-5">
        <form action="/views/login.php" method="POST">
            <div class="p-4">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                    <input type="text" class="form-control me-2" placeholder="Usuario" name="user" autofocus required>
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                </div>
                <hr>
                <p>Datos personales:</p>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Nombre" name="firstname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Apellidos" name="surname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Dirección" name="address" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="tel" class="form-control me-2" placeholder="Teléfono" name="phone" required>
                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="row justify-content-around">
                    <button class="btn btn-outline-success text-center mt-3 col-4" type="submit" name="login">
                        Registrarse
                    </button>
                    <button class="btn btn-outline-danger text-center mt-3 col-4" type="button" id="btnCancel">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
require('./footer.php');
?>