<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="layout\css\styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .picture-container {
            position: relative;
            cursor: pointer;
            text-align: center;
        }

        .picture {
            width: 106px;
            height: 106px;
            background-color: #999999;
            border: 4px solid #CCCCCC;
            color: #FFFFFF;
            border-radius: 50%;
            margin: 0px auto;
            overflow: hidden;
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .picture:hover {
            border-color: #2ca8ff;
        }

        .content.ct-wizard-green .picture:hover {
            border-color: #05ae0e;
        }

        .content.ct-wizard-blue .picture:hover {
            border-color: #3472f7;
        }

        .content.ct-wizard-orange .picture:hover {
            border-color: #ff9500;
        }

        .content.ct-wizard-red .picture:hover {
            border-color: #ff3b30;
        }

        .picture input[type="file"] {
            cursor: pointer;
            display: block;
            height: 100%;
            left: 0;
            opacity: 0 !important;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .picture-src {
            width: 100%;

        }

        .stayle {
            border: 2px solid black;

        }
    </style>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="parent ">
            <?php include 'header.php' ?>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <?php include 'sidebar.php' ?>
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:</div>
                            Start Bootstrap.
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <!-- Check if error message flash data is set -->
                            <?php if ($this->session->flashdata('error_message')): ?>
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
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> New Password</label>
                                    <br>
                                    <input type="password" class="form-control" id="new_pass" placeholder="New Password" name="new_password">
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Confirm Password</label>
                                    <br>
                                    <input type="password" class="form-control" id="new_pass1" placeholder="Retype new Password" name="confim_password">
                                </div>
                                <br>
                                <br>
                                <br>
                                <button type="button" class="btn btn-primary" onclick="validatePassword()">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include 'footer.php' ?>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // JavaScript code goes here
        $(document).ready(function() {
            var country_id = $("#country").val();
            var state_id = $("#sel_state_id").val();

            if (country_id != '' && country_id != undefined && country_id != 0) {
                get_states(country_id, state_id);
            }
            $('#country').on('change', function() {
                var country_id = $(this).val();
                get_states(country_id);
            });
        });
        $(document).ready(function() {
            var state_id = $("#sel_state_id").val();
            var city_id = $("#sel_city_id").val();
            // alert("Document is ready."); 
            if (state_id != '' && state_id != undefined && state_id != 0) {
                //alert("Document is ready."); 
                get_city(state_id, city_id);
            }
            $('#state').on('change', function() {
                var state_id = $(this).val();
                get_city(state_id);
            });

        })

        $(document).ready(function() {
            $('#state').on('change', function() {
                var state_id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url('Profile_c/get_city'); ?>",
                    type: "post",
                    data: {
                        'state_id': state_id
                    },
                    success: function(res) {
                        $("#city").html('');
                        $("#city").html(res);
                    }
                });
            });
        });
        $(document).ready(function() {
            $("#wizard-picture").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function get_states(country_id, state_id = '') {
            $.ajax({
                url: "<?php echo base_url('profile_c/get_states'); ?>",
                type: "post",
                data: {
                    'country_id': country_id,
                    'state_id': state_id
                },
                success: function(res) {
                    // alert("Response from the server: " + res);
                    $("#state").html('');
                    $("#state").html(res);
                }
            });
        }

        function get_city(state_id, city_id = '') {
            // alert("Document is ready."); 
            $.ajax({
                url: "<?php echo base_url('Profile_c/get_city'); ?>",
                type: "post",
                data: {
                    'state_id': state_id,
                    'city_id': city_id
                },
                success: function(res) {
                    // alert("Document is ready."); 
                    // alert("Response from the server: " + res);
                    $("#city").html('');
                    //  alert("inside get_city"); 
                    $("#city").html(res);
                }
            });
        }
    </script>
    <script>
        function validatePassword() {
            var newPassword = document.getElementById("new_pass").value;
            var confirmPassword = document.getElementById("new_pass1").value;

            if (newPassword !== confirmPassword) {
                alert("New password and confirm password do not match!");
                return false;
            }else{
                //document.forms[0].submit();
                $('#changePasswordForm').submit();

            }
        }
    </script>
</body>

</html>
<!-- code to be pasted  -->
<!-- change_password.php -->
<!-- <!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="layout\css\styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="parent ">
            <?php include 'header.php' ?>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <?php include 'sidebar.php' ?>
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:</div>
                            Start Bootstrap.
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Change Password</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <!-- Check if error message flash data is set -->
                            <?php if ($this->session->flashdata('error_message')): ?>
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
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include 'footer.php' ?>
        <!-- place footer here -->
    </footer>
   
    <script type="text/javascript">
        // JavaScript code goes here
        $(document).ready(function() {
            var country_id = $("#country").val();
            var state_id = $("#sel_state_id").val();

            if (country_id != '' && country_id != undefined && country_id != 0) {
                get_states(country_id, state_id);
            }
            $('#country').on('change', function() {
                var country_id = $(this).val();
                get_states(country_id);
            });
        });
        $(document).ready(function() {
            var state_id = $("#sel_state_id").val();
            var city_id = $("#sel_city_id").val();
            // alert("Document is ready."); 
            if (state_id != '' && state_id != undefined && state_id != 0) {
                //alert("Document is ready."); 
                get_city(state_id, city_id);
            }
            $('#state').on('change', function() {
                var state_id = $(this).val();
                get_city(state_id);
            });

        })

        $(document).ready(function() {
            $('#state').on('change', function() {
                var state_id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url('Profile_c/get_city'); ?>",
                    type: "post",
                    data: {
                        'state_id': state_id
                    },
                    success: function(res) {
                        $("#city").html('');
                        $("#city").html(res);
                    }
                });
            });
        });
        $(document).ready(function() {
            $("#wizard-picture").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function get_states(country_id, state_id = '') {
            $.ajax({
                url: "<?php echo base_url('profile_c/get_states'); ?>",
                type: "post",
                data: {
                    'country_id': country_id,
                    'state_id': state_id
                },
                success: function(res) {
                    // alert("Response from the server: " + res);
                    $("#state").html('');
                    $("#state").html(res);
                }
            });
        }

        function get_city(state_id, city_id = '') {
            // alert("Document is ready."); 
            $.ajax({
                url: "<?php echo base_url('Profile_c/get_city'); ?>",
                type: "post",
                data: {
                    'state_id': state_id,
                    'city_id': city_id
                },
                success: function(res) {
                    // alert("Document is ready."); 
                    // alert("Response from the server: " + res);
                    $("#city").html('');
                    //  alert("inside get_city"); 
                    $("#city").html(res);
                }
            });
        }
    </script>
    <script>
        function validatePassword() {
            var newPassword = document.getElementById("new_pass").value;
            var confirmPassword = document.getElementById("new_pass1").value;

            if (newPassword !== confirmPassword) {
                alert("New password and confirm password do not match!");
                return false;
            }else{
                //document.forms[0].submit();
                $('#changePasswordForm').submit();

            }
        }
    </script>
</body>

</html> -->
<!--  now Profile page -->
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('header'); ?>
    <body class="sb-nav-fixed">
        <?php $this->load->view('header_top'); ?>
        <div id="layoutSidenav">
            <?php $this->load->view('sidebar'); ?>
            <div id="layoutSidenav_content">
                <main>
                <div id="layoutSidenav_content">
                    <!-- get image here  -->
                    <!-- IMAGE HERE  -->
                    <!-- <img src = "<?php echo $img['image_url']; ?> " style=" height : 10rem ; width : 10rem; margin: 20 auto "> -->
                    <div class="container col-5">
                        <div class="one center" style=" text-align : center">
                            <h1>PROFILE INFORMATION</h1>
                        </div>
                        <form action="<?php echo base_url('update') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="sel_state_id" name="sel_state_id" value="<?php if (isset($arr['state_id']) && $arr['state_id'] != '') {
                                                                                                                        echo $arr['state_id'];
                                                                                                                    } ?>">
                            <input type="hidden" class="form-control" id="sel_city_id" name="sel_city_id" value="<?php if (isset($arr['city_id']) && $arr['city_id'] != '') {
                                                                                                                        echo $arr['city_id'];
                                                                                                                    }   ?>">
                            <div class="picture-container">
                                <div class="picture">
                                    <?php
                                    $profile_image = '';
                                    if (isset($arr['profile_image']) && $arr['profile_image'] != '') {
                                        $profile_image = base_url() . 'uploads/' . $arr['user_id'] . '/' . $arr['profile_image'];
                                    }
                                    ?>
                                    <img src="<?php echo $profile_image; ?>" class="picture-src" id="wizardPicturePreview" title="">
                                    <input type="file" name="profile_image" id="wizard-picture">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname" class="form-label">FIRST NAME</label>

                                    <input type="text" class="form-control" id="fname" name="fname" value="<?php if (isset($arr['f_name']) && $arr['f_name'] != '') {echo trim($arr['f_name']);} ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname" class="form-label">LAST NAME</label>
                                    <input type="text" class="form-control" id="lname" name="lname" value="<?php if (isset($arr['l_name']) && $arr['l_name'] != ''){
                                                  echo $arr['l_name'];
                                    }
                                    ?>">
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">EMAIL</label>
                                    <input type="text" class="form-control" id="email" name ="email"value="<?php if (isset($arr['email']) && $arr['email']!= ''){
                                        echo $arr['email'];
                                    } ?>">                               
                                </div>
                                <div class="col-md-6">
                                    <label for="phon" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php if (isset($arr['phone']) && $arr['phone']!= ''){ echo $arr['phone'];} ?>">
                                </div>
                            </div>
                            <br />
                            <div class="row ">
                                <div class="col-md-6">
                                    <legend class="col-form-label col-sm-2 pt-0   " name="gender">Gender</legend>&nbsp;&nbsp;&nbsp;
                                  
                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="1" checked> Male 
                                        <label class="form-check-label" for="radio1"></label>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="2"> Female
                                        <label class="form-check-label" for="radio2"></label>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="col">
                                        <label for="exampleFormControlTextarea1" class="form-label ">ADDRESS :</label>
                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"><?php if (isset($arr['address']) && $arr['address']!= ''){echo $arr['address']; }?></textarea>

                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exampleFormControlTextarea1" class="form-label ">Country :</label>
                                    <select class="form-select" id="country" name="country">
                                        <option value=""> Select Country </option>
                                        <?php foreach ($arr_countries as $country) : ?>
                                            <?php
                                            $countryid = '';
                                            $countryname = '';
                                            $selected = "";
                                            if(isset( $country['country_id']) &&  $country['country_id']!= ''){
                                                $countryid =  $country['country_id'];
                                                $countryname = $country['country_name'];
                                            }
                                            if ($country['country_id'] == $arr['country_id']) {
                                                $selected = 'selected';
                                            }
                                            
                                            ?>
                                            <option value="<?= $countryid ?>" <?php echo $selected; ?>><?= $countryname ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleFormControlTextarea1" class="form-label ">State :</label>
                                    <select class="form-select" id="state" name="state">
                                                    <?php
                                                            $stateid = '';
                                                            $statename = 'Select State';
                                                            $selected = "";
                                                            if(isset( $arr['state_id']) &&  $arr['state_id']!= ''){
                                                                $stateid =  $arr['state_id'];
                                                                $statename = $arr['state_name'];
                                                            }                                                          
                                                            ?>
                                        
                                        <option value="<?php echo $statename ?>"><?php echo $statename ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleFormControlTextarea1" class="form-label ">City :</label>
                                    <select class="form-select" id="city" name="city">
                                        <?php 
                                           $cityid = '';
                                           $cityname = 'Select City';
                                           $selected = "";
                                           if(isset($arr['city_id']) && $arr['city_id']!= ''){
                                              $cityid = $arr['city_id'];
                                              $cityname = $arr['city_name'];
                                           }
                                            
                                        ?>
                                        <option value="<?php echo $cityid ?>"><?php echo $cityname ?> </option>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12 align-items-center d-flex justify-content-end">
                                    <button type="submit" id="update" class="btn btn-lg btn-primary mb-5" style="width:fit-content;">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </main>
                <?php $this->load->view('footer_bottom'); ?>
            </div>
        </div>
        <?php $this->load->view('footer'); ?>
        </body>
</html>