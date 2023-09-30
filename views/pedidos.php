<div class="modal fade" id="modalOrders" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Cabecera del modal -->
            <div class="modal-header bg-light">
                <h4 class="modal-title text-success">
                    Tu pedido - Sophie's Burger
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Cuerpo del modal -->

            <div id="modal-body" class="modal-body">
                <p class="text-center fs-4 text-secondary">Escoge una opción:</p>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="orderOptions" id="inlineRadio1" value="option1" />
                        <label class="form-check-label" for="inlineRadio1">Recibirlo en casa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="orderOptions" id="inlineRadio2" value="option2" />
                        <label class="form-check-label" for="inlineRadio2">Recoger en tienda</label>
                    </div>
                </div>
            </div>

            <div class="m-5 d-none" id="address">
                <p id="titleAddress">Escribe tu dirección completa:</p>
                <input type="text" name="direccion" id="addressInput" class="form-control" placeholder="Calle, número, piso y ciudad" />
                <p class="d-none" id="locationResult"></p>

                <!---- ENLACE A UBICACION --->
                <br />
                <label for="getLocationCheckbox">Obtener Ubicación</label>
                <input type="checkbox" id="getLocationCheckbox" />
            </div>

            <!-- Pie del modal -->
            <div class="modal-footer d-none" id="footerOrders">
                <button type="button" class="btn btn-primary" id="validateAddress">
                    Validar dirección
                </button>

                <button type="button" class="btn btn-primary d-none" id="okAddress">
                    Aceptar
                </button>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid text-center bg-dark">
    <div class="position-relative">
        <img src="../img/HuevoBurger.png" alt="Menu1" />
        <button id="btnPlaceOrder" class="btn btn-lg btn-danger position-absolute top-50 start-50 translate-middle p-4">
            Haz tu pedido
        </button>
    </div>
</div>