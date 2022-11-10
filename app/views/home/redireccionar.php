<!-- <?php // require_once RUTA_APP . '/views/inc/header.php'; 
        ?> -->
<?php require_once RUTA_APP . '/views/template.php'; ?>


<div class="conten">
    <h1>Compra en linea</h1>
    <div class="con">
        <div class="Producto">
            <h3>
                detalles del producto
            </h3>
            <div class="Caja">
                <i class="fa-regular fa-dollar-sign"></i>
                <div>
                    <h4>Nombre</h4>
                    <span>Pc gamer</span>
                </div>
            </div>
            <div class="Caja">
                <i class="fa-regular fa-dollar-sign"></i>
                <div>
                    <h4>Descrición</h4>
                    <span>torre gamer de alta gama de la familia ryzen 7</span>
                </div>
            </div>
            <div class="Caja">
                <i class="fa-regular fa-dollar-sign"></i>
                <div>
                    <h4>Precio</h4>
                    <span>$ 2 000 000</span>
                </div>
            </div>

        </div>
        <div class="Form">
            <div class="informe">
                <h3>
                    informe de la compra
                </h3>

                <p>Nombre : <span><?php echo $_SESSION['sesion_active']['nombre'] ?></span></p>
                <p>Email : <span><?php echo $_SESSION['sesion_active']['correo'] ?></span></p>
                <p>Telefono : <span><?php echo $_SESSION['sesion_active']['celular'] ?></span></p>

                <button id="Pagar">
                    Pagar
                </button>
            </div>
            <div class="confirmarpago">
                <div class="Conten">
                    <h3>
                        Confirmar compra
                    </h3>

                    <p>
                        <span>Nombre : <?php echo $_SESSION['sesion_active']['nombre'] ?></span><br>
                        <span>Email : <?php echo $_SESSION['sesion_active']['correo'] ?></span><br>
                        <span>Telefono : <?php echo $_SESSION['sesion_active']['celular'] ?></span><br>
                        <span>Producto : Pc gamer</span><br>
                        <span>Precio : $ 2 000 000</span><br>
                    </p>

                    <p class="mensajeApi"><span> Transferencia con exito!</span></p>


                    <button class="ConfirmarPago">
                        <span class="Pagar">Confirmar pago</span>
                        <span class="Proceso">Procesando...</span>
                        <span class="Listo">SALIR</span>
                    </button>
                    <button class="Salir">
                        SALIR
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $(".Proceso").hide();
        $(".Listo").hide();
        $(".mensajeApi").hide();
        $(".Salir").hide(); 

        $("#Pagar").click(function() {
            $(".informe").hide();
            $(".confirmarpago").show("Border");
        });

        $(".ConfirmarPago").click(function() {
            $(".Proceso").show();
            $(".Pagar").hide();
            $(".ConfirmarPago").hide();
            const settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://stoplight.io/mocks/placetopay-api/webcheckout-docs/10862976/api/session",
                "method": "POST",
                "headers": {
                    "Content-Type": "application/json"
                },
                "processData": false,
                "data": "{\n  \"locale\": \"es_CO\",\n  \"auth\": {\n    \"login\": \"c51ce410c124a10e0db5e4b97fc2af39\",\n    \"tranKey\": \"VQOcRcVH2DfL6Y4B4SaK6yhoH/VOUveZ3xT16OQnvxE=\",\n    \"nonce\": \"NjE0OWVkODgwYjNhNw==\",\n    \"seed\": \"2021-09-21T09:34:48-05:00\"\n  },\n  \"payer\": {\n    \"document\": \"1122334455\",\n    \"documentType\": \"CC\",\n    \"name\": \"John\",\n    \"surname\": \"Doe\",\n    \"company\": \"Evertec\",\n    \"email\": \"johndoe@app.com\",\n    \"mobile\": \"+5731111111111\",\n    \"address\": {\n      \"street\": \"Calle falsa 123\",\n      \"city\": \"Medellín\",\n      \"state\": \"Poblado\",\n      \"postalCode\": \"55555\",\n      \"country\": \"Colombia\",\n      \"phone\": \"+573111111111\"\n    }\n  },\n  \"buyer\": {\n    \"document\": \"1122334455\",\n    \"documentType\": \"CC\",\n    \"name\": \"John\",\n    \"surname\": \"Doe\",\n    \"company\": \"Evertec\",\n    \"email\": \"johndoe@app.com\",\n    \"mobile\": \"+5731111111111\",\n    \"address\": {\n      \"street\": \"Calle falsa 123\",\n      \"city\": \"Medellín\",\n      \"state\": \"Poblado\",\n      \"postalCode\": \"55555\",\n      \"country\": \"Colombia\",\n      \"phone\": \"+573111111111\"\n    }\n  },\n  \"payment\": {\n    \"reference\": \"12345\",\n    \"description\": \"Prueba de pago\",\n    \"amount\": {\n      \"currency\": \"COP\",\n      \"total\": 2000,\n      \"taxes\": [\n        {\n          \"kind\": \"valueAddedTax\",\n          \"amount\": 1000,\n          \"base\": 0\n        }\n      ],\n      \"details\": [\n        {\n          \"kind\": \"discount\",\n          \"amount\": 1000\n        }\n      ]\n    },\n    \"allowPartial\": false,\n    \"shipping\": {\n      \"document\": \"1122334455\",\n      \"documentType\": \"CC\",\n      \"name\": \"John\",\n      \"surname\": \"Doe\",\n      \"company\": \"Evertec\",\n      \"email\": \"johndoe@app.com\",\n      \"mobile\": \"+5731111111111\",\n      \"address\": {\n        \"street\": \"Calle falsa 123\",\n        \"city\": \"Medellín\",\n        \"state\": \"Poblado\",\n        \"postalCode\": \"55555\",\n        \"country\": \"Colombia\",\n        \"phone\": \"+573111111111\"\n      }\n    },\n    \"items\": [\n      {\n        \"sku\": \"12345\",\n        \"name\": \"product_1\",\n        \"category\": \"physical\",\n        \"qty\": \"1\",\n        \"price\": 1000,\n        \"tax\": 0\n      }\n    ],\n    \"fields\": [\n      {\n        \"keyword\": \"_test_field_value_\",\n        \"value\": \"_test_field_\",\n        \"displayOn\": \"approved\"\n      }\n    ],\n    \"recurring\": {\n      \"periodicity\": \"D\",\n      \"interval\": \"1\",\n      \"nextPayment\": \"2019-08-24\",\n      \"maxPeriods\": 1,\n      \"dueDate \": \"2019-09-24\",\n      \"notificationUrl \": \"https://checkout.placetopay.com\"\n    },\n    \"subscribe\": false,\n    \"dispersion\": [\n      {\n        \"agreement\": \"1299\",\n        \"agreementType\": \"MERCHANT\",\n        \"amount\": {\n          \"currency\": \"USD\",\n          \"total\": 200\n        }\n      }\n    ],\n    \"modifiers\": [\n      {\n        \"type\": \"FEDERAL_GOVERNMENT\",\n        \"code\": 17934,\n        \"additional\": {\n          \"invoice\": \"123345\"\n        }\n      }\n    ]\n  },\n  \"subscription\": {\n    \"reference\": \"12345\",\n    \"description\": \"Ejemplo de descripción\",\n    \"fields\": {\n      \"keyword\": \"1111\",\n      \"value\": \"lastDigits\",\n      \"displayOn\": \"none\"\n    }\n  },\n  \"fields\": [\n    {\n      \"keyword\": \"_processUrl_\",\n      \"value\": \"https://checkout.redirection.test/session/1/a592098e22acc709ec7eb30fc0973060\",\n      \"displayOn\": \"none\"\n    }\n  ],\n  \"paymentMethod\": \"visa\",\n  \"expiration\": \"2019-08-24T14:15:22Z\",\n  \"returnUrl\": \"https://commerce.test/return\",\n  \"cancelUrl\": \"https://commerce.test/cancel\",\n  \"ipAddress\": \"127.0.0.1\",\n  \"userAgent\": \"PlacetoPay Sandbox\",\n  \"skipResult\": false,\n  \"noBuyerFill\": false,\n  \"type\": \"checkin\"\n}"
            };

            $.ajax(settings).done(function(response) {
                console.log(response.status);
                Swal.fire({
                    title: response.status.message,
                    position: 'bottom-end',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
                $(".Proceso").hide();
                $(".Pagar").hide();
                $(".Listo").show();
                $(".mensajeApi").show();
                $(".Salir").show();
            });
        });
        // Este boton es para salirse de la session 

        $(".Salir").click(function() {
            window.location.replace('<?php echo RUTA_URL?>/Login/Logout');
        })

    })
</script>