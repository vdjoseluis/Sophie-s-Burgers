<script>
    hideLink("Pedidos");
    handleClick("#cancelOrder", "index.php");
</script>
<?php
include('controller/functions.php');
$msgLogin = "Debes iniciar sesión para poder realizarlo.";
$msgButton = "Iniciar sesión";
$_SESSION['logged']= false;

$customerId = 0;
$deliveryEnabled= 0;
if (isset($_POST['login'])) {
    $dataUser = findUser($_POST['user'], $_POST['password']);
    if ($dataUser->num_rows > 0) {
        while ($row = $dataUser->fetch_assoc()) {
            $msgLogin = "Bienvenido/a  <strong class='text-success'>" . $row['firstname'] . ",</strong> escoge una opción:";
            $msgButton = "Cambiar usuario";
            $_SESSION['logged']= true;
            $customerId = $row['id'];
            $deliveryEnabled= $row['deliveryEnabled'];
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                ¡ Usuario o contraseña incorrecta !
              </div>";
    }
}

if (isset($_POST['confirmOrder']) && !isset($_SESSION['orderConfirmed'])) {
    $connection = createConnection();
    $customerId = $_POST['customerId'];
    $items = $_POST['items'];
    $deliveryOption = $_POST['deliveryOption'];
    $total = calculateTotal($connection, $items);
    if ($total > 0) { ?>
        <section class="rounded d-flex justify-content-center">
            <div class="col-md-6 shadow-lg p-5">
                <p>El total de tu pedido es <?php echo $total; ?>€, ¿ estás seguro de realizar tu pedido ?</p>
                <div class="row justify-content-around">
                    <form action="index.php?content=orders" method="post">
                        <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
                        <input type="hidden" name="items" value="<?php echo htmlspecialchars(json_encode($items)); ?>">
                        <input type="hidden" name="deliveryOption" value="<?php echo $deliveryOption; ?>">
                        <button class="btn btn-outline-success text-center mt-3 col-4" type="submit" name="confirmOrderFinal">
                            Si, confirmar
                        </button>
                        <button class="btn btn-outline-danger text-center mt-3 col-4" id="cancelOrder">
                            No, cancelar
                        </button>
                    </form>
                </div>
            </div>
        </section>
<?php }
}

if (isset($_POST['confirmOrderFinal']) && !isset($_SESSION['orderConfirmed'])) {
    $_SESSION['orderConfirmed']= true;
    $connection = createConnection();
    $customerId = $_POST['customerId'];
    $items = json_decode($_POST['items'], true);
    $deliveryOption = $_POST['deliveryOption'];
    addOrder($connection, $customerId, $items, $deliveryOption);
    echo "<div class='alert alert-warning' role='alert'>
                Serás redirigido al sistema de pago de seguro...
              </div>";

    if ($deliveryOption == 'delivery') {
        echo "<div class='alert alert-success' role='alert'>
                ¡ Muchas gracias ! En breve recibirás el pedido en tu casa.
              </div>";
    } elseif ($deliveryOption == 'store') {
        echo "<div class='alert alert-success' role='alert'>
                ¡ Muchas gracias ! En unos minutos podrás recoger tu pedido en tienda.
              </div>";
    }
    echo "<meta http-equiv='refresh' content='7;url=index.php'>";
    session_write_close();
    exit;
}
if (!isset($_POST['confirmOrder']) && !isset($_POST['confirmOrderFinal'])) {
?>
    <section class="container-fluid text-center">
        <div class="row bg-dark p-4">
            <div class="col-6">
                <h4 class="text-info">Tu pedido:</h4>
            </div>
            <div class="col-6 text-right">
                <form action="index.php?content=login" method="post">
                    <input type="hidden" name="previousUrl" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <button type="submit" class="btn btn-outline-info" name="btnLoginOrder"><?php echo $msgButton; ?></button>    
                </form>
            </div>
        </div>
        <div class="row p-4">
            <p class="fs-5"><?php echo $msgLogin; ?></p>
            <hr>
        </div>
        <?php if ($_SESSION['logged']) { ?>
            <form action="index.php?content=orders" method="post" class="mb-4">

                <div class="container text-center">
                    <?php if ($deliveryEnabled==1) {?>
                    <div class="form-check form-check-inline m-2">
                        <input class="form-check-input" type="radio" name="deliveryOption" id="inlineRadio1" value="delivery" />
                        <label class="form-check-label" for="inlineRadio1">Recibirlo en casa</label>
                    </div>
                    <?php } ?>

                    <div class="form-check form-check-inline m-2">
                        <input class="form-check-input" type="radio" name="deliveryOption" id="inlineRadio2" value="store" checked />
                        <label class="form-check-label" for="inlineRadio2">Recoger en tienda</label>
                    </div>

                    <?php
                    writeProducts();
                    ?>
                    <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
                    <button class="btn btn-outline-success" name="confirmOrder" type="submit">
                        Confirmar pedido
                    </button>
                </div>
            </form>
        <?php } ?>

    </section>
<?php } ?>