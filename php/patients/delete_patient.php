<?php
    include '../dbh.php';

    if (isset($_POST["edit_patient_id"])) {
        $edit_patient_id = mysqli_real_escape_string($conn, $_POST["edit_patient_id"]);


        $q = "DELETE FROM patients WHERE p_id=$edit_patient_id";
        $conn->query($q);
    }
?>
