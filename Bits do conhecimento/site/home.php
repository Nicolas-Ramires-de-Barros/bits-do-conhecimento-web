<?php
session_start();

if (!isset($_SESSION['nm_usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="fashion.css">
    <script src="programa.js"></script>
</head>

<body>
    <div class="caixinha">
        <div class="barraSuperior">
            <!-- Seu código do cabeçalho aqui -->
        </div>
        <div class="corpo">
            <h1>Bem-vindo, <?php echo $_SESSION['nm_usuario']; ?>!</h1>
            <!-- Conteúdo da página home aqui -->
        </div>
        <div class="barraInferior">
            <!-- Seu código do rodapé aqui -->
        </div>
    </div>
    <footer>
        <script src="programa.js"></script>
    </footer>
</body>
</html>