<?php
    include '../dbh.php';

    if (isset($_POST["edit_doctor_id"])) {
        $edit_doctor_id = mysqli_real_escape_string($conn, $_POST["edit_doctor_id"]);

        $q = "DELETE FROM doctors WHERE d_id=$edit_doctor_id";
        $conn->query($q);
    }
?>
