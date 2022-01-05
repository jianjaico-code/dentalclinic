<?php 

    // $getUnits = $conn -> query("SELECT * FROM tbl_units") -> fetchAll();

?>

<!-- The Modal -->
<form id="new-mat-form" class="text-start">
<div class="modal fade" id="invt-add">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Material</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">

                    <div class="input-group input-group-outline my-3">
                        <label class="pr-4">Material Code</label>&nbsp;
                        <input type="text" required id="frm-matcode" class="form-control">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                        <label class="pr-4">Description</label>&nbsp;
                        <input type="text" id="frm-matdesc"  required class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-outline mb-3">
                                
                                    <label class="pr-4">Price</label>&nbsp;

                                    <input type="number" min="0.1" step="any" id="frm-matprice"  required class="form-control">
                                    
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group input-group-outline mb-3">

                                <label class="pr-4">Max Stocks</label>&nbsp;
                            
                                <input type="number" min="0.1" step="any" id="frm-maxstock"  required class="form-control">
                            
                                
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                                
                                        <label>UoM for Selling</label>&nbsp;
                                        <br>
                                    
                                        <select id="frm-uomselling" class="form-control">
                                            <?php foreach($getUnits as $unit): ?>
                                            <option value="<?php echo $unit['UoM'] ?>">Per <?php echo $unit['Description'] ?></option>
                                            <?php endforeach ?>
                                        </select>

                                
                            </div>
                        </div>
                    </div> -->
                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Add Material</button>
                <button type="button" class="btn btn-danger" onclick="$('#invt-add').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<!-- The Modal -->
<form id="edit-mat-form" class="text-start">
<div class="modal fade" id="invt-edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Material</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <div class="input-group input-group-outline my-3">
                        <label class="pr-4">Material Code</label>&nbsp;
                        <input type="text" required id="frm-matcode-edit" disabled class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="pr-4">Description</label>&nbsp;
                        <input type="text" id="frm-matdesc-edit"  required class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="pr-4">Price</label>&nbsp;
                                <input type="number" min="0.1" step="any" id="frm-matprice-edit"  required class="form-control">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="pr-4">Max Stocks</label>&nbsp;
                                <input type="number" min="0.1" step="any" id="frm-maxstock-edit"  required class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                                
                                        <label>UoM for Selling</label>&nbsp;
                                        <br>
                                    
                                        <select id="frm-uomselling-edit" class="form-control">
                                            <?php foreach($getUnits as $unit): ?>
                                            <option value="<?php echo $unit['UoM'] ?>">Per <?php echo $unit['Description'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    

                                
                            </div>
                        </div>
                    </div> -->
                    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Update Material</button>
                <button type="button" class="btn btn-danger" onclick="$('#invt-edit').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<!-- The Modal -->
<form id="new-gr-form" class="text-start">
<div class="modal fade" id="invt-gr">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Goods Receive</h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="input-group input-group-outline my-3">
                    <label class="pr-4">Material Code</label>&nbsp;
                    <select required id="frm-getmatcode" class="form-control">
                        
                    </select>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="pr-4">Cost</label>&nbsp;
                            <input type="number" step="any" min="0.1" id="frm-matcost"  required class="form-control">
                        </div>
                    </div>  
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="pr-4">Quantity</label>&nbsp;
                            <input type="number" step="any" min="0.1" id="frm-matqty"  required class="form-control">
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-12">
                        <div class="input-group input-group-outline mb-3">
                            
                                    <label>UoM</label>&nbsp;
                                    <br>
                                
                                    <select id="frm-matuom" class="form-control">
                                        <?php foreach($getUnits as $unit): ?>
                                        <option value="<?php echo $unit['UoM'] ?>">Per <?php echo $unit['Description'] ?></option>
                                        <?php endforeach ?>
                                    </select>

                            
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Add GR</button>
                <button type="button" class="btn btn-danger" onclick="$('#invt-gr').modal('hide')">Close</button>
            </div>

        </div>
    </div>
</div>
</form>

<!-- The Modal -->
<div class="modal fade" id="invt-conversion">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Unit Conversion</h4>
                <button type="button" onclick='$("#add-conversion").attr("hidden", false);' class="btn btn-primary">Set</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
 
                <table id="conversion-table" class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th
                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                From Unit</th>
                            <th
                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                To Unit</th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                From Value</th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                To Value</th>
                            <th>
                                
                            </th>
                            <th>
                                
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody id="conversion-tbody">
                        <tr hidden id='add-conversion'>
                            <td>
                                <div class="input-group input-group-outline mb-3">
                                    <select id="frm-fromunit" class="form-control">
                                        <?php foreach($getUnits as $unit): ?>
                                        <option value="<?php echo $unit['UoM'] ?>">Per <?php echo $unit['Description'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="input-group input-group-outline mb-3">
                                <select id="frm-tounit" class="form-control">
                                    <?php foreach($getUnits as $unit): ?>
                                    <option value="<?php echo $unit['UoM'] ?>">Per <?php echo $unit['Description'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                </div>
                            </td>
                            <td>
                                <div class="input-group input-group-outline mb-3">
                                    <input disabled value='1' type="number" min="0.1" step="any" id="frm-fromvalue"  required class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="number" min="0.1" step="any" id="frm-tovalue"  required class="form-control">
                                </div>
                            </td>
                            <td>
                                <button type="button" onclick="check_conversion()" class="btn btn-primary">Save</button>
                            </td>
                            <td>
                                <button type="button" onclick='$("#add-conversion").attr("hidden", true)' class="btn btn-danger">Close</button>
                            </td>
                        </tr>

                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<script>
    $("#new-mat-form").submit((e) => {
        e.preventDefault();
    
        save_material();
    });

    $("#new-gr-form").submit((e) => {
        e.preventDefault();
        
        Swal.fire({
            text: "Are you sure to COMPLETE this transaction?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#D81B60',
            cancelButtonColor: 'red',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if(result.isConfirmed)
                save_gr();
        })
        
    });

    $("#edit-mat-form").submit((e) => {
        e.preventDefault();
        
        update_material();
    })
</script>