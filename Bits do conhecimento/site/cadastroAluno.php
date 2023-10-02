<?php
   require_once("PHP.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="fashion.css">
    <style>
        body {
            background-color: black; 
            color: white; 
        }
    </style>
</head>
<body>
    <h3><?=$mensagem?></h3>

    <form method="GET">
        <label for="nome">Nome</label>
            <input type="text" name="nome" required id="nome" value="<?=$nome?>"><br><br>
        <label for="email">Email</label>
            <input type="email" name="email" required id="email" value="<?=$email?>"><br><br>
        <label for="senha">Senha</label>
            <input type="password" name="senha" required id="senha" value="<?=$senha?>"><br></br>
        <label for="senha2">Comfirme a<br> senha</label>
            <input type="password" name="senha2" required id="senha2" value="<?=$senha2?>"><br></br>
        <fieldset>
            <legend>Cursos que deseja ver no futuro</legend>
            <?php
                echo checkbox("cursofutu", $curso_futuro, $curfutu_selec);
            ?>
        </fieldset>
        <fieldset>
            <legend>Genero</legend>
            <?php
                echo radio("genero", $genero);
            ?>
        </fieldset>
        <br><br>
        <?php
            echo select("Formação: ", "formação", $formacao, "","");
        ?>



        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>