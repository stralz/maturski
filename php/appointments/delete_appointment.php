<?php
  include '../dbh.php';

  if (isset($_POST["a_code_number"])) {
    $a_code_number = mysqli_real_escape_string($conn, $_POST["a_code_number"]);
    $q             = "DELETE FROM appointments WHERE a_id=$a_code_number";

    $conn->query($q);
    echo "You successfully completed the appointment!";
  } else {
    echo "There is no such appointment!";
  }
?>
