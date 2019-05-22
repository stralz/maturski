$(function () {
  var edit_doctor_id = null;

  $("#add_doctor_button_modal").click(function () {
    var obj = {};
    obj["first_name"] = $('input[name="d_first_name"]').val();
    obj["last_name"] = $('input[name="d_last_name"]').val();
    obj["doctor_id"] = $('input[name="d_doctor_id"]').val();
    obj["phone"] = $('input[name="d_phone"]').val();
    obj["mail"] = $('input[name="d_mail"]').val();
    obj["gender"] = $('select[name="d_gender"]').val();

    var prazno = false;
    for (var x in obj)
    if (obj[x] === "") prazno = true;

    if(prazno)
    alert("One of the fields is empty!");
    else {
      $.post("php/doctors/new_doctor.php", obj, function (data) {
        alert(data);

        location.reload();
      });
    }
  });

  $("tr").click(function () {
    $(this).attr("data-toggle", "modal");
    $(this).attr("data-target", "#editDoctorModal");

    var id = $(this).attr("id");
    id = id.substr(4, id.length);
    edit_doctor_id = id;

    $.post("php/doctors/get_doctors.php", {
      edit_doctor_id: id,
    }, function (data) {
      console.log(typeof(data));
      $('input[name="ed_first_name"]').val(data.d_first_name);
      $('input[name="ed_last_name"]').val(data.d_last_name);
      $('input[name="ed_doctor_id"]').val(data.d_doctor_id);
      $('input[name="ed_phone"]').val(data.d_phone);
      $('input[name="ed_mail"]').val(data.d_mail);
      $('select[name="ed_gender"]').val(data.d_gender);
    }, "json");
  });

  $("#ed_delete_doctor").click(function () {
    $.post("php/doctors/delete_doctor.php", {
      edit_doctor_id: edit_doctor_id,
    }, function () {
      alert("You successfully deleted the doctor!");

      location.reload();
    });
  });

  $("#save_doctor_button_modal").click(function () {
    var obj = {};
    obj["first_name"] = $('input[name="ed_first_name"]').val();
    obj["last_name"] = $('input[name="ed_last_name"]').val();
    obj["doctor_id"] = $('input[name="ed_doctor_id"]').val();
    obj["phone"] = $('input[name="ed_phone"]').val();
    obj["mail"] = $('input[name="ed_mail"]').val();
    obj["gender"] = $('select[name="ed_gender"]').val();

    var prazno = false;
    for (var x in obj)
    if (obj[x] === "") prazno = true;

    obj["edit_doctor_id"] = edit_doctor_id;

    if(prazno)
    alert("One of the fields is empty!");
    else {
      $.post("php/doctors/edit_doctor.php", obj, function () {
        alert("You successfully updated the doctor!");

        location.reload();
      });
    }
  });

  $("#clear_filter_button").click(function () {
    window.location = location.href.substring(0, location.href.indexOf('?'));
  });

  $("#results").unbind();
});
