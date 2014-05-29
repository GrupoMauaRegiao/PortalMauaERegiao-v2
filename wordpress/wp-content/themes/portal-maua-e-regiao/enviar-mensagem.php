<?php
if (PATH_SEPARATOR == ";") {
  $quebraLinha = "\r\n";
} else {
  $quebraLinha = "\n";
}

$destino = "";
// $nome = ;
$assunto = "";
// $email = ;
// $mensagem = "Mensagem:<br><pre>" . $_GET["mensagem"] . "</pre>";

$headers = "";
$headers .= "MIME-Version: 1.1" . $quebraLinha;
$headers .= "Content-type: text/html; charset=utf-8" . $quebraLinha;
$headers .= "From: " . $email . $quebraLinha;

if(!mail($destino, $assunto, $mensagem, $headers , "-r" . $destino)) {
  mail($destino, $assunto, $mensagem, $headers);
}
?>