<!-- The Modal -->
<form id="new-employee-form" class="text-start">
<div class="modal fade" id="employee-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Employee</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Employee ID</label>&nbsp;
                                <input required type="number" id="frm-employeeid" class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Position</label>&nbsp;
                                <select class="form-control" id="frm-position">
                                    <option value="Administrator">Administrator</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Employee Type</label>&nbsp;
                                <select class="form-control" id="frm-emptype">
                                    <option value="Regular">Regular</option>
                                    <option value="Part-Time">Part-Time</option>
                                    <option value="Training">Training</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-outline mb-3">
                                <label class="pr-4">Firstname</label>&nbsp;
                                <input type="text" id="frm-firstname"  required class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline mb-3">
                                <label class="pr-4">Middlename</label>&nbsp;
                                <input type="text" id="frm-middlename"  required class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline mb-3">
                                <label class="pr-4">Lastname</label>&nbsp;
                                <input type="text" id="frm-lastname"  required class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Address</label>&nbsp;
                                <input type="text" required id="frm-address" class="form-control">
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Base Pay</label>&nbsp;
                                <input type="number" step="any" min="0.1" required id="frm-basepay" class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Birthday</label>&nbsp;
                                <input type="date" required id="frm-birthday" class="form-control">
                            </div>
                        </div>
                    </div>

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Add Employee</button>
                <button type="button" class="btn btn-danger" onclick="$('#employee-add').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<!-- The Modal -->
<form id="edit-employee-form" class="text-start">
<div class="modal fade" id="employee-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Employee</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Employee ID</label>&nbsp;
                                <input disabled required type="number" id="frm-employeeid-edit" class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Position</label>&nbsp;
                                <select class="form-control" id="frm-position-edit">
                                    <option value="Administrator">Administrator</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Employee Type</label>&nbsp;
                                <select class="form-control" id="frm-emptype-edit">
                                    <option value="Regular">Regular</option>
                                    <option value="Part-Time">Part-Time</option>
                                    <option value="Training">Training</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-outline mb-3">
                                <label class="pr-4">Firstname</label>&nbsp;
                                <input type="text" id="frm-firstname-edit"  required class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline mb-3">
                                <label class="pr-4">Middlename</label>&nbsp;
                                <input type="text" id="frm-middlename-edit"  required class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline mb-3">
                                <label class="pr-4">Lastname</label>&nbsp;
                                <input type="text" id="frm-lastname-edit"  required class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Address</label>&nbsp;
                                <input type="text" required id="frm-address-edit" class="form-control">
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Base Pay</label>&nbsp;
                                <input type="number" step="any" min="0.1" required id="frm-basepay-edit" class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Birthday</label>&nbsp;
                                <input type="date" required id="frm-birthday-edit" class="form-control">
                            </div>
                        </div>
                    </div>

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Update Employee</button>
                <button type="button" class="btn btn-danger" onclick="$('#employee-edit').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<!-- The Modal -->
<form id="account-employee-form" class="text-start">
<div class="modal fade" id="employee-account">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">User Account</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                        <div class="col-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Username</label>&nbsp;
                                <input type="text" required id="frm-username" class="form-control">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Password</label>&nbsp;
                                <input type="password" required id="frm-password" class="form-control">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group input-group-outline">
                                <label class="pr-4">Confirm Passsword</label>&nbsp;<br>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group input-group-outline">
                
                                <input type="password" required id="frm-confirmpass" class="form-control">
                            </div>
                        </div>
                    </div>


                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Update Account</button>
                <button type="button" class="btn btn-danger" onclick="$('#employee-account').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<script>
    $(() => {
        $("#new-employee-form").submit((e) => {
            e.preventDefault();
            
            save_employee();
        });

        $("#edit-employee-form").submit((e) => {
            e.preventDefault();
            
            Swal.fire({
                text: "Are you sure to update this employee?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#D81B60',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if(result.isConfirmed) update_employee();
            })
        });

        $("#account-employee-form").submit((e) => {
            e.preventDefault();
            
            Swal.fire({
                text: "Are you sure to update this user account?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#D81B60',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if(result.isConfirmed) update_useraccount();
            })
        })
    })

</script>