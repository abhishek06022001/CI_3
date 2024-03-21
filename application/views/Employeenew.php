<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('header'); ?>
<style>
    .modal-dialog {
        max-width: 800px;
    }
    .sb-nav-fixed #layoutSidenav #layoutSidenav_content {
        padding-left: 125px;
    }
    .hidden {
        display: none;
    }
</style>
<body class="sb-nav-fixed">
    <?php $this->load->view('header_top'); 
       $menu_id = $menu[0]['menu_id'];
       $role_id = $_SESSION['role_id'];
    ?>
    <div id="layoutSidenav">
        <?php $this->load->view('sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div id="layoutSidenav_content">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("home") ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md">
                                        <form action="<?php echo base_url('importdata') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <input type="file" name="import_file" class="form-control" />
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="submit" name="save_excel_data" value="import" class="btn btn-primary ">Import</button>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="<?php echo base_url('exportExcel') ?>" class="btn btn-primary">Export</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md">
                                        <div class="row">
                                            <div class="col-md d-flex">
                                                <form action="<?php echo base_url('Employees') ?>" method="POST" class="d-flex" id="typeSearch">
                                                    <input type="text" class="form-control searchbox" id="searchbox" name="searchbox" placeholder="Search">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default" type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                                            </svg><i class="bi bi-search"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-3 ">
                                                        <!-- name  is array key and value is the typeSearch value  -->
                                                        <select class="form-select typeSearch" name="typeSearch" aria-label="Default select example">
                                                            <option value=''>Select Type</option>
                                                            <option value="0" data-id="0" <?php if (isset($typeSearch) && $typeSearch == '0') {   echo 'selected'; } ?>>Part Time</option>
                                                            <option value="1" data-id="1" <?php if (isset($typeSearch) && $typeSearch == '1') {   echo 'selected';  } ?>>Full Time</option>
                                                        </select>
                                                    </div>
                                                </form>
                                                <button type="button" class="btn btn-dark  ms-3" name="resetbutton" id="resetbutton">Reset Search </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-success addemp" data-bs-toggle="modal" data-bs-target="#exampleModaladd" style="float: right;"
                                        <?php if (!checkRolePermission($role_id, $menu_id, 'Create')) {
                                       echo "hidden";}?>
                                        >Add Employee</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SR_NO</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>DOJ</th>
                                            <th>DOB</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($arr != null) {
                                            foreach ($arr as $key => $array) : ?>
                                                <tr>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td><?php echo $array['Name']; ?></td>
                                                    <td><?php echo $array['Phone']; ?></td>
                                                    <td><?php echo $array['Email']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($array['Type'] == '0') {
                                                            echo "PART TIME";
                                                        } else {
                                                            echo "FULL TIME";
                                                        }
                                                        ?></td>
                                                    <td><?php echo $array['DOJ']; ?></td>
                                                    <td><?php echo $array['DOB']; ?></td>
                                                    <td>
                                                        <button class="col-sm-3 btn  btn-info btn-sm editbutton " data-bs-toggle="modal" data-bs-target="#exampleModaladd" data-id="<?php echo $array['emp_t_id'] ?>"
                                                        <?php if (!checkRolePermission($role_id, $menu_id, 'Update')) {
                                       echo "hidden";}?>
                                                        >EDIT</button>
                                                        <button class="col-sm-4 btn  btn-danger btn-sm deletebutton edit-button" data-id="<?php echo $array['emp_t_id'] ?>"
                                                        <?php if (!checkRolePermission($role_id, $menu_id, 'Delete')) {
                                       echo "hidden";}?>
                                                        >Delete</button>
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
                    <!-- ADD/EDIT MODAL HERE -->
                    <div class="modal fade" id="exampleModaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" style="width: 100%;" name="emp_t_id " id="emp_t_id">
                                    <div class="form-group row  mb-2">
                                        <div class="row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
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
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </main>
            <?php $this->load->view('footer_bottom'); ?>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // edit button click pe open hoega ye 
            $('.editbutton').click(function() {
                $('#exampleModalLabel').html('Edit Employee');
                var ID = $(this).data('id');
                $.ajax({
                    url: "<?php echo base_url('Employee_c/getbyid'); ?>",
                    type: "post",
                    data: {
                        'ID': ID
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        $('#emp_t_id ').val(res.emp_t_id);
                        $('#Name').val(res.Name);
                        $('#Phone').val(res.Phone);
                        $('#Email').val(res.Email);
                        var typeValue = res.Type;
                        if (typeValue == '0') {
                            typeValue = "option_part_time";
                        } else {
                            typeValue = "option_full_time";
                        }
                        $('#Type option').removeAttr('selected');
                        $('#Type option[id="' + typeValue + '"]').prop('selected', true);
                        $('#DOB').val(res.DOB);
                        $('#DOJ').val(res.DOJ);
                    }
                })
            });
            $('.addemp').click(function() {
                $('#exampleModalLabel').html('Add Employee');
                $('#emp_t_id').val('');
                $('#Name').val('');
                $('#Phone').val('');
                $('#Email').val('');
                $('#Type').val('');
                $('#DOB').val('');
                $('#DOJ').val('');
            });
            $('.deletebutton').click(function() {
                var ID = $(this).data('id');
                $.ajax({
                    url: "<?php echo base_url('Employee_c/deleteEmployee'); ?>",
                    type: "post",
                    data: {
                        'ID': ID
                    },
                    success: function(res) {
                        window.location.href = '<?php echo base_url('empnew') ?>';
                    }
                });
            });
            $('#resetbutton').click(function(){
                $.ajax({
                    url: "<?php echo base_url('Employee_c'); ?>",
                    type: "get",
                    success: function(res) {
                        window.location.href = '<?php echo base_url('Employees') ?>';
                    }
                });
            });
            $('#addemp').click(function() {
                var Name = $('#Name').val();
                var Phone = $('#Phone').val();
                var emp_t_id = $('#emp_t_id').val();
                var Email = $('#Email').val();
                var Type = $('#Type').val();
                var DOB = $('#DOB').val();
                var DOJ = $('#DOJ').val();
                if (Name.trim() === '' || Phone.trim() === '' || Email.trim() === '' || DOB.trim() === '' || DOJ.trim() === '') {
                    alert('Please fill in all details');
                    return;
                }
                if (isNaN(Phone) || Phone.length !== 10) {
                    alert('Invalid phone number');
                    return;
                }
                if (!isEmail(Email)) {
                    alert('Invalid email address');
                    return;
                }
                var fakeDOB = new Date(DOB);
                var today = new Date();
                var age = Math.floor((today - fakeDOB) / (365 * 24 * 60 * 60 * 1000));
                if (age < 18) {
                    alert("Age is less than 18 ");
                    return;
                }
                var data = {
                    'Name': Name,
                    'Phone': Phone,
                    'emp_t_id': emp_t_id,
                    // 'Place': Place,
                    'Email': Email,
                    'Type': Type,
                    'DOB': DOB,
                    'DOJ': DOJ
                };
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('Employee_c/addemployee') ?>",
                    data: data,
                    success: function(response) {
                        console.log(response);
                        window.location.href = '<?php echo base_url('Employees') ?>';
                    }
                });
            });
        });
        var form = document.getElementById("typeSearch");
        var searchform = document.getElementById("searchbox");
        document.getElementById("typeSearch").addEventListener("change", function() {
            form.submit();
        });
        $('#searchbox').on('blur', function() {
            // debugger;
            event.preventDefault();
            var search = $('#searchbox').val();
            // alert(search);    
            var data = {
                'search': search,
            };
            console.log(data);
            searchform.submit();
        });
        // $.ajax({
        //         type: 'POST',
        //         url: "<?php echo base_url('Employee_c') ?>",      
        //         data:data,       
        //         success: function(response) {
        //             form.submit();        
        //         }
        //     });
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
    </script>
</body>
</html>