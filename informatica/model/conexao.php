<?php
    $link;
    function connect(){
        global $link;
        $link = mysqli_connect("localhost", "root", "", "pmaquina") or
        die(mysqli_connect_error());
    }

    function query($command){
        global $link;
        mysqli_query($link, "SET CHARACTER SET utf8");
        $query=mysqli_query($link, $command) or
        die(mysqli_error($link));
        return $query;
    }

    function close(){
        global $link;
        mysqli_close($link);
    }
?>