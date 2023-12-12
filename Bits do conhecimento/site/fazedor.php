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

function db_pessoa_insert($nome, $nomeU, $email, $senha, $genero, $etinia, $cargo) {
    global $conn;

    // Verifica se $genero é um array e pega o primeiro elemento
    $genero = is_array($genero) ? $genero[0] : $genero;

    // Recupera o ID do gênero a partir do nome do gênero
    $idGenero = db_genero_id_por_nome($genero);

    // Verifica se $etinia é um array e pega o primeiro elemento
    $etinia = is_array($etinia) ? $etinia[0] : $etinia;

    // Recupera o ID da etnia a partir do nome da etnia
    $idEtnia = db_etinia_id_por_nome($etinia);

    $sth = $conn->prepare("
        INSERT INTO tb_pessoa (nm_pessoa, nm_usuario, email_pessoa, nu_senha, id_genero, id_etinia, id_cargo)
        VALUES (:nome, :nomeU, :email, :senha, :idGenero, :idEtnia, :cargo)
    ");

    $sth->bindParam(':nome', $nome);
    $sth->bindParam(':nomeU', $nomeU);
    $sth->bindParam(':email', $email);
    $sth->bindParam(':senha', $senha);
    $sth->bindParam(':idGenero', $idGenero, PDO::PARAM_INT);  // Utiliza o ID do gênero
    $sth->bindParam(':idEtnia', $idEtnia, PDO::PARAM_INT);  // Utiliza o ID da etnia
    $sth->bindParam(':cargo', $cargo);

    return $sth->execute();
}

function db_curso_interece_insert($nm_usuario, $cursosDesejados) {
    global $conn;

    $id_curso = db_id_curso_select($cursosDesejados);
    $id_pessoa = db_id_pessoa_select($nm_usuario);
   
        $sth = $conn->prepare("
            INSERT INTO tb_curso_interece (id_curso, id_aluno)
            VALUES (:idCurso, :idPessoa)
        ");

        $sth->bindParam(':idCurso', $idCurso);
        $sth->bindParam(':idPessoa', $idPessoa);

        $sth->execute();
    
}

// Adicione as seguintes funções para obter o ID da etnia e da formação a partir do nome
function db_etinia_id_por_nome($nomeEtnia) {
    global $conn;

    $sth = $conn->prepare("select id_etinia FROM tb_etinia WHERE nm_etinia = :nomeEtnia");
    $sth->bindParam(':nomeEtnia', $nomeEtnia);
    $sth->execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['id_etinia'] : null;
}


// Adicione a seguinte função para obter o ID do gênero a partir do nome
function db_genero_id_por_nome($nomeGenero) {
    global $conn;

    $sth = $conn->prepare("select id_genero From tb_genero WHERE nm_genero = :nomeGenero");
    $sth->bindParam(':nomeGenero', $nomeGenero);
    $sth->execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['id_genero'] : null;
}

function db_curso_id_por_nome($nomeCurso) {
    global $conn;

    $sth = $conn->prepare("select id_curso FROM tb_curso WHERE nm_curso = :nomeCurso");
    $sth->bindParam(':nomeCurso', $nomeCurso);
    $sth->execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['id_curso'] : null;
}
