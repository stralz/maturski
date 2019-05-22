<?php
    include '../dbh.php';

    if(isset($_POST["doctor_search_id"])) {
      $doctor_search_id = mysqli_real_escape_string($conn, $_POST["doctor_search_id"]);
      $q = "SELECT * FROM doctors WHERE d_doctor_id LIKE ('$doctor_search_id')";

      if($doctor_search_id == "") {
          $result = $conn->query($q);
          $br = 1;
          if($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th id=\"row_{$row["d_id"]}\">$br</td>";
                echo "<td>{$row["d_first_name"]}</td>";
                echo "<td>{$row["d_last_name"]}</td>";
                echo "<td>{$row["d_doctor_id"]}</td>";
                echo "<td>{$row["d_phone"]}</td>";
                echo "<td>{$row["d_mail"]}</td>";
                echo "<td>{$row["d_gender"]}</td>";
                echo "</tr>";
                $br++;
              }
          }
      } else {
          $q = "SELECT * FROM doctors";
          $result = $conn->query($q);

          $br = 1;
          if($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr id=\"row_{$row["d_id"]}\">";
                echo "<th>$br</td>";
                echo "<td>{$row["d_first_name"]}</td>";
                echo "<td>{$row["d_last_name"]}</td>";
                echo "<td>{$row["d_doctor_id"]}</td>";
                echo "<td>{$row["d_phone"]}</td>";
                echo "<td>{$row["d_mail"]}</td>";
                echo "<td>{$row["d_gender"]}</td>";
                echo "</tr>";
                $br++;
              }
          }
      }
    }

    if (isset($_POST["edit_doctor_id"])) {
        $edit_doctor_id = mysqli_real_escape_string($conn, $_POST["edit_doctor_id"]);

        $q              = "SELECT * FROM doctors WHERE d_id=$edit_doctor_id";
        $result         = $conn->query($q);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode([
              "d_first_name" => $row["d_first_name"],
              "d_last_name"  => $row["d_last_name"],
              "d_doctor_id"  => $row["d_doctor_id"],
              "d_phone"      => $row["d_phone"],
              "d_mail"       => $row["d_mail"],
              "d_gender"     => $row["d_gender"],
            ]);
        }
    }

?>
