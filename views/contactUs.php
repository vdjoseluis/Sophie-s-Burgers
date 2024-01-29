<script>
    handleClick("#btnCancel", "index.php");
</script>
<section class="rounded d-flex justify-content-center">
    <div class="col-lg-6 col-md-10 col-12 shadow-lg p-sm-5">

        <form action="sendEmail.php" method="POST" onsubmit="return checkPhone()">
            <div class="p-3">
                <h2>Contacta con nosotros</h2>

                <div class="input-group mb-3">
                    <p>Estaremos encantados de resolver cualquier duda o proporcionarte alguna información que necesites. Te enviaremos un email de confirmación.</p>
                </div>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-circle text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Nombre" name="firstname" autofocus>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-lines-fill text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Apellidos" name="surname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-telephone text-white"></i></span>
                    <input type="tel" class="form-control me-2" placeholder="Teléfono móvil" name="phone" id="phone" required>
                    <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-chat-left-text text-white"></i></span>
                    <textarea class="form-control" placeholder="Mensaje" name="message" rows="6" required></textarea>
                </div>
                <div class="row justify-content-around">
                    <button class="btn btn-outline-success text-center mt-3 col-4" type="submit" name="contactUs">
                        Enviar
                    </button>
                    <button class="btn btn-outline-danger text-center mt-3 col-4" type="reset" id="btnCancel">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>