<!DOCTYPE html>
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
        <div class="col-md-6">
          <form>
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
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                    </div>
                    <input type="search" name="q" class="form-control mr-2" placeholder="Patient ID Number:" id="patient_identification_id" autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="p_id">Doctor ID Number:</label>
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
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
          <table>
            <thead>
              <th></th>
              <!-- TODO: DODATI <TH>, I POSLE DODATI TOOLTIPS: (https://getbootstrap.com/docs/4.3/components/tooltips/) -->
              <!-- TODO: DODATI TOOLTIPS NA DOKTOR ID I PATIENT ID.                                                                                                     -->
            </thead>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/appointments.js"></script>
  </body>
 </html>
