<?php 

session_start();

    require_once "../../../connection.php";

    $keyword = $_POST['keyword'];

    if($_SESSION['Patient'] != 1){
        $getAllPatient = $conn -> query("SELECT * FROM tblpatient WHERE PatientNumber LIKE '%$keyword%' OR Lastname LIKE '%$keyword%' ORDER BY Lastname") -> fetchAll();
    }
    else{
        $PatientNumber = $_SESSION["username"];

        $getAllPatient = $conn -> query("SELECT * FROM tblpatient WHERE PatientNumber = '$PatientNumber'  ORDER BY Lastname") -> fetchAll();
    }
    

    

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
        <a onclick="init_view(<?php echo $patient['PatientNumber']; ?>)" title='View' class="cursor-pointer">
            <i class="fa fa-eye text-info"></i>
        </a>
    </td>
</tr>
<?php endforeach ?>