<?php 
    include_once "../../connection.php";
?>

<div class="col-lg-12 col-md-12 mb-md-0 mb-4">
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Patients</h6>
                    <p class="text-sm mb-0" id="stocks-info">

                    </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                    <div class="dropdown float-lg-end pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                            aria-labelledby="dropdownTable">
                            <li><a class="dropdown-item border-radius-md" onclick="init_add_patient()">Add Patients</a>
                            </li>

                        </ul>
                    </div>
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
                    <tbody id="patient-tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once "components/patients_modal.php" ?>
<script src="modules/patients/scripts/main.js"></script>
<script>

$("#srch-mat").on("keydown",function search(e) {
    if(e.keyCode == 13) {
        load_all_patients($("#srch-mat").val())
    }
});
</script>