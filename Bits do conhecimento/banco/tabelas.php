<?php
function db_curso_futuro_select(){
    global $conn;
    $sth = $conn->prepare("select id_curso, nm_curso from tb_curso where fl_curso_ativo = false;"); 
    $sth->execute() ;
    return $sth->fetchAll();

}

function db_genero_select(){
    global $conn;
    $ola = $conn->prepare("select id_genero, nm_genero from tb_genero;");
    $ola->execute();
    return $ola->fetchAll();
}

function db_formacao_select(){
    global $conn;
    $hola = $conn->prepare("select * from tb_formacao order by id_formacao asc ;");
    $hola->execute();
    return $hola->fetchAll();
}

function db_formacao_colaborador_select(){
    global $conn;
    $hola = $conn->prepare("select * from tb_formacao where id_formacao not in (1,2,3,4) order by id_formacao asc;");
    $hola->execute();
    return $hola->fetchAll();

}

function db_etinia_select(){
    global $conn;
    $hola = $conn->prepare("select id_etinia, nm_etinia from tb_etinia;");
    $hola->execute();
    return $hola->fetchAll();
}

function db_id_curso_select($nm_curso) {

    global $conn;

    $sth = $conn->prepare("SELECT id_curso FROM tb_curso WHERE nm_curso = :nm_curso");

    $sth->bindParam(':nm_curso', $nm_curso);
    $sth->execute();

    $result = $sth->fetch();
    return $result['id_curso'];
}


function db_id_pessoa_select($nm_us){
    global $conn;
    $hola = $conn->prepare("select id_pessoa from tb_pessoa where nm_usuario = :nm_us ;");
    $sth->bindParam(':nm_us', $nm_us);
    $hola->execute();
    return $hola->fetchAll();
}