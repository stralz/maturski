<?php
    include 'dbh.php';

    if(isset($_POST["edit_patient_id"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["gender"]) && isset($_POST["id_number"])
    && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["mail"])) {

        $edit_patient_id       = mysqli_real_escape_string($conn, $_POST["edit_patient_id"]);
        $first_name            = mysqli_real_escape_string($conn, $_POST["first_name"]);
        $last_name             = mysqli_real_escape_string($conn, $_POST["last_name"]);
        $gender                = mysqli_real_escape_string($conn, $_POST["gender"]);
        $identification_number = mysqli_real_escape_string($conn, $_POST["id_number"]);
        $address               = mysqli_real_escape_string($conn, $_POST["address"]);
        $phone                 = mysqli_real_escape_string($conn, $_POST["phone"]);
        $mail                  = mysqli_real_escape_string($conn, $_POST["mail"]);

        $q = "UPDATE patients SET p_first_name='$first_name', p_last_name='$last_name', p_gender='$gender',
              p_identification_number='$identification_number', p_address='$address', p_phone='$phone', p_mail='$mail'
              WHERE p_id=$edit_patient_id";
        $conn->query($q);
    }
?>
