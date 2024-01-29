<script>
    handleClick("#btnCancel", "index.php?content=partners");
</script>
<?php
include('controller/functions.php');
$_SESSION['logged']= false;
$deliveryEnabled= 0;
$msgButton= "Registrarse";
$actionRecord= "create";
$userData=['username'=>'','password'=>'','firstname'=>'','surname'=>'','address'=>'','phone'=>'','email'=>''];

if (isset($_POST['saveRecord'])) {
    if ($_POST['actionRecord'] == "delete" && existsUser($_POST['username'])){
        deleteUser($_POST['username']);
        echo "<div class='alert alert-warning' role='alert'>
            ¡ Usuario eliminado correctamente !
          </div>";
    }
    $addressInfo = checkAddress($_POST['address']);
    $correctData = ($addressInfo && checkPhone($_POST['phone'])) ? true : false;
    if ($correctData) {
        if ($_POST['actionRecord'] == "update" && existsUser($_POST['username'])) {
            updateUser(
                $_POST['username'],
                $_POST['password'],
                $_POST['firstname'],
                $_POST['surname'],
                $_POST['address'],
                $_POST['phone'],
                $_POST['email'],
                $addressInfo['deliveryEnabled']
            );
            echo "<div class='alert alert-success' role='alert'>
            ¡ Usuario actualizado correctamente !
          </div>";
        }elseif ($_POST['actionRecord'] == "create" && !existsUser($_POST['username'])) {
            createUser(
                $_POST['username'],
                $_POST['password'],
                $_POST['firstname'],
                $_POST['surname'],
                $_POST['address'],
                $_POST['phone'],
                $_POST['email'],
                $addressInfo['deliveryEnabled']
            );
            echo "<div class='alert alert-success' role='alert'>
                ¡ Usuario registrado correctamente !
              </div>";
        } elseif ($_POST['actionRecord'] == "create") {
            echo "<div class='alert alert-danger' role='alert'>
            ¡ ATENCIÓN: El usuario ya existe !
          </div>";
        }
    }
    echo "<meta http-equiv='refresh' content='3;url=index.php?content=partners'>";
    session_write_close();
    exit;
}

if (isset($_POST['login'])) {
    $dataUser = findUser($_POST['user'], $_POST['password']);
    if ($dataUser->num_rows > 0) {
        while ($row = $dataUser->fetch_assoc()) {
            echo "<h3 class='text-center'>¡ Bienvenido/a  <strong class='text-success'>" . $row['firstname'] . " !</strong></h3>";
            $_SESSION['logged']= true;
            $userData = array_merge($userData, $row);
            if ($_POST['actionRecord']== "update"){
                $msgButton= "Guardar cambios";
                $actionRecord= "update";
            } elseif ($_POST['actionRecord']== "delete"){
                $msgButton= "Eliminar cuenta";
                $actionRecord= "delete";
                echo "<p class='text-center text-danger'>¿ Estás seguro que quieres darte de baja ?</p>";
            }
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                ¡ Usuario o contraseña incorrecta !
              </div>"; 
        echo "<meta http-equiv='refresh' content='3;url=index.php'>";
    }
}
?>

<section class="rounded d-flex justify-content-center">
    <div class="col-md-10 col-sm-12 shadow-lg p-md-5">
        <form action="index.php?content=formUser" method="POST">
            <div class="p-4">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                    <?php if ($_SESSION['logged']) { ?>
                        <input type="text" class="form-control me-2" value="<?php echo $userData['username']; ?>" name="username" readonly>
                    <?php } else { ?>
                        <input type="text" class="form-control me-2" placeholder="Usuario" name="username" autofocus required>
                    <?php } ?>

                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>                    
                    <?php if ($_SESSION['logged']) { ?>
                        <input type="password" class="form-control" value="<?php echo $userData['password']; ?>" name="password" readonly>
                    <?php } else { ?>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                    <?php } ?>
                    
                </div>
                <hr>
                <p>Datos personales:</p>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-circle text-white"></i></span>
                    <input type="text" class="form-control" value="<?php echo $userData['firstname']; ?>" placeholder="Nombre" name="firstname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-lines-fill text-white"></i></span>
                    <input type="text" class="form-control" value="<?php echo $userData['surname']; ?>" placeholder="Apellidos" name="surname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-geo-alt text-white"></i></span>
                    <input type="text" class="form-control" value="<?php echo $userData['address']; ?>" placeholder="Dirección" name="address" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-telephone text-white"></i></span>
                    <input type="tel" class="form-control me-2" value="<?php echo $userData['phone']; ?>" placeholder="Teléfono móvil" name="phone" required>
                    <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                    <input type="email" class="form-control" value="<?php echo $userData['email']; ?>" placeholder="Email" name="email" required>
                </div>
                <input type="hidden" name="actionRecord" value="<?php echo $actionRecord; ?>">
                <div class="row justify-content-around">
                    <button class="btn btn-outline-success text-center mt-3 col-4" type="submit" name="saveRecord">
                        <?php echo $msgButton; ?>
                    </button>
                    <button class="btn btn-outline-danger text-center mt-3 col-4" type="reset" id="btnCancel">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
