<?php
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o código inserido corresponde ao código correto
    $codigo_correto = "seucodigo"; // Substitua com o código correto
    $codigo_inserido = $_POST["codigo"];
    
    if ($codigo_inserido === $codigo_correto) {
        // Redirecione para trabalho.php se o código for correto
        header("Location: trabalho.php");
        exit();
    } else {
        // Exiba uma mensagem de erro se o código for incorreto
        echo "Código incorreto. Tente novamente.";
    }
}
?>