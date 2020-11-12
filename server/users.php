<?php
require 'DB.php';

    $db = new DB();
    $x = $db->getUsers();

    echo json_encode( $x);

?>