<?php

    //alert msg

    function validate($msg,$type='danger'){
        return '<p class="alert alert-'.$type.'"> '.$msg.' <button class="close" data-dismiss="alert">&times;</button></p>';
    }

    // data insert

    function insert($sql){

        global  $connection;

        $connection->query($sql);

    }
    // data update

    function update($sql){

        global  $connection;

        $connection->query($sql);

    }
    // data get

    function get($sql){

        global  $connection;

        $connection->query($sql);

    }

    //value check

    function valueCheck($table,$column,$val){
        global  $connection;

        $sql="SELECT $column FROM $table WHERE $column='$val' ";
        $data= $connection->query($sql);
        return $data->num_rows;
    }

