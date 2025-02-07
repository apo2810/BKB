<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $raison_sociale = htmlspecialchars($_POST['name']);
    $siret = htmlspecialchars($_POST['siret']);
    $telephone = htmlspecialchars($_POST['phone']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    $redirect_url = isset($_POST['redirect']) ? $_POST['redirect'] : "index.html";

    if (!empty($raison_sociale) && !empty($siret) && !empty($telephone) && !empty($email) && !empty($message)) {
        $to = "bkbdiffcontact@gmail.com"; // Remplacez par votre adresse email
        $subject = "Nouveau message du formulaire de contact";
        $body = "Vous avez reçu un nouveau message de contact :\n\n";
        $body .= "Raison Sociale : $raison_sociale\n";
        $body .= "SIRET : $siret\n";
        $body .= "Téléphone : $telephone\n";
        $body .= "Email : $email\n";
        $body .= "Message :\n$message\n";
        $headers = "From: contact@votredomaine.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
            header("Location: $redirect_url?status=success");
            exit();
        } else {
            header("Location: $redirect_url?status=error");
            exit();
        }
    } else {
        header("Location: $redirect_url?status=error");
        exit();
    }
}
?>
