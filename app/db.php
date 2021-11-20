<?php

    session_start();

    $host="localhost";
    $user="root";
    $password="";
    $database="expense";

    $connection=new mysqli($host,$user,$password,$database);