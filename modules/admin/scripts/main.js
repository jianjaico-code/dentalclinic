$(() => {
    console.log("Admin Settings Activated");

    load_all_employee('');
});


function load_all_employee(key){
    $.ajax({
        type: "POST",
        url: "modules/admin/components/employee_list.php",
        data: {
            keyword: key
        },
        dataType: "html",
        success: function (response) {
            $("#employee-tbody").html(response);
        }
    });
}


function init_add_employee(){
    $("#employee-add").modal('show');
}

function save_employee(){
    $.ajax({
        type: "POST",
        url: "modules/admin/actions/add_employee.php",
        data: {
            EmployeeIDNo: $("#frm-employeeid").val(),
            Name: $("#frm-firstname").val(),
            Middlename: $("#frm-middlename").val(),
            Lastname: $("#frm-lastname").val(),
            EmployeeType: $("#frm-emptype").val(),
            BasePay: $("#frm-basepay").val(),
            Position: $("#frm-position").val(),
            Address: $("#frm-address").val(),
            Birthday: $("#frm-birthday").val()
        },
        dataType: "html",
        success: function (response) {
            if(response == "success"){
                Swal.fire({
                    icon: 'success',
                    text: 'Successfully Added',
                })
                
                $("#new-employee-form").trigger('reset');

                $("#employee-add").modal('hide');

                load_all_employee('');
            }
            else {
                Swal.fire({
                    icon: 'error',
                    text: 'Employee ID already in the database',
                })
            }
        }
    });
}


function init_edit_employee(EmployeeID){
    $.ajax({
        type: "POST",
        url: "modules/admin/actions/get_emp_details.php",
        data: {
            EmployeeID: EmployeeID
        },
        dataType: "html",
        success: function (response) {
            if(response){
                let data = JSON.parse(response);

                $("#employee-edit").modal('show');

                $("#frm-employeeid-edit").val(data.EmployeeIDNo);
                $("#frm-firstname-edit").val(data.Name);
                $("#frm-middlename-edit").val(data.Middlename);
                $("#frm-lastname-edit").val(data.Lastname);
                $("#frm-emptype-edit").val(data.EmployeeType);
                $("#frm-basepay-edit").val(data.BasePay);
                $("#frm-position-edit").val(data.Position);
                $("#frm-address-edit").val(data.Address);
                $("#frm-birthday-edit").val(data.Birthday);
            }
        }
    });
}

function update_employee(){
    $.ajax({
        type: "POST",
        url: "modules/admin/actions/update_employee.php",
        data: {
            EmployeeIDNo: $("#frm-employeeid-edit").val(),
            Name: $("#frm-firstname-edit").val(),
            Middlename: $("#frm-middlename-edit").val(),
            Lastname: $("#frm-lastname-edit").val(),
            EmployeeType: $("#frm-emptype-edit").val(),
            BasePay: $("#frm-basepay-edit").val(),
            Position: $("#frm-position-edit").val(),
            Address: $("#frm-address-edit").val(),
            Birthday: $("#frm-birthday-edit").val(),
        },
        dataType: "html",
        success: function (response) {
            console.log(response)
            if(response == "success"){
                Swal.fire({
                    icon: 'success',
                    text: 'Successfully Updated',
                })
                
                $("#edit-employee-form").trigger('reset');

                $("#employee-edit").modal('hide');

                load_all_employee('')
            }
            else{
                Swal.fire({
                    icon: 'error',
                    text: 'Something went wrong!',
                })
            }
        }
    });
}

function init_update_account(EmployeeID){
    localStorage.accEmployeeID = EmployeeID;

    $.ajax({
        type: "POST",
        url: "modules/admin/actions/check_user.php",
        data: {
            EmployeeID: EmployeeID
        },
        dataType: "html",
        success: function (response) {
            if(response){
                let data = JSON.parse(response);

                $("#frm-username").val(data.UserName)
            }
        }
    });

    $("#employee-account").modal('show');
}

function update_useraccount(){
    if($("#frm-password").val() == $("#frm-confirmpass").val()){
        $.ajax({
            type: "POST",
            url: "modules/admin/actions/update_useraccount.php",
            data: {
                EmployeeID: localStorage.accEmployeeID,
                UserName: $("#frm-username").val(),
                Password: $("#frm-password").val()
            },
            dataType: "html",
            success: function (response) {
                console.log(response)
                if(response == "success"){
                    Swal.fire({
                        icon: 'success',
                        text: 'Updated Successfully!',
                    });

                    $("#account-employee-form").trigger('reset');

                    $("#employee-account").modal('hide');

                    load_all_employee('');
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        text: 'Uesrname already in used!',
                    })
                }
            }
        });
    }
    else{
        Swal.fire({
            icon: 'error',
            text: 'Password did not match!',
        })

        $("#frm-password").val('');
        $("#frm-confirmpass").val('');
    }
}