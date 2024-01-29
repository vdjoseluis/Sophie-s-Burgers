<script>
    hideLink("Socios");
    handleClick("#btnCreate", "index.php?content=formUser");
</script>
<section class="discover">
    <h1>NUESTROS SOCIOS</h1>

    <div class="gallery">
        <img src="img/partner1.jpg" alt="partner1" />
        <img src="img/partner2.jpg" alt="partner2" />
        <img src="img/partner3.jpg" alt="partner3" />
    </div>
    <h3 class="text-muted text-center">¡ Formar parte de esta gran familia marca la diferencia !</h3>
</section>
<section class="container-fluid text-center mb-4 align-items-center">
    <form action="index.php?content=login" method="post">
        <div class="row bg-dark p-4 justify-content-center">
            <input type="hidden" name="previousUrl" value="index.php?content=formUser">
            <div class="col-8 col-md-4 col-lg-2 m-3">
                <button type="button" id="btnCreate" class="btn btn-outline-warning btn-lg btn-block">Regístrate</button>
            </div>
            <div class="col-8 col-md-4 col-lg-2 m-3">
                <button type="submit" name="btnUpdateUser" class="btn btn-outline-success btn-lg btn-block">Modificar datos</button>
            </div>
            <div class="col-8 col-md-4 col-lg-2 m-3">
                <button type="submit" name="btnDeleteUser" class="btn btn-outline-danger btn-lg btn-block">Darme de baja</button>
            </div>
        </div>
    </form>
</section>