<?php
    include 'dbh.php';

    if(isset($_POST["patient_search_id"])) {
        $patient_search_id = mysqli_real_escape_string($conn, $_POST["patient_search_id"]);
        $q = "SELECT * FROM patients WHERE p_identification_number LIKE ('$patient_search_id')";

        if($patient_search_id == "") {
            $result = $conn->query($q);
            $br = 1;
            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th id=\"row_{$row["p_id"]}\">$br</td>";
                    echo "<td>{$row["p_first_name"]}</td>";
                    echo "<td>{$row["p_last_name"]}</td>";
                    echo "<td>{$row["p_gender"]}</td>";
                    echo "<td>{$row["p_identification_number"]}</td>";
                    echo "<td>{$row["p_address"]}</td>";
                    echo "<td>{$row["p_phone"]}</td>";
                    echo "<td>{$row["p_mail"]}</td>";
                    echo "</tr>";
                    $br++;
                }
            }
        } else {
            $q = "SELECT * FROM patients";
            $result = $conn->query($q);

            $br = 1;
            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th id=\"row_{$row["p_id"]}\">$br</td>";
                    echo "<td>{$row["p_first_name"]}</td>";
                    echo "<td>{$row["p_last_name"]}</td>";
                    echo "<td>{$row["p_gender"]}</td>";
                    echo "<td>{$row["p_identification_number"]}</td>";
                    echo "<td>{$row["p_address"]}</td>";
                    echo "<td>{$row["p_phone"]}</td>";
                    echo "<td>{$row["p_mail"]}</td>";
                    echo "</tr>";
                    $br++;
                }
            }
        }
    }

    if (isset($_POST["edit_patient_id"])) {
        $edit_patient_id = mysqli_real_escape_string($conn, $_POST["edit_patient_id"]);

        $q               = "SELECT * FROM patients WHERE p_id=$edit_patient_id";
        $result          = $conn->query($q);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode([
                "p_first_name" => $row["p_first_name"],
                "p_last_name" => $row["p_last_name"],
                "p_gender" => $row["p_gender"],
                "p_identification_number" => $row["p_identification_number"],
                "p_address" => $row["p_address"],
                "p_phone" => $row["p_phone"],
                "p_mail" => $row["p_mail"],
            ]);
        }
    }

?>
