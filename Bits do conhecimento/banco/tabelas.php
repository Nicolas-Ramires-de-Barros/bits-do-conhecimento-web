<?php
function db_curso_futuro_select(){
    global $conn;
    $sth = $conn->prepare("select id_curso_futuro, nm_curso_futuro from tb_curso_futuro;"); // MUDA PARA O SELECT QUE VOQUE QUER
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
    $hola = $conn->prepare("select * from tb_formacao where id_formacao in (5,6,7,8,9,10,11,12) order by id_formacao asc;");
    $hola->execute();
    return $hola->fetchAll();
}