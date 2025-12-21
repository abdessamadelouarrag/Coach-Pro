<?php
include __DIR__ . "/../Config/connect.php";
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['delete'])) {
    header("Location: user.php");
    exit();
}

$id_reservation = $_GET['delete'];

$sql = "SELECT id_disponibilite FROM reservation WHERE id_reservation = '$id_reservation'";
$res = mysqli_query($connect, $sql);

if ($row = mysqli_fetch_assoc($res)) {

    $id_dispo = $row['id_disponibilite'];

    mysqli_query($connect, "DELETE FROM reservation WHERE id_reservation = '$id_reservation'");

    mysqli_query($connect, "UPDATE disponibilite SET status = 'libre' WHERE id_disponibilite = '$id_dispo'");
}

header("Location: user.php?delete=success");
exit();
