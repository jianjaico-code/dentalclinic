$(() => {
    load_all_patients_medrec('');
})


function load_all_patients_medrec(key){
    $.ajax({
        type: "POST",
        url: "modules/medical_records/components/patients_list.php",
        data: {
            keyword: key,
        },
        dataType: "html",
        success: function (response) {
            $("#patient-tbody-medrec").html(response);

            
        }
    });
}

function init_view(PatientNumber){

    
    $.ajax({
        type: "POST",
        url: "modules/medical_records/components/medical_list.php",
        data: {
            PatientNumber: PatientNumber
        },
        dataType: "html",
        success: function (response) {
            $("#summary-tbody-medrec-medical").html(response);
        }
    });

    $.ajax({
        type: "POST",
        url: "modules/medical_records/components/dental_list.php",
        data: {
            PatientNumber: PatientNumber
        },
        dataType: "html",
        success: function (response) {
            $("#summary-tbody-medrec-dental").html(response);
        }
    });

    $("#medical-view-summary").modal('show');
}

function view_medical_form(MedicalExamID, PatientNumber){
    $.ajax({
        type: "POST",
        url: "modules/medical_records/components/medical_view.php",
        data: {
            MedicalExamID: MedicalExamID,
            PatientNumber: PatientNumber,
        },
        dataType: "html",
        success: function (response) {
            

            

            $("#medical-view").modal('show');

            $("#medicalview-modal-body").html(response);
        }
    });
}

function view_dental_form(DentalExamID, PatientNumber){
    $.ajax({
        type: "POST",
        url: "modules/medical_records/components/dental_view.php",
        data: {
            DentalExamID: DentalExamID,
            PatientNumber: PatientNumber,
        },
        dataType: "html",
        success: function (response) {
            

            

            $("#dental-view").modal('show');

            $("#dentalview-modal-body").html(response);
        }
    });
}