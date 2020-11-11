<?php
require 'DB.php';

    $db = new DB();
    $x = $db->getUsers();

    var_dump ( json_encode( $x));

?>