<?php

    $conn = mysqli_connect('localhost','root','','barbearia');

    if(!$conn){
        echo "ERRO NO BANCO!";
    }