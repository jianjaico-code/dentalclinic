$(() => {
    load_all_patients('');
})

function init_add_patient(){

    $("#patient-add").modal('show')

    $("#frm-patientnumber").val(Date.now())
}

function load_all_patients(key){
    $.ajax({
        type: "POST",
        url: "modules/patients/components/patients_list.php",
        data: {
            keyword: key,
        },
        dataType: "html",
        success: function (response) {
            $("#patient-tbody").html(response);

            
        }
    });
}

function add_patient(){
    $.ajax({
        type: "POST",
        url: "modules/patients/actions/add_patient.php",
        data: {
            PatientNumber: $("#frm-patientnumber").val(),
            PatientType: $("#frm-patienttype").val(),
            Birthday: $("#frm-birthday").val(),
            FirstName: $("#frm-firstname").val(),
            MiddleName: $("#frm-middlename").val(),
            Lastname: $("#frm-lastname").val(),
            Address: $("#frm-address").val(),
        },
        dataType: "html",
        success: function (response) {
            console.log(response)
            if(response == "success"){
                Swal.fire({
                    icon: 'success',
                    text: 'Successfully Added!',
                });

                $("#new-patient-form").trigger('reset');

                $("#patient-add").modal('hide');

                load_all_patients('')
            }
            else if(response == 'patientexist'){
                Swal.fire({
                    icon: 'error',
                    text: 'Patient already existed!',
                })
            }
            else {
                Swal.fire({
                    icon: 'error',
                    text: 'Something went wrong!',
                })
            }
        }
    });
}

function init_examination(PatientId){
    $.ajax({
        type: "POST",
        url: "modules/patients/components/patient_medical_exam.php",
        data: {
            PatientId: PatientId
        },
        dataType: "html",
        success: function (response) {
            $("#medical-add").modal('show');

            $("#medical-modal-body").html(response);
        }
    });
    
}

function init_examination_dental(PatientId){
    $.ajax({
        type: "POST",
        url: "modules/patients/components/patient_dental_exam.php",
        data: {
            PatientId: PatientId
        },
        dataType: "html",
        success: function (response) {
            $("#dental-add").modal('show');

            $("#dental-modal-body").html(response);
        }
    });
    
}

function init_edit_patient(PatientId){
    $.ajax({
        type: "POST",
        url: "modules/patients/components/patient_edit.php",
        data: {
            PatientId: PatientId
        },
        dataType: "html",
        success: function (response) {
            $("#patient-edit").modal('show');

            $("#patient-edit-body").html(response);
        }
    });
    
}

function add_medical_exam(){
    $.ajax({
        type: "POST",
        url: "modules/patients/actions/add_medical_examination.php",
        data: {
            PatientNumber: $("#frm-patientnumber-med").val(),
            BloodType: $("#frm-BloodType-med").val(),
            allergies: $("#frm-allergies-med").val(),
            asthma: ($("#frm-asthma-med").is(':checked')) ? 1: 0,
            kidneyInfection: ($("#frm-kidneyInfection-med").is(':checked')) ? 1: 0,
            UTI: ($("#frm-UTI-med").is(':checked')) ? 1: 0,
            heartDisease: ($("#frm-heartDisease-med").is(':checked')) ? 1: 0,
            others: $("#frm-others-med").val(),
            MedFever: $("#frm-MedFever-med").val(),
            MedCough: $("#frm-MedCough-med").val(),
            MedStomachAche: $("#frm-MedStomachAche-med").val(),
            MedColds: $("#frm-MedColds-med").val(),
            OtherIllness: $("#frm-OtherIllness-med").val(),
            Maintenance: $("#frm-Maintenance-med").val(),
            Complains: $("#frm-Complains-med").val()
        },
        dataType: "html",
        success: function (response) {
            console.log(response);
            if(response == 'success'){
                Swal.fire({
                    icon: 'success',
                    text: 'Successfully Added!',
                });

                $("#new-medical-form").trigger('reset');

                $("#medical-add").modal('hide');
            }
            else if(response == 'dateExisted'){
                Swal.fire({
                    icon: 'error',
                    text: 'This Patient is already examined today!',
                })
            }
            else {
                Swal.fire({
                    icon: 'error',
                    text: 'Something went wrong!',
                })
            }
        }
    });
}

function add_dental_exam(){
    $.ajax({
        type: "POST",
        url: "modules/patients/actions/add_dental_examination.php",
        data: {
            PatientNumber: $("#frm-patientnumber-den").val(),
            Description: $("#frm-Description-den").val(),
            Remarks: $("#frm-Remarks-den").val(),
            Dentist: $("#frm-Dentist-den").val()
        },
        dataType: "html",
        success: function (response) {
            console.log(response);
            if(response == 'success'){
                Swal.fire({
                    icon: 'success',
                    text: 'Successfully Added!',
                });

                $("#new-dental-form").trigger('reset');

                $("#dental-add").modal('hide');
            }
            else if(response == 'dateExisted'){
                Swal.fire({
                    icon: 'error',
                    text: 'This Patient is already have a dental examination today!',
                })
            }
            else {
                Swal.fire({
                    icon: 'error',
                    text: 'Something went wrong!',
                })
            }
        }
    });
}

function update_patient_details(){
    $.ajax({
        type: "POST",
        url: "modules/patients/actions/update_patient.php",
        data: {
            PatientNumber: $("#frm-patientnumber-edit").val(),
            PatientType: $("#frm-patienttype-edit").val(),
            FirstName: $("#frm-firstname-edit").val(),
            MiddleName: $("#frm-middlename-edit").val(),
            Lastname: $("#frm-lastname-edit").val(),
            Birthday: $("#frm-birthday-edit").val(),
            Address: $("#frm-address-edit").val()
        },
        dataType: "html",
        success: function (response) {
            console.log(response);
            if(response == 'success'){
                Swal.fire({
                    icon: 'success',
                    text: 'Successfully Updated!',
                });

                $("#patient-edit").modal('hide');

                load_all_patients('');
            }
            else {
                Swal.fire({
                    icon: 'error',
                    text: 'Something went wrong!',
                })
            }
        }
    });
}