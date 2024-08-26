<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
    if (isset($_POST['submit'])) {

        mysqli_query($con,"update orders set paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
        unset($_SESSION['cart']);
        header('location:order-history.php');

    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <meta name="robots" content="all">

        <title>GameTech Abancay | Método de Pago</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/green.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
        <link href="assets/css/lightbox.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/rateit.css">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="assets/css/config.css">
        <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
        <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
        <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
        <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
        <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    </head>
    <body class="cnt-home">
    
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Inicio</a></li>
                <li class='active'>Método de Pago</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="checkout-box faq-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12">
                    <h2>Elija un método de pago</h2>
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

    <!-- panel-heading -->
        <div class="panel-heading">
        <h4 class="unicase-checkout-title">
            <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
             Seleccione tipo de pago
            </a>
         </h4>
    </div>
    <!-- panel-heading -->

    <div id="collapseOne" class="panel-collapse collapse in">

        <!-- panel-body  -->
        <div class="panel-body">
        <form name="payment" method="post">
        <input type="radio" name="paymethod" value="COD" checked="checked"> Contraentrega
         <input type="radio" name="paymethod" value="Internet Banking"> Banca Internet
         <input type="radio" name="paymethod" value="Debit / Credit card"> Tarjeta de Crédito/Debito<br /><br />
         <input type="submit" value="CONTINUAR" name="submit" class="btn btn-primary">
            

        </form>        
        </div>
        <!-- panel-body  -->

    </div><!-- row -->
</div>
<!-- checkout-step-01  -->
                                      
                                            
                    </div><!-- /.checkout-steps -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php echo include('includes/brands-slider.php');?>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->
<?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    
    <script src="assets/js/bootstrap.min.js"></script>
    
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    
    <script src="assets/js/echo.min.js"></script>
    <script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- For demo purposes – can be removed on production -->
    
    <script src="switchstylesheet/switchstylesheet.js"></script>
    
    <script>
        $(document).ready(function(){ 
            $(".changecolor").switchstylesheet( { seperator:"color"} );
            $('.show-theme-options').click(function(){
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function() {
           $('.show-theme-options').delay(2000).trigger('click');
        });
    </script>
    <!-- For demo purposes – can be removed on production : End -->

    <!-- Modal para Pago Contraentrega -->
    <div id="codModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pago Contraentrega seleccionado</h4>
                </div>
                <div class="modal-body">
                    <p>Gracias por comprar en GamerTech Abancay.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Banca Internet -->
    <div id="internetBankingModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pago por Banca Internet</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="dni">Ingrese el número de DNI:</label>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="Número de DNI" pattern="[0-9]{8}" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submitDNI">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Tarjeta de Crédito/Debito -->
    <div id="creditCardModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tarjeta de Crédito/Debito</h4>
                </div>
                <div class="modal-body">
                    <form id="creditCardForm">
                        <div class="form-group">
                            <label for="cardNumber">Número de Tarjeta:</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Ingrese el número de la tarjeta" pattern="[0-9]{16}" required>
                        </div>
                        <div class="form-group">
                            <label for="cardHolder">Titular de la Tarjeta:</label>
                            <input type="text" class="form-control" id="cardHolder" name="cardHolder" placeholder="Nombre del titular" required>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate">Fecha de Vencimiento (MM/YY):</label>
                            <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/?([0-9]{2})$" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV:</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" pattern="[0-9]{3}" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="submitCreditCard">Pagar con Tarjeta</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mostrar el modal correspondiente según el método de pago seleccionado
        $(document).ready(function() {
            $('input[type=radio][name=paymethod]').change(function() {
                if (this.value === 'COD') {
                    $('#codModal').modal('show');
                } else if (this.value === 'Internet Banking') {
                    $('#internetBankingModal').modal('show');
                } else if (this.value === 'Debit / Credit card') {
                    $('#creditCardModal').modal('show');
                }
            });

            // Función para enviar el formulario de Banca Internet
            $('#submitDNI').click(function() {
                var dni = $('#dni').val();
                // Validar el número de DNI con expresión regular
                var dniPattern = /^[0-9]{8}$/;
                if (!dniPattern.test(dni)) {
                    alert('DNI no válido. Por favor, ingrese un número de DNI válido.');
                    return false;
                }
                // Si la validación es exitosa, puedes enviar el formulario con AJAX o realizar las acciones necesarias
                // Ejemplo:
                // $('#internetBankingForm').submit();
                $('#internetBankingModal').modal('hide'); // Cerrar el modal
            });

            // Función para enviar el formulario de la tarjeta de crédito/débito
            $('#submitCreditCard').click(function() {
                var cardNumber = $('#cardNumber').val();
                var cardHolder = $('#cardHolder').val();
                var expiryDate = $('#expiryDate').val();
                var cvv = $('#cvv').val();

                // Validar los datos de la tarjeta con expresiones regulares
                var cardNumberPattern = /^[0-9]{16}$/;
                var cardHolderPattern = /^[a-zA-Z\s]+$/;
                var expiryDatePattern = /^(0[1-9]|1[0-2])\/?([0-9]{2})$/;
                var cvvPattern = /^[0-9]{3}$/;

                if (!cardNumberPattern.test(cardNumber) || !cardHolderPattern.test(cardHolder) || !expiryDatePattern.test(expiryDate) || !cvvPattern.test(cvv)) {
                    alert('Tarjeta no válida. Por favor, ingrese datos de tarjeta válidos.');
                    return false;
                }
                // Si la validación es exitosa, puedes enviar el formulario con AJAX o realizar las acciones necesarias
                // Ejemplo:
                // $('#creditCardForm').submit();
                $('#creditCardModal').modal('hide'); // Cerrar el modal
            });
        });
    </script>
</body>
</html>
<?php } ?>
