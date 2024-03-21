<!DOCTYPE html>
<html lang="en">
<!-- #region -->
<style>
    .addfeature {
        font-family: Copperplate, Papyrus, fantasy;
        font-size: 30px;
        color: rgb(0, 00, 0);
    }
</style>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
<?php $this->load->view('header');

?>
<?php
$user_id = $_SESSION['user_id'];
?>

<body class="sb-nav-fixed">
    <?php $this->load->view('header_top'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-md mt-5">
                    <div class="card">
                        <div class="card-body d-flex">
                            <h2 style="color:green ;">User List</h2>
                            <button style="margin-left: auto;" class="btn btn-lg btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModaladd"  data-id="<?php echo $user_id ?>">Add User</button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <table id="datatablesSimple" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>User Name</th>
                                    <th>Role Name</th>
                                    <th>Email</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($joined != null) {
                                    foreach ($joined as $key => $array) : ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $array['username']; ?></td>
                                            <td><?php echo $array['role']; ?></td>
                                            <td><?php echo $array['Email']; ?></td>
                                            <td><button class="col-sm-3 btn  btn-info btn-sm editbutton " data-toggle="modal" data-target="#exampleModalLong" data-bs-toggle="modal" data-bs-target="#viewmodal" data-id="<?php echo $array['user_id'] ?>">VIEW</button>
                                            </td>
                                            <td>
                                                <button class="col-sm-3 btn  btn-info btn-sm editbutton " data-toggle="modal" data-target="#exampleModalLong" data-bs-toggle="modal" data-bs-target="#exampleModaladd" data-id="<?php echo $array['user_id'] ?>">EDIT</button>
                                                <button class="col-sm-4 btn  btn-danger btn-sm deletebutton edit-button" data-id="<?php echo $array['user_id'] ?>">Delete</button>
                                            </td>
                                        </tr>
                                <?php endforeach;
                                }
                                ?>
                                 <!-- ADD/EDIT MODAL HERE -->
                    <div class="modal fade" id="exampleModaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" style="width: 100%;" name="emp_t_id " id="emp_t_id">
                                    <div class="form-group row  mb-2">
                                        <div class="row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">User Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" style="width: 100%;" class="form-control" name="Name" id="Name" required>
                                            </div>
                                            <label for="staticEmail" class="col-sm-2 col-form-label">PhoneNumber</label>
                                            <div class="col-sm-4">
                                                <input type="number" style="width: 100%;" class="form-control" name="Phone" id="Phone" maxlength="10" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-4">
                                                <input type="text" style="width: 100%;" id="Email" name="Email" class="form-control" required>
                                            </div>
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
                                            <div class="col-sm-4">
                                                <select name="Type" id="Type" class="form-control">
                                                    <option value="" disabled selected>Select type</option>
                                                    <option value="0" id="option_part_time">PART TIME</option>
                                                    <option value="1" id="option_full_time">FULL TIME</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">DOB</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="DOB" id="DOB" class="form-control" required>
                                            </div>
                                            <label for="staticEmail" class="col-sm-2 col-form-label">DOJ</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="DOJ" id="DOJ" class="form-control" max="<?php echo date("Y-m-d"); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary addempsave" id="addemp">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <?php $this->load->view('footer_bottom'); ?>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
    <script>
        // the modal logic here !

    </script>
</body>

</html>