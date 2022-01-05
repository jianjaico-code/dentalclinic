$(() => {
    load_inventory_list('')
})

function load_inventory_list(key){
    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/components/inventory-list.php",
        data:{
            keyword: key
        },
        dataType: "html",
        success: function (response) {
            $("#inventory-tbody").html(response);

            init_stock_info();
        }
    });
}

function init_add_mat(){
    $("#invt-add").modal('show');
}

function save_material(){
    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/actions/add_material.php",
        data: {
            MaterialCode: $("#frm-matcode").val(),
            Desc: $("#frm-matdesc").val(),
            Price: $("#frm-matprice").val(),
            maxstock: $("#frm-maxstock").val(),
            uom: $("#frm-uomselling").val()
        },
        dataType: "html",
        success: function (response) {
            console.log(response)
            if(response == "success"){
                Swal.fire({
                    icon: 'success',
                    text: 'Successfully Added',
                })

                $("#new-mat-form").trigger('reset');
                load_inventory_list('');
            }
            else {
                Swal.fire({
                    icon: 'error',
                    text: 'Material Code already in the database',
                })
            }
        }
    });
}

function init_add_gr(){
    $("#invt-gr").modal('show');

    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/actions/get_materials.php",
        dataType: "html",
        success: function (response) {
            console.log(response)
            $("#frm-getmatcode").empty();
            if(response != '[]'){
                let data = JSON.parse(response);

                data.forEach(val => {
                    $("#frm-getmatcode").append(`<option value="${val.MaterialID}">${val.MaterialCode}</option>`);
                }); 
                
            }
        }
    });
}

function save_gr(){
    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/actions/add_gr.php",
        data: {
            MaterialID: $("#frm-getmatcode").val(),
            Cost: $("#frm-matcost").val(),
            Quantity: $("#frm-matqty").val(),
            EmployeeID: localStorage.employeeid,
            UoM: $("#frm-matuom").val()
        },
        dataType: "html",
        success: function (response) {
            console.log(response)
            if(response == "success"){
                $("#new-gr-form").trigger('reset');

                load_inventory_list('');
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

function init_stock_info(){
    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/components/stocks-info.php",
        dataType: "html",
        success: function (response) {
            $("#stocks-info").html(response);
        }
    });
}

function init_edit_material(MaterialID){
    localStorage.MaterialID = MaterialID;

    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/actions/get_material.php",
        data: {
            MaterialID: MaterialID
        },
        dataType: "html",
        success: function (response) {
            $("#invt-edit").modal('show');

            if(response){
                let data = JSON.parse(response);

                $("#frm-matcode-edit").val(data.MaterialCode)
                $("#frm-matdesc-edit").val(data.MaterialDescription)
                $("#frm-matprice-edit").val(data.price)
                $("#frm-maxstock-edit").val(data.maxstock)
                $("#frm-uomselling-edit").val(data.uomforselling)
            }
        }
    });
}

function update_material(){
    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/actions/update_material.php",
        data: {
            MaterialID: localStorage.MaterialID,
            MaterialDescription:  $("#frm-matdesc-edit").val(),
            price: $("#frm-matprice-edit").val(),
            maxstock: $("#frm-maxstock-edit").val(),
            uom: $("#frm-uomselling-edit").val()

        },
        dataType: "html",
        success: function (response) {
            if(response == "success"){
                Swal.fire({
                    icon: 'success',
                    text: 'Successfully Updated',
                })

                $("#invt-edit").modal('hide');

                load_inventory_list('');
            }

            console.log(response);
        }
    });
}

function init_delete_material(MaterialID){

    Swal.fire({
        title: "Are you sure to DELETE this material?",
        text: "Doing so will also delete accounting entries.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#D81B60',
        cancelButtonColor: 'red',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if(result.isConfirmed)
            delete_material(MaterialID);
    })


}

function delete_material(MaterialID){
    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/actions/delete_material.php",
        data: {MaterialID: MaterialID},
        dataType: "html",
        success: function (response) {

            console.log(response);
            if(response == "success") load_inventory_list('');
        }
    });
}

function init_conversion(){
    $("#invt-conversion").modal('show');

    get_conversions();
}

function check_conversion(){

    if($("#frm-fromvalue").val() == '' || $("#frm-tovalue").val() == ''){
        Swal.fire({
            icon: 'error',
            text: 'There is a blank input!',
        })

        return false
    }


    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/actions/check_conversion.php",
        data: {
            FromUnit: $("#frm-fromunit").val(),
            ToUnit: $("#frm-tounit").val()
        },
        dataType: "html",
        success: function (response) {
            console.log(response);
            if(response == 'notexist'){
                Swal.fire({
                    text: "There is no conversion like this, do you want to add?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#D81B60',
                    cancelButtonColor: 'red',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            type: "POST",
                            url: "modules/inventory_mngt/actions/add_conversion.php",
                            data: {
                                FromUnit: $("#frm-fromunit").val(),
                                ToUnit: $("#frm-tounit").val(),
                                FromValue: $("#frm-fromvalue").val(),
                                ToValue: $("#frm-tovalue").val(),
                            },
                            dataType: "html",
                            success: function (response) {
                                if(response == 'success'){
                                    Swal.fire({
                                        icon: 'success',
                                        text: 'Added Successfully',
                                    })

                                    get_conversions();
                                    $("#add-conversion").attr("hidden", true);
                                }
                            }
                        });
                    }
                });
            }
            else{
                Swal.fire({
                    text: "There is a conversion like this, do you want to update?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#D81B60',
                    cancelButtonColor: 'red',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            type: "POST",
                            url: "modules/inventory_mngt/actions/update_conversion.php",
                            data: {
                                FromUnit: $("#frm-fromunit").val(),
                                ToUnit: $("#frm-tounit").val(),
                                FromValue: $("#frm-fromvalue").val(),
                                ToValue: $("#frm-tovalue").val(),
                            },
                            dataType: "html",
                            success: function (response) {
                                if(response == 'success'){
                                    Swal.fire({
                                        icon: 'success',
                                        text: 'Updated Successfully',
                                    })

                                    get_conversions();
                                    $("#add-conversion").attr("hidden", true);
                                }
                            }
                        });
                    }
                });
            }
        }
    });
}

function get_conversions(){
    $.ajax({
        type: "POST",
        url: "modules/inventory_mngt/actions/get_conversions.php",
        dataType: "html",
        success: function (response) {
            if(response != '[]'){
                let data = JSON.parse(response);

                $(".view-conversion").remove()
                data.forEach(val => {
                    $("#add-conversion").after(`
                        <tr class='view-conversion'>
                            <td class="text-center">
                                ${val.FromDes}
                            </td>
                            <td class="text-center">
                                ${val.ToDes}
                            </td>
                            <td class="text-center">
                                ${parseFloat(val.FromValue).toFixed(2)}
                            </td>
                            <td class="text-center">
                                ${parseFloat(val.ToValue).toFixed(2)}
                            </td>
                            <td>
                            
                            </td>
                            <td>
                            
                            </td>
                        </tr>
                    `)
                })
            }
        }
    });
}