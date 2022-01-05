<?php 

    require_once "../../../connection.php";

    $PatientNumber = $_POST['PatientNumber'];

    $getMedicalList = $conn -> query("SELECT * FROM tblmedical_examination_summary WHERE PatientNumber = '$PatientNumber'") -> fetchAll();

?>

<?php foreach($getMedicalList as $list): ?>
<tr class="cursor-pointer" onclick="view_medical_form(<?php echo $list['MedicalExamID'] ?>, <?php echo $PatientNumber ?>)">
    <td>
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo date("F j, Y", strtotime($list['DateExamined'])) ?></php></h6>
            </div>
        </div>
    </td>
</tr>
<?php endforeach ?>