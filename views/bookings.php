<script>
    hideLink("Reservas");
    handleClick("#btnCancel", "index.php");
</script>
<?php
include('controller/functions.php');
$_SESSION['logged'] = false;
$msgButton = "Iniciar sesión";
$msgBookings = '<i class="bi bi-calendar2-check text-danger"></i>&nbsp;&nbsp;&nbsp;¡ Debes estar registrado para poder realizarla !';

if (isset($_POST['login'])) {
    $dataUser = findUser($_POST['user'], $_POST['password']);
    if ($dataUser->num_rows > 0) {
        while ($row = $dataUser->fetch_assoc()) {
            $_SESSION['logged'] = true;
            $msgButton = "Cambiar usuario";
            $msgBookings = "<p class='fs-5'>¡ Bienvenido/a  <strong class='text-success'>" . $row['firstname'] . " !</strong></p>";
            $customerId = $row['id'];
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                ¡ Usuario o contraseña incorrecta !
              </div>";
    }
}

if (isset($_POST['bookNow'])) {
    $bookings = findBooking($_POST['customerId'], $_POST['date'], $_POST['time']);
    if ($bookings->num_rows > 0) {
        while ($row = $bookings->fetch_assoc()) {
            echo "<div class='alert alert-warning' role='alert'>
                    ¡ Esta reserva ya ha sido realizada anteriormente !
                  </div>";
            echo "<meta http-equiv='refresh' content='3;url=index.php?content=bookings'>";
        }
    } elseif (correctBooking($_POST['date'], $_POST['time'])) {
        if (toBook($_POST['customerId'], $_POST['date'], $_POST['time'], $_POST['people'])) {
            echo "<div class='alert alert-success' role='alert'>
                    ¡ Reserva realizada correctamente !
              </div>";
            echo "<meta http-equiv='refresh' content='3;url=index.php'>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    ¡ Lo sentimos, no se ha podido realizar la reserva !
                </div>";
            echo "<meta http-equiv='refresh' content='3;url=index.php?content=bookings'>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                    ¡ Reserva no válida !
              </div>";
        echo "<meta http-equiv='refresh' content='3;url=index.php?content=bookings'>";
    }
    session_write_close();
    exit;
}
?>

<section class="rounded text-center">
    <div class="row bg-dark p-4">
        <div class="col-2"></div>
        <div class="col-4">
            <h4 class="text-warning">Haz tu reserva</h4>
        </div>
        <div class="col-4">
            <form action="index.php?content=login" method="post">
                <input type="hidden" name="previousUrl" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <button type="submit" class="btn btn-outline-info" name="btnLoginBookings"><?php echo $msgButton; ?></button>
            </form>
        </div>
    </div>
    <div class="row p-4">
        <p class="fs-5"><?php echo $msgBookings; ?></p>
        <hr>
    </div>
</section>
<?php if ($_SESSION['logged']) { ?>

    <section class="rounded d-flex justify-content-center mb-4">
        <div class="col-lg-4 col-md-6 shadow-lg p-5">
            <form action="index.php?content=bookings" method="POST">
                <div class="p-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary"><i class="bi bi-calendar2-day-fill text-white"></i></span>
                        <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text bg-primary"><i class="bi bi-clock text-white"></i></span>
                        <select id="time" name="time" class="form-control" required>
                            <?php
                            $currentTime = new DateTime();
                            $currentTime->setTime(10, 0, 0); 
                        
                            $endTime = new DateTime();
                            $endTime->setTime(23, 0, 0);
                        
                            if ($currentTime > new DateTime('10:00')) {
                                $currentTime = new DateTime();
                                $currentTime->setTime(ceil($currentTime->format('H')), ceil($currentTime->format('i') / 15) * 15, 0);
                            }
                        
                            while ($currentTime <= $endTime) {
                                $formattedTime = $currentTime->format('H:i');
                                echo "<option value=\"$formattedTime\">$formattedTime</option>";
                        
                                $currentTime->add(new DateInterval('PT15M')); 
                            }
                            ?>
                        </select>
                        <span class="input-group-text bg-primary"><i class="bi bi-person-fill text-white"></i></span>
                        <select id="people" name="people" class="form-control" required>
                            <?php
                            for ($i = 1; $i <= 20; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
                    <div class="row justify-content-around">
                        <button class="btn btn-outline-success col-5" type="submit" name="bookNow">
                            Confirmar
                        </button>
                        <button class="btn btn-outline-danger col-5" type="reset" id="btnCancel">
                            Cancelar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php } ?>