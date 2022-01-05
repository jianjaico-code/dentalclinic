<?php 
    
    require_once "../../../connection.php";

    $PatientId = $_POST['PatientId'];

    $getPatient = $conn -> query("SELECT * FROM tblpatient WHERE PatientId = '$PatientId'") -> fetch();

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
        <label class="pr-4">Description</label>&nbsp;
        <textarea type="text" required id="frm-Description-den" class="form-control"></textarea>
    </div>
</div>

<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Remarks</label>&nbsp;
        <textarea type="text" required id="frm-Remarks-den" class="form-control"></textarea>
    </div>

    <div class='col-6'>
    <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Dentist</label>&nbsp;
            <input type="text" id="frm-Dentist-den"  required class="form-control">
        </div>
    </div>
</div>
