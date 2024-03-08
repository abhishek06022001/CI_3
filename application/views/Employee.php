<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('header'); ?>
<style>
    .modal-dialog {
        max-width: 800px;
        /* Set the desired width */
    }
</style>

<body class="sb-nav-fixed">
    <?php $this->load->view('header_top'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Employee</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url("Dashboard") ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employee Data</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="row ">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">

                                <div class="form-group row  mb-2">
                                    <div class="row">
                                        <button class="col-sm-2 btn btn-outline-danger btn-sm mb-3"> IMPORT</button>
                                        <div class="col-sm-8"></div>
                                        <!-- <button class="col-sm-2 btn btn-outline-primary btn-sm  mb-3 addemp" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD EMPLOYEE</button>
                                        -->
                                        <button type="button" class="col-sm-2 btn btn-outline-primary btn-sm  mb-3 addemp" data-bs-toggle="modal" data-bs-target="#exampleModaladd">
                                            ADD EMPLOYEE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-2"></div>
                            <div class="col-md-7" id="employeeList">
                                <?php foreach ($arr as $array) : ?>
                                    <?php if ($array['isdeleted'] == 0) : ?>
                                        <div class="form-group row  mb-2">

                                            <div class="row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" readonly style="width: 100%;" value="<?php echo $array['Name']; ?>" disabled>
                                                </div>
                                                <label for="staticEmail" class="col-sm-2 col-form-label">PhoneNumber</label>
                                                <div class="col-sm-4">
                                                    <input type="text" readonly style="width: 100%;" value="<?php echo $array['Phone']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
                                                <div class="col-sm-4">
                                                    <input type="text" readonly style="width: 100%;" value="<?php echo $array['ID']; ?>" disabled>
                                                </div> -->
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Place</label>
                                                <div class="col-sm-4">
                                                    <input type="text" readonly style="width: 100%;" value="<?php echo $array['Place']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-4">
                                                    <input type="text" readonly style="width: 100%;" value="<?php echo $array['Email']; ?>" disabled>
                                                </div>
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-4">
                                                    <input type="text" readonly style="width: 100%;" value="<?php echo $array['Type']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">DOB</label>
                                                <div class="col-sm-4">
                                                    <input type="date" id="dob" name="dob" value="<?php echo  $array['DOB']; ?>" disabled>
                                                </div>
                                                <label for="staticEmail" class="col-sm-2 col-form-label">DOJ</label>
                                                <div class="col-sm-4">
                                                    <input type="date" id="dob" name="doj" value="<?php echo  $array['DOJ']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button class="col-sm-2 btn btn-outline-danger btn-sm deletebutton"  data-id="<?php echo $array['emp_t_id'] ?>">Delete</button>
                                                <div class="col-sm-8"></div>
                                                <button class="col-sm-2 btn btn-outline-primary btn-sm editbutton " data-bs-toggle="modal" data-bs-target="#exampleModaledit" data-id="<?php echo $array['emp_t_id'] ?>">EDIT</button>
                                            </div>
                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row  mb-2">

                                            <div class="row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" style="width: 100%;" name="Name" id="Name" required>
                                                </div>
                                                <label for="staticEmail" class="col-sm-2 col-form-label">PhoneNumber</label>
                                                <div class="col-sm-4">
                                                    <input type="text" style="width: 100%;" name="Phone" id="Phone" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
                                                <div class="col-sm-4">
                                                    <input type="text" style="width: 100%;" name="ID" id="ID"required>
                                                </div> -->
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Place</label>
                                                <div class="col-sm-4">
                                                    <input type="text" style="width: 100%;" name="Place" id="Place" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-4">
                                                    <input type="text" style="width: 100%;" id="Email" name="Email"  required>
                                                </div>
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-4">
                                                    <input type="text" style="width: 100%;" name="Type" id="Type" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">DOB</label>
                                                <div class="col-sm-4">
                                                    <input type="date" id="dob" name="DOB" id="DOB" required>
                                                </div>
                                                <label for="staticEmail" class="col-sm-2 col-form-label">DOJ</label>
                                                <div class="col-sm-4">
                                                    <input type="date" id="dob" name="DOJ" id="DOJ" required>
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
                    </div>
            </main>
            <?php $this->load->view('footer_bottom'); ?>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <script>
        // write edit part here press edit and make it works here 
        // $(document).ready(function() {
        //     $('.editbutton').click(function() {
        //         var ID = $(this).data('id');
        //         $.ajax({
        //             url: "<?php echo base_url('Employee_c/getbyid'); ?>",
        //             type: "post",
        //             data: {
        //                 'ID': ID
        //             },
        //             success: function(res) {
        //                 //redirect to same page 
        //                 // alert(res);
        //                 console.log(res);
        //             }
        //         });
        //     });
        // });
        
          $(document).ready(function() {
            $('.deletebutton').click(function() {
                var ID = $(this).data('id');              
                $.ajax({
                    url: "<?php echo base_url('Employee_c/deleteEmployee'); ?>",
                    type: "post",
                    data: {
                        'ID': ID
                    },
                    success: function(res) {
                       
                        window.location.href ='<?php echo base_url('Employees')?>';
                    }
                });
            });

        });
        
        $(document).ready(function() {
            $('#addemp').click(function() {
              
                var Name = $('#Name').val();
                var Phone = $('#Phone').val();
                // var ID = $('#ID').val();
                var Place = $('#Place').val();
                var Email = $('#Email').val();
                var Type = $('#Type').val();
                var DOB = $('#DOB').val();
                var DOJ = $('#DOJ').val();
                 var data = {
                    'Name': Name,
                    'Phone': Phone,
                    // 'ID' : ID,
                    'Place': Place,
                    'Email': Email,
                    'Type': Type,
                    'DOB': DOB,
                    'DOJ': DOJ                
                };               
                $.ajax({
                 
                    type: 'POST',
                    url: "<?php echo base_url('Employee_c/addemployee')?>",
                    data: data,

                    success: function(response) {
                      window.location.href ='<?php echo base_url('Employees')?>';
                      // post data and get response yes posted 
                      // redirect to Employees and refresh and get data or get data dynamically here 
                    }
                    
                });
            });
        })
    </script>

</body>

</html>