//#region website
function logout(){
    alert("Logging Out")
}
//#endregion


//#region Modules
function load_home(){
    $(".main_page").load('modules/home/home.php')
}

function load_inventory(){
    $(".main_page").load('modules/inventory_mngt/inventory_mngt.php')
}

function load_patients(){
    $(".main_page").load('modules/patients/patients.php')
}

function load_admin(){
    $(".main_page").load('modules/admin/admin.php')
}

function load_med_rec(){
    $(".main_page").load('modules/medical_records/medical_records.php')
}

function load_pos(){
    $(".main_page").load('modules/pos/pos.php')
}
//#endregion