function load_inventory_list(key){
    $.ajax({
        type: "POST",
        url: "modules/pos/components/inventory_list.php",
        data: {
            keyword: key,
            InvoiceNumber: localStorage.InvoiceNumber
        },
        dataType: "html",
        success: function (response) {
            $("#inventory-tbody").html(response);

            load_cart();
        }
    });
}

function load_cart(){
    $.ajax({
        type: "POST",
        url: "modules/pos/components/cart_details.php",
        data: {
            InvoiceNumber: localStorage.InvoiceNumber
        },
        dataType: "html",
        success: function (response) {
            $("#carting-item").html(response);
        }
    });
}

function add_to_cart(MaterialID, Price, Quantity){
    $.ajax({
        type: "POST",
        url: "modules/pos/actions/add_to_cart.php",
        data: {
            InvoiceNumber: localStorage.InvoiceNumber,
            MaterialID: MaterialID,
            Price: Price,
            Quantity: Quantity
        },
        dataType: "html",
        success: function (response) {
            if(response == "success"){
                load_cart();
            }
            else if(response == 'qtyReached'){
                Swal.fire({
                    icon: 'error',
                    text: 'Not enough stocks!',
                })
        
            }
            console.log(response);
        }
    });
}

function init_remove_cart(TempCartID){
    let confirmle = confirm("Are you sure to remove this item?");

    if(confirmle){
        $.ajax({
            type: "POST",
            url: "modules/pos/actions/remove_from_cart.php",
            data: {
                TempCartID: TempCartID
            },
            dataType: "html",
            success: function (response) {
                if(response == "success"){
                    load_cart();
                }

                console.log(response);
            }
        });
    }
}

function init_pay(total){

    let amountPay = ($("#add-amount").val() != '') ? parseFloat($("#add-amount").val()) : 0;

    if(amountPay == 0 || total == 0){
        Swal.fire({
            icon: 'error',
            text: 'Please input an amount',
        })

        return false;
    }

    if(amountPay < total){
        Swal.fire({
            icon: 'error',
            text: 'Input amount must be GREATER than total!',
        })

        return false;
    }

    let amountChange = (amountPay - total);

    Swal.fire({
        text: "Are you sure to COMPLETE this transaction?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#D81B60',
        cancelButtonColor: 'red',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "modules/pos/actions/pay.php",
                data: {
                    InvoiceNumber: localStorage.InvoiceNumber,
                    AmountPaid: amountPay,
                    Remarks: $("#add-remarks").val(),
                    AmountChange: amountChange,
                    EmployeeID: localStorage.employeeid
                },
                dataType: "html",
                success: function (response) {
    
                    let change = (amountChange > 0) ? `YOUR CHANGE IS: ${amountChange.toFixed(2)}` : 'NO CHANGE';
    
                    Swal.fire({
                        icon: 'success',
                        title: change,
                        text: `OR NUMBER - #${response}`,
                        showDenyButton: true,
                        confirmButtonText: 'Print Receipt',
                        denyButtonText: `Okay`,
                        confirmButtonColor: '#D81B60',
                        denyButtonColor: '#1A73E8',
                    }).then((result2) => {

                        let ornum = response;
                        if (result2.isConfirmed) {
                            window.open(`print_receipt.php?ornumber=${ornum}&invoicenumber=${localStorage.InvoiceNumber}`, '_blank');
                        }

                        load_pos();
                    })
                }
            });
        }
    })
}