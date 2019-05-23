$(function () {

  $("#appointment_date").val(new Date().toISOString().substr(0, 10));

  $("#appointment_date").change(function () {
    var appointment_date = $("#appointment_date").val();

    $.post("php/appointments/check_appointments.php", {
      appointment_date: appointment_date,
    }, function (data) {
      $("#table_appointments_body").html(data);

      $(".completed").unbind();

      $(".completed").click(function () {
        var a_code_number = $(this).closest("tr").attr("id");

        $.post("php/appointments/delete_appointment.php", {
          a_code_number: a_code_number,
        }, function (data) {
          alert(data);

          location.reload();
        });
      });
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
});
