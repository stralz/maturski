<?php
  include '../dbh.php';

  if (isset($_POST["appointment_date"])) {

    $appointment_date = mysqli_real_escape_string($conn, $_POST["appointment_date"]);
    $q                = "SELECT a_id, a_date, a_time, d_id, d_first_name, d_last_name, p_id, p_first_name, p_last_name
    FROM doctors JOIN appointments USING (d_id) JOIN patients USING (p_id) WHERE a_date LIKE ('$appointment_date')";

    $result = $conn->query($q);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr id=\"{$row["a_id"]}\">";
        echo "<td>{$row["a_id"]}</td>";
        echo "<td><input class=\"completed\" type=\"checkbox\"></td>";
        echo "<td id=\"{$row["d_id"]}\">{$row["d_first_name"]} {$row["d_last_name"]}</td>";
        echo "<td id=\"{$row["p_id"]}\">{$row["p_first_name"]} {$row["p_last_name"]}</td>";
        echo "<td>{$row["a_date"]}</td>";
        echo "<td>{$row["a_time"]}</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr id=\"results\"><td>0 podataka nadjeno na dan $appointment_date.</td></tr>";
    }
  }
?>
