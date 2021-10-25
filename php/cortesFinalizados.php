<?php
    $serve_file = $_SERVER['DOCUMENT_ROOT']."/barbearia/";
    session_save_path($serve_file.'cache/temp');
    session_start();
    include_once($serve_file.'site/public_html/php/conexao.php');

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $datacorte = $_POST['datacorte'];
    $hora = $_POST['hora'];
    $telefone = $_POST['telefone'];
    $barbeiro = $_POST['barbeiro'];
    $valorCorte = $_POST['valorCorte'];
    $idPegar = $_POST['idPegar'];
    
    
    $sql = ("INSERT into cortes(id_corte,nomeCliente,datacorte,barbeiro,telefone,valorCorte) values ('$id', '$nome','$datacorte', '$barbeiro', '$telefone', '$valorCorte')");
    $result = mysqli_query($conn, $sql);
        
    $sql2 = "DELETE from agenda where id_agenda = '$idPegar'";
    $result2  = mysqli_query($conn, $sql2);
        
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
        
        echo "<script>alert('Finalizado Com Sucesso!');window.location.href='/barbeariaOn/site/public_html/agenda.php';</script>";
    }else{
        echo "ERRO AO ATUALIZAR!";
    }
    