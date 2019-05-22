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
    obj["identification_number"] = $("#patient_identification_id").val();
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
});
