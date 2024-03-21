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
    <?php $this->load->view('header_top');
    $menu_id = $menu[0]['menu_id'];
   $role_id = $_SESSION['role_id'];
    // echo "<pre>";print_r($role_id);echo "</pre>";exit; 
        ?>
    <div id="layoutSidenav">
        <?php $this->load->view('sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-md mt-5">
                    <div class="card ">
                        <div class="card-body">
                            <div class="div d-flex">
                                <h2 style="color:green ;">Role & Permission Details</h2>
                                <button style="margin-left:auto" class="btn btn-secondary" onclick="window.location.href='<?php echo base_url('add') ?>'"
                                <?php if (!checkRolePermission($role_id, $menu_id, 'Create')) {
                                       echo "hidden";}?>
                                >ADD ROLE</button>
                           </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="card w-100">
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th class="col-1">Sr.No</th>
                                            <th class="col-3">Role Name</th>
                                            <th class="col-3">Options</th>
                                        </tr>
                                    </thead>
                                    <!-- tbody me role_t se role name aega and us id k liye permissions aega and role_t k count ka id  ka key aega  -->
                                    <tbody>
                                        <?php
                                       if ($arr != null) {
                                            foreach ($arr as $key => $array) : ?>
                                                <tr>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td><?php echo $array['role']; ?></td>
                                                    <td>
                                                        <button class="col-sm-3 btn  btn-info btn-sm editbutton " data-toggle="modal" data-target="#exampleModalLong" data-bs-toggle="modal" data-bs-target="#exampleModaladd" data-id="<?php echo $array['role_id'] ?>" onclick="window.location.href='<?php echo base_url('add/') . $array['role_id'] ?>'" 
                                                        <?php
                                                                                                                                                                                                                                                                                                                                                                if (!checkRolePermission($role_id, $menu_id, 'Update')) {
                                                                                                                                                                                                                                                                                                                                                                    echo "hidden";
                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                ?>>EDIT</button>
                                                        <button class="col-sm-4 btn  btn-danger btn-sm deletebutton edit-button" data-id="<?php echo $array['role_id'] ?>" <?php
                                                                                                                                                                            if (!checkRolePermission($role_id, $menu_id, 'Delete')) {
                                                                                                                                                                                echo "hidden";
                                                                                                                                                                            }
                                                                                                                                                                            ?>>Delete</button>
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
                    <!-- edit functionality here  -->
                    <!-- modal here -->
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
            $('.deletebutton').click(function() {
                var ID = $(this).data('id');
               $.ajax({
                    url: "<?php echo base_url('Role_c/deleteRole'); ?>",
                    type: "post",
                    data: {
                        'role_id': ID
                    },
                    success: function(res) {
                        // console.log(res)
                        window.location.href = '<?php echo base_url('role-management') ?>';
                    }
                });
            });
            // $('.editbutton').click(function(){
            //     var ID = $(this).data('id');
            //     alert(ID);
            //     $.ajax({
            //         url: "<?php echo base_url('Role_c/edit') ?>",
            //         type: "post",
            //         data: {
            //             'role_id': ID,
            //         },
            //         success: function(res){
            //                 // window.location.href = '<?php echo base_url('') ?>';
            //         }
           //     })
            // })
        });
    </script>
/body>
/html>