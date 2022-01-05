<?php 
    
    require_once "../../../connection.php";

    $PatientId = $_POST['PatientId'];

    $getPatient = $conn -> query("SELECT * FROM tblpatient WHERE PatientId = '$PatientId'") -> fetch();

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
            <label class="pr-4">Blood Type</label>&nbsp;
            <select id='frm-BloodType-med' class="form-control">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                
            </select>
        </div>
    </div>

    <div class="col-8">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Any Allergies:</label>&nbsp;
            <textarea id="frm-allergies-med"  required class="form-control" ></textarea>
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
            <label class="pr-4">Asthma</label>&nbsp; &nbsp;
            <input type="checkbox" id="frm-asthma-med"  >
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Kidney Infection</label>&nbsp; &nbsp;
            <input type="checkbox" id="frm-kidneyInfection-med" ">
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Urinary Tract Infection</label>&nbsp; &nbsp;
            <input type="checkbox" id="frm-UTI-med" ">
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Heart Disease</label>&nbsp; &nbsp;
            <input type="checkbox" id="frm-heartDisease-med" ">
        </div>
    </div>

    <div class="col-12">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Others please specify</label>&nbsp;
            <input type="text" id="frm-others-med" class='form-control' required">
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
            <label class="pr-4">Fever</label>&nbsp;
            <input type="text" id="frm-MedFever-med"  required class="form-control">
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Cough</label>&nbsp;
            <input type="text" id="frm-MedCough-med"  required class="form-control">
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Stomach ache</label>&nbsp;
            <input type="text" id="frm-MedStomachAche-med"  required class="form-control">
        </div>
    </div>

    <div class="col-3">
        <div class="input-group input-group-outline mb-3">
            <label class="pr-4">Colds</label>&nbsp;
            <input type="text" id="frm-MedColds-med"  required class="form-control">
        </div>
    </div>
</div>


<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Other Illness and Medicine</label>&nbsp;
        <textarea type="text" required id="frm-OtherIllness-med" class="form-control"></textarea>
    </div>
</div>

<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Is there any Maintenance that you intake</label>&nbsp;
        <textarea type="text" required id="frm-Maintenance-med" class="form-control"></textarea>
    </div>
</div>

<div class="row">
    <div class="input-group input-group-outline my-3">
        <label class="pr-4">Complains</label>&nbsp;
        <textarea type="text" required id="frm-Complains-med" class="form-control"></textarea>
    </div>
</div>