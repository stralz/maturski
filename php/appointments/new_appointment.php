<?php
  include '../dbh.php';

  if (isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["description"])
  && isset($_POST["identification_number"]) && isset($_POST["doctor_id"])) {

    $date                  = mysqli_real_escape_string($conn, $_POST["date"]);
    $time                  = mysqli_real_escape_string($conn, $_POST["time"]);
    $description           = mysqli_real_escape_string($conn, $_POST["description"]);
    $identification_number = mysqli_real_escape_string($conn, $_POST["identification_number"]);
    $doctor_id             = mysqli_real_escape_string($conn, $_POST["doctor_id"]);

    $q = "SELECT p_id FROM patients WHERE p_identification_number LIKE ('$identification_number')";
    $result = $conn->query($q);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $p_id = $row["p_id"];

      $q = "SELECT d_id FROM doctors WHERE d_doctor_id LIKE ('$doctor_id')";
      $result_ = $conn->query($q);
      if ($result_->num_rows > 0) {
        $row_ = $result_->fetch_assoc();
        $d_id = $row_["d_id"];

        $q = "INSERT INTO appointments (a_id, a_date, a_time, a_description, a_completed, p_id, d_id)
        VALUES (NULL, '$date', '$time', '$description', 0, '$p_id', '$d_id')";

        $conn->query($q);

        echo "You successfully made an appointment!";
      } else {
        echo "It cannot be done!";
      }
    } else {
      echo "It cannot be done!";
    }





  }
?>
