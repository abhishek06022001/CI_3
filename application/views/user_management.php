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
                            <button style="margin-left: auto;" class="btn btn-lg btn-warning addemp " data-bs-toggle="modal" data-bs-target="#exampleModaladd" data-id="<?php echo $user_id ?>">Add User</button>
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
                                            <td><button class="col btn btn-dark btn-sm editbutton " data-toggle="modal" data-target="#exampleModalLong" data-bs-toggle="modal" data-bs-target="#viewmodal" data-id="<?php echo $array['user_id'] ?>">VIEW AND EDIT</button>
                                            </td>
                                            <td>
                                                <button class="col btn  btn-info btn editbutton " data-toggle="modal" data-target="#exampleModalLong" data-bs-toggle="modal" data-bs-target="#exampleModaladd" data-id="<?php echo $array['user_id'] ?>">EDIT</button>
                                                <button class="col btn  btn-danger btn deletebutton edit-button" data-id="<?php echo $array['user_id'] ?>">Delete</button>
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
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input  type="hidden" style="width: 100%;" name="user_id " id="user_id">
                                                <div class="form-group row  mb-2">
                                                    <form>
                                                        <div class="form-group row  mb-2">
                                                            <div class="row mb-4">
                                                                <label for="Name" class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col">
                                                                    <input type="text" style="width: 100%;" class="form-control" name="Name" id="Name" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm">
                                                                    <input type="text" style="width: 100%;" id="Email" name="Email" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label for="role_name" class="col-sm-3 col-form-label">Role Name</label>
                                                                <div class="col-sm">
                                                                    <!-- <input  style="width: 100%;" name="role_id " id="role_id"> -->
                                                                    <?php
                                                                    ?>
                                                                    <select name="role_name" id="role_name" class="form-control">
                                                                        <option value="" disabled selected>Select a Role</option>
                                                                    </select>
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
        $(document).ready(function() {
            $('.addemp').click(function() {
                $('#exampleModalLabel').html('ADD USER');
                $('#Name').val('');
                $('#Email').val('');
                $('#role_name').empty();
                $('#role_name').append(' <option value="" disabled selected> Please Select A Role </option>');
                $('#user_id').val('');
                $val = true;
            });
            //dropdown logic 
            $('#role_name').on('click', function() {
                if ($val) {
                    $.ajax({
                        url: "<?php echo base_url('User_c/get_roles'); ?>",
                        type: "post",
                        dataType: 'json',
                        success: function(res) {
                            $('#role_name').empty();
                            $('#role_name').append(' <option value="" disabled selected> Select A Role </option>');
                            $.each(res.role, function(index, role) {
                                $('#role_name').append('<option value="' + role.role_id + '">' + role.role + '</option>');
                            });
                        }
                    });
                };
                $val = false;
            });
            $('.addempsave').on('click', function() {
                var userid = $('#user_id').val();
                // alert(userid);
                var username = $('#Name').val();
                // alert(username);
              
                var Email = $('#Email').val();
                // alert(Email);
                var role_name = $('#role_name').val();
                // alert(role_name);
                let data = {
                    'username': username,
                    'Email': Email,
                    'role_id': role_name, // role id was 36 
                    'user_id': username
                }   
                // echo "<pre>";print_r(   $data);echo "</pre>";exit;

                // i am getting all the data here !
                    
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('User_c/add_user') ?>",
                    data: data,
                    success: function(response) {
                        console.log(response);
                        // window.location.href = "<?php echo base_url('User_c') ?>";
                    }
                });
            });
            $('.editbutton').click(function() {
                $('#exampleModalLabel').html('Edit Employee');
                var ID = $(this).data('id');
                // alert(ID);
                $.ajax({
                    url: "<?php echo base_url('User_c/get_data_by_id') ?>",
                    type: "post",
                    data: {
                        'ID': ID
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#user_id').val(res.user_arr.user_id);
                        $('#Name').val(res.user_arr.username);
                        $('#Email').val(res.user_arr.Email);
                        $('#role_id').val(res.roles_arr.role_id);
                        $roleval = res.roles_arr[0].role;
                        // $('#role_name').val(res.role_arr.role);
                        // $val = $('#role_name').val(res.role_arr.role);
                        // $('#role_name').empty();
                        // $('#role_name').append( $val );
                        $('#role_name').empty();
                        $('#role_name').append('<option value="' + res.roles_arr[0].role_id + '">'  + res.roles_arr[0].role + '</option>');
                        // $('#role_name').append('<option value="" disabled selected>' + roleval + '</option>');
                        $val = true;
                    }
                })
            });
        });
    </script>
</body>

</html>