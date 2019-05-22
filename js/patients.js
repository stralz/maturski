$(function () {
    var edit_patient_id = null;

    $("#add_patient_button_modal").click(function () {
        var obj = {};
        obj["first_name"] = $('input[name="p_first_name"]').val();
        obj["last_name"] = $('input[name="p_last_name"]').val();
        obj["gender"] = $('select[name="p_gender"]').val();
        obj["id_number"] = $('input[name="p_identification_number"]').val();
        obj["address"] = $('input[name="p_address"]').val();
        obj["phone"] = $('input[name="p_phone"]').val();
        obj["mail"] = $('input[name="p_mail"]').val();

        var prazno = false;
        for (var x in obj)
            if (obj[x] === "") prazno = true;

        if(prazno)
            alert("One of the fields is empty!");
        else {
            $.post("php/patients/new_patient.php", obj, function (data) {
                alert(data);

                location.reload();
            });
        }
    });

    $("tr").click(function () {
        $(this).attr("data-toggle", "modal");
        $(this).attr("data-target", "#editPatientModal");

        var id = $(this).attr("id");
        id = id.substr(4, id.length);
        edit_patient_id = id;

        $.post("php/patients/get_patients.php", {
            edit_patient_id: id,
        }, function (data) {
            console.log(typeof(data));
            $('input[name="ep_first_name"]').val(data.p_first_name);
            $('input[name="ep_last_name"]').val(data.p_last_name);
            $('select[name="ep_gender"]').val(data.p_gender);
            $('input[name="ep_identification_number"]').val(data.p_identification_number);
            $('input[name="ep_address"]').val(data.p_address);
            $('input[name="ep_phone"]').val(data.p_phone);
            $('input[name="ep_mail"]').val(data.p_mail);
        }, "json");
    });

    $("#ep_delete_patient").click(function () {
        $.post("php/patients/delete_patient.php", {
            edit_patient_id: edit_patient_id,
        }, function () {
            alert("You successfully deleted the patient!");

            location.reload();
        });
    });

    $("#save_patient_button_modal").click(function () {
        var obj = {};
        obj["first_name"] = $('input[name="ep_first_name"]').val();
        obj["last_name"] = $('input[name="ep_last_name"]').val();
        obj["gender"] = $('select[name="ep_gender"]').val();
        obj["id_number"] = $('input[name="ep_identification_number"]').val();
        obj["address"] = $('input[name="ep_address"]').val();
        obj["phone"] = $('input[name="ep_phone"]').val();
        obj["mail"] = $('input[name="ep_mail"]').val();

        var prazno = false;
        for (var x in obj)
            if (obj[x] === "") prazno = true;

        obj["edit_patient_id"] = edit_patient_id;

        if(prazno)
            alert("One of the fields is empty!");
        else {
            $.post("php/patients/edit_patient.php", obj, function () {
                alert("You successfully updated the patient!");

                location.reload();
            });
        }
    });

    $("#clear_filter_button").click(function () {
        window.location = location.href.substring(0, location.href.indexOf('?'));
    });

    $("#results").unbind();
});
