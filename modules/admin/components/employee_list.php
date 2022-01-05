<?php 

    require_once "../../../connection.php";

    $keyword = $_POST['keyword'];

    $getAllEmployee = $conn -> query("SELECT * FROM tblemployee WHERE EmployeeIDNo LIKE '%$keyword%' OR Lastname LIKE '%$keyword%' ORDER BY Lastname") -> fetchAll();

    

?>


<?php foreach($getAllEmployee as $emp): ?>
<tr>
    <td>
        <div class="d-flex px-3 py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo $emp['EmployeeIDNo'] ?></php></h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo $emp['Lastname'] ?></php></h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo $emp['Name'] ?></php></h6>
            </div>
        </div>
    </td>
    <td>
        <div class="d-flex py-1">
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?php echo $emp['Middlename'] ?></php></h6>
            </div>
        </div>
    </td>
    <td>
        <a onclick="init_update_account(<?php echo $emp['EmployeeID']; ?>)" title='User Account' class="cursor-pointer">
            <i class="fa fa-user-plus text-info"></i>
        </a>

        <a onclick="init_edit_employee(<?php echo $emp['EmployeeID']; ?>)" title='Edit' class="cursor-pointer">
            <i class="fa fa-edit text-warning"></i>
        </a>
    </td>
</tr>
<?php endforeach ?>