<?php
if (PATH_SEPARATOR == ";") {
    $quebraLinha = "\r\n";
} else {
    $quebraLinha = "\n";
}

$destino  = "atendimento@grupomaua.com.br";

$nome     = $_GET["nome"];
$email    = $_GET["email"];
$assunto  = "Mensagem do Portal: '" . $_GET["assunto"] . "'";

$mensagem = "";
$mensagem .= "<b>Nome:</b><br> " . $nome . "<br><br>";
$mensagem .= "<b>E-mail:</b><br> " . $email . "<br><br>";
$mensagem .= "<b>Assunto:</b><br> " . $assunto . "<br><br>";
$mensagem .= "<b>Mensagem:<b><br> " .
             "<pre>" . $_GET["mensagem"] . "</pre>";

$headers  = "";
$headers  .= "MIME-Version: 1.1" . $quebraLinha;
$headers  .= "Content-type: text/html; charset=utf-8" . $quebraLinha;
$headers  .= "From: " . $email . $quebraLinha;

if (!mail($destino, $assunto, $mensagem, $headers , "-r" . $destino)) {
    mail($destino, $assunto, $mensagem, $headers);
}
?>
