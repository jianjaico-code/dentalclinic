<?php 
    
    require_once "../../../connection.php";

    $PatientNumber = $_POST['PatientNumber'];
    $DentalExamID = $_POST['DentalExamID'];

    $getPatient = $conn -> query("SELECT * FROM tblpatient WHERE PatientNumber = '$PatientNumber'") -> fetch();


    $getMedicalList = $conn -> query("SELECT * FROM tbldental_examination_summary WHERE DentalExamID = '$DentalExamID'") -> fetch();

?>

<div class="row">
    <div class="col-4">
        <div class="input-group input-group-outline my-3">
            <label class="pr-4">Patient Number</label>&nbsp;
            <input disabled type="text" value='<?php echo $getPatient['PatientNumber'] ?>' required id="frm-patientnumber-den" class="form-control">
        </div>
    </div>

    <div class="col-6">
        <div class="input-group input-group-outline my-3">
            <label class="pr-4">Fullname</label>&nbsp;
            <input type="text" value='<?php echo $getPatient['FirstName'] ?> <?php echo strtoupper($getPatient['MiddleName'][0]).'.' ?> <?php echo $getPatient['Lastname'] ?>' disabled class="form-control">
        </div>
    </div>

    <div class="col-2">
        <div class="input-group input-group-outline my-3">
            <label class="pr-4">Age</label>&nbsp;
            <input type="text" value='<?php  $date = new DateTime($getPatient['Birthday']);
                                                $now = new DateTime();
                                                $interval = $now->diff($date);
                                                echo $interval->y;?>' disabled class="form-control">
        </div>
    </div>

    
</div>

<div class="row">
    <div class="col-12">
        <img style="height: 20rem; margin-left: 20%;" src='./assets/img/teeth.jpg'
    </div>
</div>

<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Description: </label>&nbsp;
        <b><?php echo $getMedicalList['Description'] ?></b>
    </div>
</div>

<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Remarks: </label>&nbsp;
        <b><?php echo $getMedicalList['Remarks'] ?></b>
    </div>

    <div class='col-6'>
    <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Dentist: </label>&nbsp;
            <b><?php echo $getMedicalList['Dentist'] ?></b>
        </div>
    </div>
</div>
