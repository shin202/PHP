<?php
    
    $id = empty($_GET['id']) ? false : $_GET['id'];
    $decode_id = decode_id($id);
    
    $sql = "SELECT * FROM buoi5 WHERE id = ?";
    $stmt = $connect -> prepare($sql);
    $stmt -> bind_param("s", $decode_id);
    $stmt -> execute();
    $result = $stmt -> get_result();

    $information = $result -> fetch_array();
    $stmt -> close();
?>