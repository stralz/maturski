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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link rel="stylesheet" href="css/master.css">
</head>
<body>
  <div class="modal fade bd-example-modal-lg" id="newDoctorModal" tabindex="-1" role="dialog" aria-labelledby="newDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">New Doctor</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="d_first_name"><b>First name: <span style="color: red;">*</span></b></label>
                <input class="form-control" type="text" name="d_first_name" required>
              </div>
              <div class="form-group col-4">
                <label for="d_last_name"><b>Last name: <span style="color: red;">*</span></b></label>
                <input class="form-control" type="text" name="d_last_name" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="d_gender"><b>Gender: <span style="color: red;">*</span></b></label>
                <select class="form-control" name="d_gender" required>
                  <option>Gender:</option>
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="d_doctor_id"><b>Doctor ID: <span style="color: red;">*</span></b></label>
                <input class="form-control" type="text" name="d_doctor_id" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="d_phone"><b>Phone: <span style="color: red;">*</span></b></label>
                <input class="form-control" type="text" name="d_phone" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-6">
                <label for="d_mail"><b>E-mail:</b></label>
                <input class="form-control" type="email" name="d_mail">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id="add_doctor_button_modal">Add</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-lg" id="editDoctorModal" tabindex="-1" role="dialog" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Edit Doctor</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="ed_first_name"><b>First name: <span style="color: red;">*</span></b></label>
                <input class="form-control" type="text" name="ed_first_name" required>
              </div>
              <div class="form-group col-4">
                <label for="ed_last_name"><b>Last name: <span style="color: red;">*</span></b></label>
                <input class="form-control" type="text" name="ed_last_name" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="ed_gender"><b>Gender: <span style="color: red;">*</span></b></label>
                <select class="form-control" name="ed_gender" required>
                  <option>Gender:</option>
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="ed_doctor_id"><b>Doctor ID: <span style="color: red;">*</span></b></label>
                <input class="form-control" type="text" name="ed_doctor_id" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="ed_phone"><b>Phone: <span style="color: red;">*</span></b></label>
                <input class="form-control" type="text" name="ed_phone" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-6">
                <label for="ed_mail"><b>E-mail:</b></label>
                <input class="form-control" type="email" name="ed_mail">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger mr-auto" type="button" id="ed_delete_doctor"><i class="fas fa-trash"></i> Delete doctor</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id="save_doctor_button_modal">Save changes</button>
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
          <a class="nav-link" href="doctors.php">Doctors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="patients.php">Patients <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="appointments.php">Check for appointments</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="pb-2 mt-3 mb-4 border-bottom">
      <h3>Doctors</h1>
    </div>
    <form method="get">
      <div class="form-row justify-content-between">
        <div class="form-group col-md-6 col-sm-6">
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
            </div>
            <input type="search" name="q" class="form-control mr-2" placeholder="Doctor ID:" id="doctor_id" autocomplete="off" value="<?php
            if(isset($_GET["q"])) {
              echo $_GET["q"];
            }
            ?>">
            <button type="submit" class="btn btn-dark" id="search_button"><i class="fas fa-search"></i> Search</button>
          </div>
        </div>
        <div class="form-group">
          <a class="btn btn-success ml-1" id="add_doctor_button" data-toggle="modal" data-target="#newDoctorModal" style="color: white !important;">
            <i class="fas fa-user-plus"></i> Add a doctor
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
                <option value="doctor_id">Doctor ID</option>
                <option value="phone">Phone</option>
                <option value="mail">Mail</option>
                <option value="gender">Gender</option>
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
      <thead>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Doctor ID</th>
        <th>Phone</th>
        <th>Mail</th>
      </thead>
      <tbody id="table_doctors_body">
        <?php
        if(isset($_GET["q"]) && !empty($_GET["q"])) {
          $q_id = $_GET["q"];

          $q = "SELECT * FROM doctors WHERE d_doctor_id=$q_id";
          $result = $conn->query($q);

          $br = 1;
          if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr id=\"row_{$row["d_id"]}\">";
              echo "<th>$br</td>";
              echo "<td>{$row["d_first_name"]}</td>";
              echo "<td>{$row["d_last_name"]}</td>";
              echo "<td>{$row["d_gender"]}</td>";
              echo "<td>{$row["d_doctor_id"]}</td>";
              echo "<td>{$row["d_phone"]}</td>";
              echo "<td>{$row["d_mail"]}</td>";
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
              $q = "SELECT * FROM doctors ORDER BY d_$column ASC";
            } else {
              $q = "SELECT * FROM doctors ORDER BY d_$column DESC";
            }

            $result = $conn->query($q);

            $br = 1;
            if($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr id=\"row_{$row["d_id"]}\">";
                echo "<th>$br</td>";
                echo "<td>{$row["d_first_name"]}</td>";
                echo "<td>{$row["d_last_name"]}</td>";
                echo "<td>{$row["d_gender"]}</td>";
                echo "<td>{$row["d_doctor_id"]}</td>";
                echo "<td>{$row["d_phone"]}</td>";
                echo "<td>{$row["d_mail"]}</td>";
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
                echo "<td>{$row["d_gender"]}</td>";
                echo "<td>{$row["d_doctor_id"]}</td>";
                echo "<td>{$row["d_phone"]}</td>";
                echo "<td>{$row["d_mail"]}</td>";
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
    <script src="js/doctors.js"></script>
</body>
</html>
