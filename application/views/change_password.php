<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('header'); ?>

<body class="sb-nav-fixed">
    <?php $this->load->view('header_top'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Change Password</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url("Dashboard") ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                    <div class="card mb-4">
                        <!-- make changes here in card below -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <!-- Check if error message flash data is set -->
                                    <?php if ($this->session->flashdata('error_message')) : ?>
                                        <!-- Display the error message -->
                                        <div class="alert alert-danger">
                                            <?php echo $this->session->flashdata('error_message'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <form method="post" id="changePasswordForm" action="<?php echo base_url("changed_password") ?>">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Old Password</label>
                                            <br>
                                            <input type="password" class="form-control" id="old_pass" placeholder="Old Password" name="old_password">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> New Password</label>
                                            <br>
                                            <input type="password" class="form-control" id="new_pass" placeholder="New Password" name="new_password">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Confirm Password</label>
                                            <br>
                                            <input type="password" class="form-control" id="new_pass1" placeholder="Retype new Password" name="confim_password">
                                        </div>
                                        <br>
                                        <button type="button" class="btn btn-primary" onclick="validatePassword()">Submit</button>
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
        function validatePassword() {

            var newPassword = document.getElementById("new_pass").value;
            var confirmPassword = document.getElementById("new_pass1").value;

            if (newPassword !== confirmPassword) {
                alert("New password and confirm password do not match!");
                return false;
            } else {
                // alert("123");
                //document.forms[0].submit();
                $('#changePasswordForm').submit();

            }
        }
    </script>
</body>

</html>