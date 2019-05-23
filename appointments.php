<!DOCTYPE html>
<?php
include 'php/dbh.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Index</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link rel="stylesheet" href="css/master.css">
</head>
<body>
  <div class="modal fade bd-example-modal-lg" id="doctorDialogModal" tabindex="-1" role="dialog" aria-labelledby="doctorDialogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Choose a Doctor</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-hover table-bordered">
            <thead>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Doctor ID</th>
              <th>Phone</th>
              <th>Mail</th>
              <th>Gender</th>
            </thead>
            <tbody id="table_doctors_body">
              <?php
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
                      echo "<td class=\"d_doctor_id\">{$row["d_doctor_id"]}</td>";
                      echo "<td>{$row["d_phone"]}</td>";
                      echo "<td>{$row["d_mail"]}</td>";
                      echo "</tr>";
                      $br++;
                    }
                  }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-lg" id="patientDialogModal" tabindex="-1" role="dialog" aria-labelledby="patientDialogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Choose a Patient</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-hover table-bordered">
            <thead>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>ID #</th>
              <th>Address</th>
            </thead>
            <tbody id="table_patients_body">
              <?php
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
                    echo "<td class=\"p_identification_number\">{$row["p_identification_number"]}</td>";
                    echo "<td>{$row["p_address"]}</td>";
                    echo "</tr>";
                    $br++;
                  }
                }
              ?>
            </tbody>
          </table>
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
        <li class="nav-item">
          <a class="nav-link" href="doctors.php">Doctors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="patients.php">Patients</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="appointments.php">Check for appointments <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="pb-2 mt-3 mb-4 border-bottom">
      <h3>Check for appointments</h1>
    </div>
    <div class="row">

    </div>
    <div class="row">
      <div class="col-md-6">
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="a_id">Appointment code number:</label>
              <input class="form-control" type="text" id="a_id" value="<?php
                $q = "SHOW TABLE STATUS FROM dental";
                $result = $conn->query($q);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  echo $row["Auto_increment"];
                }
              ?>" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="a_date">Date: </label>
              <input class="form-control" type="date" id="a_date">
            </div>
            <div class="form-group col-md-4">
              <label for="a_time">Hour: </label>
              <input class="form-control" type="time" id="a_time" value="08:00">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-10">
              <label for="a_description">Description: </label>
              <textarea class="form-control" rows="3" cols="80" maxlength="256" id="a_description"></textarea><small><span id="char_counter">0</span>/256 remaining</small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="p_id">Patient ID Number:</label>
              <div class="input-group mb-1">
                <div id="patient_dialog_button" class="input-group-prepend" data-toggle="modal" data-target="#patientDialogModal">
                  <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                </div>
                <input type="search" name="q" class="form-control mr-2" placeholder="Patient ID Number:" id="p_identification_number" autocomplete="off">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="p_id">Doctor ID Number:</label>
              <div class="input-group mb-1">
                <div id="doctor_dialog_button" class="input-group-prepend" data-toggle="modal" data-target="#doctorDialogModal">
                  <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                </div>
                <input type="search" name="q" class="form-control mr-2" placeholder="Doctor ID Number:" id="doctor_id" autocomplete="off">
              </div>
            </div>
          </div>
          <button class="btn btn-primary" type="button" id="make_appointment_button">Make an appointment</button>
        </form>
      </div>
      <div class="col-md-6">
        <div class="row mb-2">
          <div class="col-md-6">
            <input class="form-control" type="text" placeholder="Appointment code number:" id="a_code_number">
          </div>
          <div class="col-md-6">
            <button class="btn btn-info" id="complete_appointment_button">Done</button>
          </div>
        </div>
        <table class="table table-hover table-bordered">
          <thead>
            <th>#</th>
            <th></th>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Time</th>
            <!-- TODO: DODATI <TH>, I POSLE DODATI TOOLTIPS: (https://getbootstrap.com/docs/4.3/components/tooltips/) -->
            <!-- TODO: DODATI TOOLTIPS NA DOKTOR ID I PATIENT ID.                                                     -->
          </thead>
          <tbody>
            <?php
              $q = "SELECT a_id, a_date, a_time, d_id, d_first_name, d_last_name, p_id, p_first_name, p_last_name
              FROM doctors JOIN appointments USING (d_id) JOIN patients USING (p_id)";

              $result = $conn->query($q);
              if($result->num_rows > 0) {
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
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/appointments.js"></script>
</body>
</html>
