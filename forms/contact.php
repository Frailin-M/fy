<?php
// Función para limpiar y validar los datos del formulario
function limpiar_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y validar los datos del formulario
    $name = limpiar_input($_POST['name']);
    $email = limpiar_input($_POST['email']);
    $subject = limpiar_input($_POST['subject']);
    $message = limpiar_input($_POST['message']);
    
    // Validar correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "error_email";
        exit();
    }
    
    // Protección contra ataques de inyección de correo no deseado
    if (strpos($name, "Content-Type:") !== false || strpos($email, "Content-Type:") !== false || strpos($subject, "Content-Type:") !== false || strpos($message, "Content-Type:") !== false) {
        echo "error_spam";
        exit();
    }
    
    // Aquí puedes agregar el código para enviar el correo electrónico si lo deseas
    
    // Simplemente respondemos con éxito si se ha llegado hasta aquí
    echo "success";
    exit();
}
?>