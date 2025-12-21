<?php
include __DIR__ . "/../Config/connect.php";
session_start();

$id = $_GET['id'];

$sql = "SELECT reservation.*, user.nom 
        FROM reservation 
        JOIN user ON user.id_user = reservation.id_coach
        WHERE id_reservation = '$id'";

$res = mysqli_query($connect, $sql);
$r = mysqli_fetch_assoc($res);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $date = $_POST['date'];
    $heure = $_POST['heure'];

    mysqli_query($connect, "
        UPDATE reservation 
        SET date_reservation='$date',
            heure_debut='$heure'
        WHERE id_reservation='$id'
    ");

    header("Location: user.php");
    exit();
}
?>
