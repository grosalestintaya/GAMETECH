<?php
// confirmar.php
include('includes/config.php');

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Verificar si el correo existe en la base de datos
    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    $num = mysqli_num_rows($query);

    if ($num > 0) {
        // Actualizar el estado de la cuenta como confirmada
        $query = mysqli_query($con, "UPDATE users SET confirmed=1 WHERE email='$email'");

        if ($query) {
            echo "<script>alert('Tu cuenta ha sido confirmada. ¡Puedes iniciar sesión ahora!');</script>";
        } else {
            echo "<script>alert('Hubo un problema al confirmar tu cuenta. Por favor, ponte en contacto con el soporte.');</script>";
        }
    } else {
        echo "<script>alert('El correo electrónico no es válido.');</script>";
    }
}
?>
