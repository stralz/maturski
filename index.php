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
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" width="80%" class="d-inline-block align-top" alt="">
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="doctors.php">Doctors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="patients.php">Patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="appointments.php">Check for appointments</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="pb-2 mt-3 mb-4 border-bottom">
      <h3>Check for appointments on a specific day</h1>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">
        <input class="form-control mb-2" type="date" id="appointment_date">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-bordered">
          <thead>
            <th>#</th>
            <th></th>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Time</th>
			<th>Description</th>
          </thead>
          <tbody id="table_appointments_body">
            <?php
              $today = date("Y-m-d");
              $q     = "SELECT a_id, a_date, a_time, a_description, d_id, d_first_name, d_last_name, p_id, p_first_name, p_last_name
              FROM doctors JOIN appointments USING (d_id) JOIN patients USING (p_id) WHERE a_date LIKE ('$today')";

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
				  echo "<td>{$row["a_description"]}</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr id=\"results\"><td>0 podataka nadjeno na danasnji dan.</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>
