<!DOCTYPE html>
<?php
    include 'php/dbh.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Patients</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <link rel="stylesheet" href="css/master.css">
    </head>
    <body>
        <div class="modal fade bd-example-modal-lg" id="newPatientModal" tabindex="-1" role="dialog" aria-labelledby="newPatientModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">New Patient</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="p_first_name"><b>First name: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="p_first_name" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="p_last_name"><b>Last name: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="p_last_name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="p_gender"><b>Gender: <span style="color: red;">*</span></b></label>
                                    <select class="form-control" name="p_gender" required>
                                        <option>Gender:</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="p_identification_number"><b>Identification number: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="p_identification_number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="p_address"><b>Address: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="p_address" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="p_phone"><b>Phone: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="p_phone" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="p_mail"><b>E-mail:</b></label>
                                    <input class="form-control" type="email" name="p_mail">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="add_patient_button_modal">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="editPatientModal" tabindex="-1" role="dialog" aria-labelledby="editPatientModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Patient</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="ep_first_name"><b>First name: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="ep_first_name" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="ep_last_name"><b>Last name: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="ep_last_name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="ep_gender"><b>Gender: <span style="color: red;">*</span></b></label>
                                    <select class="form-control" name="ep_gender" required>
                                        <option>Gender:</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="ep_identification_number"><b>Identification number: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="ep_identification_number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="ep_address"><b>Address: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="ep_address" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="ep_phone"><b>Phone: <span style="color: red;">*</span></b></label>
                                    <input class="form-control" type="text" name="ep_phone" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="ep_mail"><b>E-mail:</b></label>
                                    <input class="form-control" type="email" name="ep_mail">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger mr-auto" type="button" name="ep_delete_patient" id="ep_delete_patient"><i class="fas fa-trash"></i> Delete patient</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="save_patient_button_modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" width="80%" class="d-inline-block align-top" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="patients.php">Patients <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Check for appointments</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="pb-2 mt-3 mb-4 border-bottom">
                  <h3>Patients</h1>
            </div>
            <form method="get">
                <div class="form-row justify-content-between">
                    <div class="form-group col-md-6 col-sm-6">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                            </div>
                            <input type="search" name="q" class="form-control mr-2" placeholder="Identification number:" id="patient_identification_id" autocomplete="off" value="<?php
                                if(isset($_GET["q"])) {
                                    echo $_GET["q"];
                                }
                            ?>">
                            <button type="submit" class="btn btn-dark" id="search_button"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-success ml-1" id="add_patient_button" data-toggle="modal" data-target="#newPatientModal" style="color: white !important;">
                            <i class="fas fa-user-plus"></i> Add a patient
                        </a>
                    </div>
                </div>
            </form>
            <div class="row mb-2">
                <div class="col-3">
                    <form method="get">
                        <a class="btn btn-primary mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-filter"></i> Filter
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <select class="form-control mb-2" name="column">
                                    <option>Choose a column:</option>
                                    <option value="first_name">First Name</option>
                                    <option value="last_name">Last Name</option>
                                    <option value="last_name">Gender</option>
                                    <option value="identification_number">Identification number</option>
                                    <option value="address">Address</option>
                                    <option value="phone">Phone</option>
                                    <option value="mail">Mail</option>
                                </select>
                                <select class="form-control mb-2" name="type">
                                    <option value="ascending">Asceding</option>
                                    <option value="descending">Descending</option>
                                </select>
                                <button class="btn btn-success" id="filter_button">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <?php
                        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (strpos($actual_link, '?') !== false) {
                            echo "<span class=\"badge badge-danger\" id=\"clear_filter_button\">Clear filter <i class=\"fas fa-times\"></i></span>";
                        }
                    ?>
                </div>
            </div>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>ID #</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Mail</th>
                </thead>
                <tbody id="table_patients_body">
                    <?php
                        if(isset($_GET["q"]) && !empty($_GET["q"])) {
                            $q_id = $_GET["q"];

                            $q = "SELECT * FROM patients WHERE p_identification_number=$q_id";
                            $result = $conn->query($q);

                            $br = 1;
                            if($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr id=\"row_{$row["p_id"]}\">";
                                    echo "<th>$br</td>";
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
                            } else {
                                echo "<tr id=\"results\"><th>0 results found.</th></tr>";
                            }
                        } else {
                            if(isset($_GET["column"]) && isset($_GET["type"])) {
                                $column = $_GET["column"];
                                $type = $_GET["type"];

                                if($type == "ascending") {
                                    $q = "SELECT * FROM patients ORDER BY p_$column ASC";
                                } else {
                                    $q = "SELECT * FROM patients ORDER BY p_$column DESC";
                                }

                                $result = $conn->query($q);

                                $br = 1;
                                if($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr id=\"row_{$row["p_id"]}\">";
                                        echo "<th>$br</td>";
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
                                        echo "<tr id=\"row_{$row["p_id"]}\">";
                                        echo "<th>$br</td>";
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
                    ?>
                </tbody>
            </table>
        </div>
        <script src="js/main.js"></script>
    </body>
</html>
