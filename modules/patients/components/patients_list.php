<?php 

    require_once "../../../connection.php";

    $keyword = $_POST['keyword'];

    $getAllPatient = $conn -> query("SELECT * FROM tblpatient WHERE PatientNumber LIKE '%$keyword%' OR Lastname LIKE '%$keyword%' ORDER BY Lastname") -> fetchAll();

    

?>


<?php foreach($getAllPatient as $patient): ?>
<tr>
    <td>
        <div class="d-flex px-3 py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo $patient['PatientNumber'] ?></php></h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo $patient['Lastname'] ?></php></h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo $patient['FirstName'] ?></php></h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo $patient['MiddleName'] ?></php></h6>
            </div>
        </div>
    </td>
    <td class="align-middle text-center text-sm">
        <span class="text-xs font-weight-bold"> <?php  $date = new DateTime($patient['Birthday']);
                                                $now = new DateTime();
                                                $interval = $now->diff($date);
                                                echo $interval->y;?></span>
    </td>
    <td>
        <a onclick="init_examination(<?php echo $patient['PatientID']; ?>)" title='Medical Examination' class="cursor-pointer">
            <i class="fa fa-list-alt text-info"></i>
        </a>
        <a onclick="init_examination_dental(<?php echo $patient['PatientID']; ?>)" title='Dental Examination' class="cursor-pointer">
            <i class="fa fa-hospital-o text-info"></i>
        </a>

        <a onclick="init_edit_patient(<?php echo $patient['PatientID']; ?>)" title='Edit' class="cursor-pointer">
            <i class="fa fa-edit text-warning"></i>
        </a>
    </td>
</tr>
<?php endforeach ?>