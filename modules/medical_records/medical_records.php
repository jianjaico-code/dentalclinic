<?php 
    include_once "../../connection.php";
?>

<div class="col-lg-12 col-md-12 mb-md-0 mb-4">
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Medical Records</h6>
                    <p class="text-sm mb-0" id="stocks-info">

                    </p>
                </div>
                
                
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive">
            <div style="margin-left: 2%;" class="input-group input-group-outline w-30">
                <input type="text" step="any" min="0.1" id="srch-mat" placeholder="Search Patient Number" class="form-control">
            </div>
                <table id="patient-table" class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Patient Number</th>
                            <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Lastname</th>
                            <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Firstname</th>
                            <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Middlename</th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Age</th>

                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody id="patient-tbody-medrec">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="medical-view-summary">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-6">
                    Medical Examination
                        <table id="patient-table" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Examined</th>

                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody id="summary-tbody-medrec-medical">

                            </tbody>
                        </table>  
                    </div>

                    
                    <div class="col-6">
                    Dental Examination
                        <table id="patient-table" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Examined</th>

                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody id="summary-tbody-medrec-dental">

                            </tbody>
                        </table>  
                    </div>
                </div>
                

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            

        </div>
    </div>
</div>

<div class="modal fade" id="medical-view">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Medical Examination</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body" id='medicalview-modal-body'>

                    

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            
                <button type="button" class="btn btn-danger" onclick="$('#medical-view').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="dental-view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Dental Examination</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body" id='dentalview-modal-body'>

                    

                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            
                <button type="button" class="btn btn-danger" onclick="$('#dental-view').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
<script src="modules/medical_records/scripts/main.js"></script>
<script>

$("#srch-mat").on("keydown",function search(e) {
    if(e.keyCode == 13) {
        load_all_patients_medrec($("#srch-mat").val())
    }
});
</script>