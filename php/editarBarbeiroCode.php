<?php
   
   include 'php/conexao.php';

   
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $cpf = $_POST['cpf'];
    $aniversario = $_POST['aniversario'];
    $datainicio = $_POST['datainicio'];
    $idPegar = $_POST['idPegar'];

    $sql = "UPDATE barbeiro set nome = '$nome', email = '$email', telefone='$celular',cpf = '$cpf',aniversario = '$aniversario',datainicio = '$datainicio' where id = '$idPegar'";
    $result  = mysqli_query($conn, $sql);
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
        echo "<script>alert('Atualizado Com Sucesso!');window.location.href='equipe.php';</script>";
    }else{
        echo "ERRO AO ATUALIZAR!";
    }