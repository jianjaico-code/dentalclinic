<?php
    require_once "../../../connection.php";

    $PatientNumber = $_POST['PatientNumber'];
    $MedicalExamID = $_POST['MedicalExamID'];

    $getPatient = $conn -> query("SELECT * FROM tblpatient WHERE PatientNumber = '$PatientNumber'") -> fetch();


    $getMedicalList = $conn -> query("SELECT * FROM tblmedical_examination_summary a INNER JOIN tblmedical_examination_details b ON a.MedicalExamID = b.MedicalExamID  WHERE a.MedicalExamID = '$MedicalExamID'") -> fetch();
?>


<div class="row">
    <div class="col-4">
        <div class="input-group input-group-outline my-3">
            <label class="pr-4">Patient Number</label>&nbsp;
            <input disabled type="text" value='<?php echo $getPatient['PatientNumber'] ?>' required id="frm-patientnumber-med" class="form-control">
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
    <div class="col-4">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Blood Type:</label>&nbsp;
            <b><?php echo $getMedicalList['BloodType'] ?></b>
        </div>
    </div>

    <div class="col-8">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Any Allergies:</label>&nbsp;
            <b><?php echo $getMedicalList['allergies'] ?></b>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">I have the history of:</label>&nbsp;
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Asthma: </label>&nbsp; &nbsp;
            <b><?php echo ($getMedicalList['asthma'] == 1) ? '✓' : 'X' ?></b>
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Kidney Infection: </label>&nbsp; &nbsp;
            <b><?php echo ($getMedicalList['kidneyInfection'] == 1) ? '✓' : 'X' ?></b>
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Urinary Tract Infection: </label>&nbsp; &nbsp;
            <b><?php echo ($getMedicalList['UTI'] == 1) ? '✓' : 'X' ?></b>
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Heart Disease: </label>&nbsp; &nbsp;
            <b><?php echo ($getMedicalList['heartDisease'] == 1) ? '✓' : 'X' ?></b>
        </div>
    </div>

    <div class="col-12">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Others please specify: </label>&nbsp;
            <b><?php echo $getMedicalList['others'] ?></b>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Common Medicine I usually take if I have,</label>&nbsp;
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Fever: </label>&nbsp;
            <b><?php echo $getMedicalList['MedFever'] ?></b>
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Cough: </label>&nbsp;
            <b><?php echo $getMedicalList['MedCough'] ?></b>
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Stomach ache: </label>&nbsp;
            <b><?php echo $getMedicalList['MedStomachAche'] ?></b>
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Colds: </label>&nbsp;
            <b><?php echo $getMedicalList['MedColds'] ?></b>
        </div>
    </div>
</div>


<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Other Illness and Medicine: </label>&nbsp;
        <b><?php echo $getMedicalList['OtherIllness'] ?></b>
    </div>
</div>

<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Is there any Maintenance that you intake: </label>&nbsp;
        <b><?php echo $getMedicalList['Maintenance'] ?></b>
    </div>
</div>

<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Complains: </label>&nbsp;
        <b><?php echo $getMedicalList['Complains'] ?></b>
    </div>
</div>