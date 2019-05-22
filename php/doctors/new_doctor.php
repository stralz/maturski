<?php
include '../dbh.php';

if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["doctor_id"])
&& isset($_POST["phone"]) && isset($_POST["mail"]) && isset($_POST["gender"])) {

    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name  = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $gender     = mysqli_real_escape_string($conn, $_POST["gender"]);
    $doctor_id  = mysqli_real_escape_string($conn, $_POST["doctor_id"]);
    $phone      = mysqli_real_escape_string($conn, $_POST["phone"]);
    $mail       = mysqli_real_escape_string($conn, $_POST["mail"]);

    $q = "SELECT * FROM doctors WHERE d_doctor_id LIKE('$doctor_id')";
    $result = $conn->query($q);

    if($result->num_rows > 0) {
        echo "There's already a doctor with that doctor ID!";
    } else {
        $q = "INSERT INTO doctors (d_id, d_first_name, d_last_name, d_doctor_id, d_phone, d_mail, d_gender)
             VALUES (NULL, '$first_name', '$last_name', '$doctor_id', '$phone', '$mail', '$gender')";
        $conn->query($q);

        echo "The doctor is successfully added!";
    }
}
?>
