<!DOCTYPE html>
<html lang="en">
<!-- #region -->
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                            <h2 style="color:green ;">Add Role & Permission Details</h2>
                            <button type="button" class="btn btn-success" style="margin-left: auto;" onclick="window.location.href='<?php echo base_url('role-management')?>'">Back</button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="card w-100" style="background-color:azure">
                            <div class="card-body">
                                <div class="row">
                                    <form action="<?php echo base_url('addrole') ?>" method="post">
                                        <div class="form-group row">
                                            <div class="row align-items-baseline">
                                               <label for="addrole" class="col-sm-2 col-form-label" style="font-weight:700;font-size:xx-large">
                                                    <i class="fa-solid fa-id-card-clip"></i>
                                                    Add Role
                                                </label>
                                               <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="addrole" name="role" >
                                                </div>
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
                                                                <!-- make create update delete view ids -->
                                                                <?php
                                                                if ($features_data != null) {
                                                                    foreach ($features_data as $key => $array) :
                              
                                                                    ?>
                                                                        <tr>
                                                                           <td id="<?php echo $array['menu_id'] ?>"><?php echo $array['Menu_title']; ?></td>
                                                                           <td style="display: flex; justify-content: space-between;">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="Create" value="Create" name="permission[<?php echo $array['menu_id'] ?>][]" <?php if(isset($role_permissions[$array['menu_id']]['Create'])){ echo "checked";}?>>
                                                                                    <label class="form-check-label" for="Create">Create</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="Update" value="Update" name="permission[<?php echo $array['menu_id'] ?>][]" <?php if(isset($role_permissions[$array['menu_id']]['Update'])){ echo "checked";}?>>
                                                                                    <label class="form-check-label" for="Update">Update</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="View" value="View" name="permission[<?php echo $array['menu_id'] ?>][]" <?php if(isset($role_permissions[$array['menu_id']]['View'])){ echo "checked";}?>>
                                                                                    <label class="form-check-label" for="View">View</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="Delete" value="Delete" name="permission[<?php echo $array['menu_id'] ?>][]" <?php if(isset($role_permissions[$array['menu_id']]['Delete'])){ echo "checked";}?>>
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
                                           <button type="submit" id="save" style="margin:0 auto ; width:12em" class="btn btn-primary" disabled>Primary</button>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addrole').on('input', function() {
                if (isFilled()) {
                    $('#save').removeAttr('disabled');
               } else {
                    $('#save').prop('disabled', true);
                }
            });
       });
       function isFilled() {
                return ($('#addrole').val() !== "" );
            }
    </script>
</body>
</html>