<?php 
    
    require_once "../../../connection.php";

    $PatientId = $_POST['PatientId'];

    $getPatient = $conn -> query("SELECT * FROM tblpatient WHERE PatientId = '$PatientId'") -> fetch();

?>

<div class="row">
    <div class="col-4">
        <div class="input-group input-group-outline my-3">
            <label class="pr-4">Patient Number</label>&nbsp;
            <input disabled type="text" value="<?php echo $getPatient['PatientNumber'] ?>" required id="frm-patientnumber-edit" class="form-control">
        </div>
    </div>

    <script>
        $("#frm-patienttype-edit").val("<?php echo $getPatient['PatientType'] ?>");
    </script>

    <div class="col-4">
        <div class="input-group input-group-outline my-3">
            <label class="pr-4">Patient Type</label>&nbsp;
            <select class="form-control" id="frm-patienttype-edit">
                <option value="Student">Student</option>
                <option value="Staff">Staff</option>
            </select>
        </div>
    </div>

    <div class="col-4">
        <div class="input-group input-group-outline my-3">
            <label class="pr-4">Birthday</label>&nbsp;
            <input type="date" value="<?php echo $getPatient['Birthday'] ?>" required id="frm-birthday-edit" class="form-control">
        </div>
    </div>
</div>


<div class="row">
    <div class="col-4">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Firstname</label>&nbsp;
            <input type="text" value="<?php echo $getPatient['FirstName'] ?>" id="frm-firstname-edit"  required class="form-control">
        </div>
    </div>

    <div class="col-4">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Middlename</label>&nbsp;
            <input type="text" value="<?php echo $getPatient['MiddleName'] ?>" id="frm-middlename-edit"  required class="form-control">
        </div>
    </div>

    <div class="col-4">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Lastname</label>&nbsp;
            <input type="text" value="<?php echo $getPatient['Lastname'] ?>" id="frm-lastname-edit"  required class="form-control">
        </div>
    </div>
</div>


<div class="row">
    <div class="input-group input-group-outline my-3">
            <label class="pr-4">Address</label>&nbsp;
            <input type="text" value="<?php echo $getPatient['Address'] ?>" required id="frm-address-edit" class="form-control">
        </div>
</div>