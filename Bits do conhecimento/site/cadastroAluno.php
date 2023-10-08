<?php
    require_once("fazedor.php")
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="fashion.css">
   
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
            <h3><?=$mensagem?></h3>
            <div class="t">
                <form method="GET">
                <label for="nome">Nome</label><br>
                    <input class="textos" type="text" name="nome" required id="nome" value="<?=$nome?>"><br><br>
                <label for="email">Email</label><br>
                    <input class="textos" type="email" name="email" required id="email" value="<?=$email?>"><br><br>
                <label for="senha">Senha</label><br>
                    <input class="textos" type="password" name="senha" required id="senha" value="<?=$senha?>"><br></br>
                <label for="senha2">Comfirme a senha</label><br>
                    <input class="textos" type="password" name="senha2" required id="senha2" value="<?=$senha2?>"><br></br>
            </div>
                    
    


                    <div class="marcas">
                        <legend>Qual sua formação</legend><br>
                        <?php
                            echo select("Formação: ", "formação", $formacao, "","", "gavetan");
                        ?>
                        <legend>Cursos que deseja ver no futuro</legend><br>
                        <?php
                            echo checkbox("cursofutu", $curso_futuro, $curfutu_selec, "selecao", "caixan");
                        ?>
                        <br></br>
                    
                        <legend>Genero</legend>
                        <?php
                            echo radio("genero", $genero, "selecao", "circulon");
                        ?>
                        
                    </div>

                <br><br>
                <input class="subbotao" type="submit" value="Enviar" style="font-size: 25px;">
            </form>
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