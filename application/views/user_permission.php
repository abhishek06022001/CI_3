<!DOCTYPE html>
<html lang="en">
<style>
    .addfeature {
        font-family: Copperplate, Papyrus, fantasy;
        font-size: 30px;
        color: rgb(0, 00, 0);
    }
   .transparent-table {
        opacity: 0;
    }
</style>
<style>
    .transparent-table {
        opacity: 0;
    }
</style>
<?php $this->load->view('header'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('header_top'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-md mt-5">
                    <div class="card">
                        <div class="card-body d-flex">
                            <h2 style="color:green ;">Permission Details</h2>
                            <button type="button" class="btn btn-success" style="margin-left: auto;" onclick="window.location.href='<?php echo base_url('user-management') ?>'">Back</button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="card w-100" style="background-color:azure">
                            <div class="card-body">
                                <div class="row">
                                    <form action="<?php echo base_url('editpermisson') ?>" method="post">
                                        <div class="form-group row">
                                            <div class="row align-items-baseline">
                                               <input type="" id="hiddenRoleId" name="hiddenRoleId" value="<?php echo $user_id  ?>">
                                           </div>
                                            <div class="row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10">
                                                    <div class="row" style="padding:20px">
                                                        <table class="table table-hover table table-striped table-condensed table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="col-3" style="font-size:larger; font-weight:700">Feature Name</th>
                                                                    <th scope="col" class="col-10" style="font-size:larger; font-weight:700">Permission</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
<!--   -->
                                                                <?php
                                                                if ($features_data != null) {
                                                                    foreach ($features_data as $key => $array) :
                                                                ?>
                                                                        <tr>
                                                                           <td id="<?php echo $array['menu_id'] ?>"><?php echo $array['Menu_title']; ?></td>
                                                                            <td style="display: flex; justify-content: space-between;">
                                                                                <div class="form-check form-check-inline">
                                                                                    <!--  -->
                                                                                    <input class="form-check-input" type="checkbox" id="Create" value="Create" name="permission[<?php echo $array['menu_id'] ?>][]" 
                                                                                    <?php if(isset($user_perm[$array['menu_id']]['Create'])) {
                                                                                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                                                                                                     } ?>>
                                                                                    <label class="form-check-label" for="Create">Create</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="Update" value="Update" name="permission[<?php echo $array['menu_id'] ?>][]"
                                                                                    <?php if(isset($user_perm[$array['menu_id']]['Update'])) {
                                                                                                                                                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                                                                                                                                       } ?>>
                                                                                    <label class="form-check-label" for="Update">Update</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="View" value="View" name="permission[<?php echo $array['menu_id'] ?>][]" 
                                                                                    <?php if(isset($user_perm[$array['menu_id']]['View'])) {
                                                                                                                                                                                                                                                                                                 echo "checked";
                                                                                                                                                                                                                                                                                                  } ?>>
                                                                                    <label class="form-check-label" for="View">View</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="Delete" value="Delete" name="permission[<?php echo $array['menu_id'] ?>][]" 
                                                                                    <?php if(isset($user_perm[$array['menu_id']]['Delete'])) {
                                                                                                                                                                                                                                                                                                  echo "checked";
                                                                                                                                                                                                                                                                                                } ?>>
                                                                                    <label class="form-check-label" for="Delete">Delete</label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                <?php endforeach;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" id="save" style="margin:0 auto ; width:12em" class="btn btn-primary" disabled>Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php $this->load->view('footer_bottom'); ?>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
   <script>
            $(document).ready(function() {
                $('#addrole').on('input', function() {
                    if (isFilled()) {
                        $('#save').removeAttr('disabled');
                    } else {
                        $('#save').prop('disabled', true);
                    }
                });
                $('.form-check-input').on('change',function(){
                    $('#save').removeAttr('disabled');
                });
            });
            function isFilled() {
                return ($('#addrole').val() !== "");
            }
    </script>
</body>
/html>