<?php
    include '../dbh.php';

    if(isset($_POST["edit_doctor_id"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["gender"]) && isset($_POST["doctor_id"])
    && isset($_POST["phone"]) && isset($_POST["mail"])) {

        $edit_doctor_id = mysqli_real_escape_string($conn, $_POST["edit_doctor_id"]);
        $first_name     = mysqli_real_escape_string($conn, $_POST["first_name"]);
        $last_name      = mysqli_real_escape_string($conn, $_POST["last_name"]);
        $doctor_id      = mysqli_real_escape_string($conn, $_POST["doctor_id"]);
        $phone          = mysqli_real_escape_string($conn, $_POST["phone"]);
        $mail           = mysqli_real_escape_string($conn, $_POST["mail"]);
        $gender         = mysqli_real_escape_string($conn, $_POST["gender"]);

        $q = "UPDATE doctors SET d_first_name='$first_name', d_last_name='$last_name', d_doctor_id='$doctor_id',
        d_phone='$phone', d_mail='$mail', d_gender='$gender' WHERE d_id=$edit_doctor_id";
        echo $q;
        $conn->query($q);
    }
?>
