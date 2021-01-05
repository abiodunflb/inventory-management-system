<?php include '../user/connection.php'; ?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn->query("DELETE FROM units WHERE id = '$id'") or die($conn->error());
    // $_SESSION['msg'] = 'User Deleted Successfully';
    header("Location: add_unit.php");
}
