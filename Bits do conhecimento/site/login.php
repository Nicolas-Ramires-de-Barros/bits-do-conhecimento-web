<?php
session_start();

// Obter os valores dos campos do formulário
$nm_usuario = isset($_POST['nm_usuario']) ? $_POST['nm_usuario'] : '';
$nu_senha = isset($_POST['nu_senha']) ? $_POST['nu_senha'] : '';

// Conectar-se ao banco de dados
try {
    $conn = new PDO('pgsql:host=200.19.1.18;dbname=nicolasbarros;', 'nicolasbarros', '123456');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
    exit();
}

// Executar uma consulta SQL
$sql = "select * FROM tb_pessoa WHERE nm_usuario = :nm_usuario";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nm_usuario', $nm_usuario);
$stmt->execute();

// Verificar se o registro foi encontrado
$result = $stmt->fetch();

// Se o registro foi encontrado, verificar se a senha está correta
if ($result) {
    if (password_verify($nu_senha, $result['nu_senha'])) {
        // A senha está correta, redirecionar o usuário para a página inicial
        $_SESSION['nm_usuario'] = $nm_usuario;
        session_unset(); // Limpa as variáveis de sessão
        header('Location: home.php');
        exit();
    } else {
        $_SESSION['mensagem_erro'] = "Erro: senha incorreta.";
    }
} else {
    $_SESSION['mensagem_erro'] = "Erro: usuário não existe.";
}

// Se houver uma mensagem de erro na sessão, exiba-a e remova-a
if (isset($_SESSION['mensagem_erro'])) {
    echo $_SESSION['mensagem_erro'];
    unset($_SESSION['mensagem_erro']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="fashion.css">
    <script src="programa.js"></script>
    
</head>

<body>
    <div classe="caixinha">
        <Div class="barraSuperior">
            <!-- Logo no lado esquerdo -->
            <div class="logo">
            
                <img src="BitsLogo.png" alt="Logo do Site">
            </div>
            <div class="nomeSite">
            <h1>BITS</h1><br/>
            <h2>DO CONHECIMENTO</h2>
            </div>
            
            <!-- Botões no lado direito -->
            <div class="botao">
                <a href="registroEscolha.php"><button>Registro</button></a><br>
                <a href="login.php"><button>login</button></a>
            </div>
        </Div>
        <div class="corpo">
        <div class="login">
        <form action="login.php" method="post">
            <div class="campo">
                <label for="nm_usuario">Nome de usuário</label>
                <input type="text" name="nm_usuario" id="nm_usuario" required>
            </div>
            <div class="campo">
                <label for="nu_senha">Senha</label>
                <input type="password" name="nu_senha" id="nu_senha" required>
            </div>
            <div class="botoes">
                <button type="submit">Logar</button>
            </div>
        </form>
    </div>
        </div>
            <Div class="barraInferior">
            <!-- Logo no lado esquerdo -->
            <div>
            2023
            </div>
            <div>
            © Bits do conhecimento
            </div>
            <div>
                Nícolas Ramires
            </div> 
        </Div>
    </Div>
</body>
<footer>
    <script src="programa.js"></script>
</footer>
</html>
