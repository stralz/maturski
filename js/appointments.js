$(function () {
  $("#a_description").keyup(function () {
    var char_length = $(this).val().length;
    $("#char_counter").text(char_length);
  });

  $("#make_appointment_button").click(function () {
    var obj = {};

    obj["date"] = $("#a_date").val();
    obj["time"] = $("#a_time").val();
    obj["description"] = $("#a_description").val();
    obj["identification_number"] = $("#p_identification_number").val();
    obj["doctor_id"] = $("#doctor_id").val();

    var prazno = false;
    for (var x in obj)
    if (obj[x] === "") prazno = true;

    if(prazno)
      alert("One of the fields is empty!");
    else {
      $.post("php/appointments/new_appointment.php", obj, function (data) {
        alert(data);

        location.reload();
      });
    }
  });

  $("#complete_appointment_button").click(function () {
    var a_code_number = $("#a_code_number").val();

    $.post("php/appointments/delete_appointment.php", {
      a_code_number: a_code_number,
    }, function (data) {
      alert(data);

      location.reload();
    });
  });

  $(".completed").click(function () {
    var a_code_number = $(this).closest("tr").attr("id");

    $.post("php/appointments/delete_appointment.php", {
      a_code_number: a_code_number,
    }, function (data) {
      alert(data);

      location.reload();
    });
  });

  $("#table_doctors_body>tr").click(function () {
    var d_doctor_id = $("#" + $(this).attr("id") + ">.d_doctor_id").text();
    $("#doctor_id").val(d_doctor_id);
    $("#doctorDialogModal").modal('hide');
  });

  $("#table_patients_body>tr").click(function () {
    var p_identification_number = $("#" + $(this).attr("id") + ">.p_identification_number").text();

    $("#p_identification_number").val(p_identification_number);
    $("#patientDialogModal").modal('hide');
  });

});
