<?php
   require_once("../banco/banco.php");
   require_once("../banco/tabelas.php");

    $curso_futuro = db_curso_futuro_select();
    $genero = db_genero_select();
    $formacao = db_formacao_select();


    $nome = (isset($_GET['nome']) ? $_GET['nome'] : "");
    $email = (isset($_GET['email']) ? $_GET['email'] : "");
    $senha = (isset($_GET['senha']) ? $_GET['senha'] : "");
    $senha2 = (isset($_GET['senha2']) ? $_GET['senha2'] : "");
    $curfutu_selec = (isset($_GET['cursofutu']) ? $_GET['cursofutu'] : array());
   
    /*$cursos_desejados = array(
        array(1,"Game maker"),
        array(2,"Twine"),
        array(3,"PostegreSQL"),
        array(4,"PHP")
    );*/

    /*$genero = array(
        array("M","Mulher"),
        array("H","Homen"),
        array("NB","Não Binario")
    );*/

    /*$formacao = array(
        array(1,"Fundamental"),
        array(2,"Fundamental incompleto"),
        array(3,"Medio"),
        array(4,"Medio incompleto"),
        array(5,"Tecnico"),
        array(6,"Tecnico incompleto"),
        array(7,"Graduação"),
        array(8,"Graduação incompleta")
    );*/

    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($senha === $senha2) {
           
            $mensagem = "";
            
        } else {
            $mensagem = "As senhas não coincidem. Por favor, digite as senhas novamente.";
        }
    }

    function checkbox($nome, $info, $selecionados){
        $html="";
        for($i=0; $i<=count($info)-1; $i++){
            $html .= "<label for=\"" . $nome . "_" . $info[$i][0] . "\">" . $info[$i][1] . "</label>\n";
            $html .="<input 
            type=\"checkbox\" ". (in_array($info[$i][0], $selecionados) ? "checked" : "") ."
            name=\"${nome}[]\" 
            id=\"${nome}_" . $info[$i][0] . "\" 
            value=\"".$info[$i][0]."\"
            >\n";
        }

        return $html;
    }

    function radio($nome, $info){
        $html = "";
        for($i=0; $i<=count($info)-1; $i++){
            
            $html .= "<input 
            type=\"radio\" 
            name=\"${nome}[]\" 
            id=\"" . $nome . "_" . $info[$i][0]."\" 
            value=\"" . $info[$i][1] . "\"
            >" . $info[$i][1] . "\n";
        }
        
        return $html;
    }
    
    function select($nomeN, $nome, $info, $tamanho, $varios) {
        $html="";
        $html .= "<label for=\"". $nome ."\">  $nomeN  </label>\n";
        $html .= "<select 
        id=\"". $nome ."\" 
        name=\"${nome}[]\" 
        " . $varios . " 
        size=" . $tamanho . "
        >\n";
        for($i=0; $i<=count($info)-1; $i++){
            $html .= "<option 
            value=\"".$info[$i][1]."\"
            >".$info[$i][1]."
            </option>\n";
        }
        $html .= "</select>\n";
        return $html;
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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