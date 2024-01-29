<script>
    handleClick("#btnCancel", "index.php");
</script>

<section class="rounded d-flex justify-content-center">
    <div class="col-md-8 col-12 shadow-lg p-sm-5">
        <form action="sendEmail.php" method="POST" onsubmit="return checkPhone()">
            <div class="p-4">
                <h2>Únete a nuestra gran familia</h2>

                <div class="input-group mb-3">
                    <p>Rellena este formulario de inscripción y contactaremos contigo lo antes posible.</p>
                </div>
                <hr>
                <p>Datos personales:</p>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-circle text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Nombre" name="firstname" autofocus required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-person-lines-fill text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Apellidos" name="surname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-geo-alt text-white"></i></span>
                    <input type="text" class="form-control" placeholder="Dirección" name="address">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i class="bi bi-telephone text-white"></i></span>
                    <input type="tel" class="form-control me-2" placeholder="Teléfono móvil" name="phone" id="phone" required>
                    <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="input-group mb-3">
                    <label for="file" class="input-group-text bg-primary"><i class="bi bi-file-earmark-text text-white"></i></label>
                    <input type="file" class="form-control" id="file" name="uploadedFile">
                </div>
                <div class="row justify-content-around">
                    <button class="btn btn-outline-success text-center mt-3 col-4" type="submit" name="applyJob">
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