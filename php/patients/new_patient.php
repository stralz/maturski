<?php
include '../dbh.php';

if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["gender"]) && isset($_POST["id_number"])
&& isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["mail"])) {

    $first_name            = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name             = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $gender                = mysqli_real_escape_string($conn, $_POST["gender"]);
    $identification_number = mysqli_real_escape_string($conn, $_POST["id_number"]);
    $address               = mysqli_real_escape_string($conn, $_POST["address"]);
    $phone                 = mysqli_real_escape_string($conn, $_POST["phone"]);
    $mail                  = mysqli_real_escape_string($conn, $_POST["mail"]);

    $q = "SELECT * FROM patients WHERE p_identification_number LIKE('$identification_number')";
    $result = $conn->query($q);

    if($result->num_rows > 0) {
        echo "There's already a patient with that identification number!";
    } else {
        $q = "INSERT INTO patients (p_id, p_first_name, p_last_name, p_gender, p_identification_number, p_address, p_phone, p_mail)
             VALUES (NULL, '$first_name', '$last_name', '$gender', '$identification_number', '$address', '$phone', '$mail')";
        $conn->query($q);

        echo "The patient is successfully added!";
    }
}
?>
