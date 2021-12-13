<?php
    $page = (isset($_GET['page']) ? $_GET['page'] : 1);
    $perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 30);
    $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


    $sql = "select * from ".$tabla." WHERE usuario='".$user."' ORDER BY id DESC limit ".$start." , ".$perPage." ";
    $total = $db->query("select * from ".$tabla." WHERE usuario='".$user."'")->num_rows;
    $pages = ceil($total / $perPage);

    $rows = $db->query($sql);
?>