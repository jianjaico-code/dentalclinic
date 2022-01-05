<!-- The Modal -->
<form id="new-patient-form" class="text-start">
<div class="modal fade" id="patient-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Patient</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">

                    <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Patient Number</label>&nbsp;
                                <input disabled type="text" required id="frm-patientnumber" class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Patient Type</label>&nbsp;
                                <select class="form-control" id="frm-patienttype">
                                    <option value="Student">Student</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="pr-4">Birthday</label>&nbsp;
                                <input type="date" required id="frm-birthday" class="form-control">
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

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Add Patient</button>
                <button type="button" class="btn btn-danger" onclick="$('#patient-add').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<!-- The Modal -->
<form id="edit-patient-form" class="text-start">
<div class="modal fade" id="patient-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Patient</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body" id='patient-edit-body'>

                    

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Update Patient</button>
                <button type="button" class="btn btn-danger" onclick="$('#patient-edit').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<!-- The Modal -->
<form id="new-medical-form" class="text-start">
<div class="modal fade" id="medical-add">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Medical Examination</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body" id='medical-modal-body'>

                    

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Submit</button>
                <button type="button" class="btn btn-danger" onclick="$('#medical-add').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>


<!-- The Modal -->
<form id="new-dental-form" class="text-start">
<div class="modal fade" id="dental-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Dental Examination</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body" id='dental-modal-body'>

                    

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Submit</button>
                <button type="button" class="btn btn-danger" onclick="$('#dental-add').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<script>
    $("#new-patient-form").submit((e) => {
        e.preventDefault();
        
        add_patient();
    })

    $("#new-medical-form").submit((e) => {
        e.preventDefault();
        
        Swal.fire({
            text: "Are you sure to COMPLETE this Medical Examination?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#D81B60',
            cancelButtonColor: 'red',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if(result.isConfirmed) add_medical_exam();
        })
    })

    $("#new-dental-form").submit((e) => {
        e.preventDefault();
        
        Swal.fire({
            text: "Are you sure to COMPLETE this dental Examination?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#D81B60',
            cancelButtonColor: 'red',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if(result.isConfirmed) add_dental_exam();
        })
    })

    $("#edit-patient-form").submit((e) => {
        e.preventDefault();
        
        Swal.fire({
            text: "Are you sure to edit this patient?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#D81B60',
            cancelButtonColor: 'red',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if(result.isConfirmed) update_patient_details();
        })
    })
</script>