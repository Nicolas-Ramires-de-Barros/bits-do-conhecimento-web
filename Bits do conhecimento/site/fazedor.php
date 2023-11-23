<?php
require_once("../banco/banco.php");
require_once("../banco/tabelas.php");

$curso_futuro = db_curso_futuro_select();
$genero = db_genero_select();
$formacao = db_formacao_select();
$etinia = db_etinia_select();


$senha2 = (isset($_POST['senha2']) ? $_POST['senha2'] : "");
$curfutu_selec = (isset($_POST['cursofutu']) ? $_POST['cursofutu'] : array());


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


function checkbox($nome, $info, $selecionados, $classe, $Nbox){
    $html="";
    for($i=0; $i<=count($info)-1; $i++){
        $html .= "<label class=\"${classe}\" for=\"" . $nome . "_" . $info[$i][0] . "\">" . $info[$i][1] . "";
        
        $html .="<input 
            type=\"checkbox\" ". (in_array($info[$i][0], $selecionados) ? "checked" : "") ."
            name=\"${nome}[]\" 
            id=\"${nome}_" . $info[$i][0] . "\" 
            value=\"".$info[$i][0]."\"
            >\n";
        $html .="<span class=\"${Nbox}\" style=\"display: block;\"> </span>\n";
            
        $html .="</label><br>\n";
    }
    
 
    return $html;
}

function radio($nome, $info, $classe, $Ncir){
    $html = "";
    for($i=0; $i<=count($info)-1; $i++){
         
        $html .= "<label class=\"${classe}\" for=\"" . $nome . "_" . $info[$i][0] . "\">" . $info[$i][1] . "";
        $html .= "<input    
        type=\"radio\" 
        name=\"${nome}[]\" 
        id=\"" . $nome . "_" . $info[$i][0]."\" 
        value=\"" . $info[$i][1] . "\"
        >\n";
        $html .="<span class=\"${Ncir}\" style=\"display: block;\"> </span>\n";
        $html .="</label><br>\n";
    }
     
    return $html;
}
 
function select($nome, $info, $tamanho, $varios, $classe) {
    $html="";
    $html .= "<div class=\"${classe}\">";
    $html .= "<label for=\"". $nome ."\"></label>\n";
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
    $html .= "</div>";
    return $html;
}

function db_pessoa_insert($nome, $nomeU, $email, $senha, $genero, $etinia, $formacao, $cargo) {
    global $conn;

    $sth = $conn->prepare("
        INSERT INTO tb_pessoa (nm_pessoa, nm_usuario, email_pessoa, nu_senha, id_genero, id_etinia, id_formacao, id_cargo)
        VALUES (:nome, :nomeU, :email, :senha, :genero, :etinia, :formacao, :cargo)
    ");

    $sth->bindParam(':nome', $nome);
    $sth->bindParam(':nomeU', $nomeU);
    $sth->bindParam(':email', $email);
    $sth->bindParam(':senha', $senha);
    $sth->bindParam(':genero', $genero);
    $sth->bindParam(':etinia', $etinia);
    $sth->bindParam(':formacao', $formacao);
    $sth->bindParam(':cargo', $cargo);

    return $sth->execute();
}