<?php
// Función para limpiar y validar los datos del formulario
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y validar los datos del formulario
    $fname = clean_input($_POST['fname']);
    $lname = clean_input($_POST['lname']);
    $mobile = clean_input($_POST['mobile']);
    $email = clean_input($_POST['email']);
    $date1 = clean_input($_POST['date1']);
    $date2 = clean_input($_POST['date2']);
    $request = clean_input($_POST['request']);

    // Validar correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "error_email";
        exit();
    }

    // Protección contra ataques de inyección de correo no deseado
    if (strpos($fname, "Content-Type:") !== false || strpos($lname, "Content-Type:") !== false || strpos($mobile, "Content-Type:") !== false || strpos($email, "Content-Type:") !== false || strpos($date1, "Content-Type:") !== false || strpos($date2, "Content-Type:") !== false || strpos($request, "Content-Type:") !== false) {
        echo "error_spam";
        exit();
    }

    // Aquí puedes agregar el código para procesar la reserva, como enviar un correo electrónico con los detalles de la reserva, guardar los datos en una base de datos, etc.

    // Simplemente respondemos con éxito si se ha llegado hasta aquí
    echo "success";
    exit();
}
?>
