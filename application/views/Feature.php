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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php $this->load->view('header'); ?>

<body class="sb-nav-fixed">
    <?php $this->load->view('header_top'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-5  ">
                    <div style="margin-bottom:5rem">

                        <form action="<?php echo base_url("addFeature") ?> " method="post">
                            <h6 class="addfeature">Add Feature</h6>
                            <div class="row ">
                                <div class="mb-3 mt-3 d-flex">
                                    <label for="featureName" class="col-sm-2 col-form-label lab">
                                        <i class="fa-solid fa-address-card"></i>
                                        Feature Name</label>
                                    <div class="col-sm">
                                        <input type="text" class="form-control" id="featureName" name="featureName">
                                    </div>
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="featureIcon" class="col-sm-2 col-form-label lab">
                                        <i class="fa-solid fa-puzzle-piece"></i>
                                        Feature Icon</label>
                                    <div class="col-sm">
                                        <input type="text" class="form-control" id="featureIcon" name="featureIcon">
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-warning" role="alert">
                                Enter the icon class from <a href="https://fontawesome.com/search" target="_blank">this page</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block " id="register" disabled value="Register">Submit</button>
                        </form>
                    </div>
                    <!-- table  addd here-->
                    <table id="datatablesSimple" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th class="col-1">Sr.No</th>
                                <th class="col-3">Name</th>
                                <th class="col-5">Icon Class name</th>
                                <th class="col-3">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($arr != null) {
                                foreach ($arr as $key => $array) : ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $array['Menu_title']; ?></td>
                                        <td><?php echo $array['label']; ?></td>
                                        <td>
                                            <button class="col-sm-3 btn  btn-info btn-sm editbutton " data-toggle="modal" data-target="#exampleModalLong" data-bs-toggle="modal" data-bs-target="#exampleModaladd" data-id="<?php echo $array['menu_id'] ?>">EDIT</button>
                                            <button class="col-sm-4 btn  btn-danger btn-sm deletebutton edit-button" data-id="<?php echo $array['menu_id'] ?>">Delete</button>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLongTitle">Edit Features</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" style="width: 100%;" name="menu_id " id="menu_id">

                                    <div class="form-group">
                                        <label for="name">Feature Name</label>
                                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp">

                                    </div>
                                    <div class="form-group">
                                        <label for="editFeatureIcon">Feature Icon</label>
                                        <input type="text" class="form-control" id="editFeatureIcon">
                                    </div>
                                    <div class="form-group">
                                        <label for="editOrder">Order</label>
                                        <input type="text" class="form-control" id="editOrder">
                                    </div>

                                    <button type="button" class="btn btn-primary" id="save" disabled>Submit</button>


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
            $('#featureName, #featureIcon').on('input', function() {
                if (allFilled(featureName, featureIcon)) {
                    $('#register').removeAttr('disabled');
                } else {
                    $('#register').prop('disabled', true);
                }
            });

            function allFilled() {

                return $('#featureName').val() !== "" && $('#featureIcon').val() !== ""  ;
            }
            $('#name,#editFeatureIcon,#editOrder').on('input', function() {
                if (isFilled()) {
                    $('#save').removeAttr('disabled');

                } else {
                    $('#save').prop('disabled', true);
                }
            });

            function isFilled() {
                return ($('#name').val() !== "" && $('#editFeatureIcon').val() !== "" && $('#editOrder').val() !== "");
            }
            $('.deletebutton').click(function() {
                var ID = $(this).data('id');
                $.ajax({
                    url: "<?php echo base_url('deleteFeature'); ?>",
                    type: "post",
                    data: {
                        'ID': ID
                    },
                    success: function(res) {
                        window.location.href = '<?php echo base_url('Feature') ?>';
                    }
                });
            });
            $('.editbutton').click(function() {
                //get menu_id
                var menu_id = $(this).data('id');
                $.ajax({
                    url: "<?php echo base_url('Feature_c/getbypid') ?>",
                    type: "post",
                    data: {
                        'menu_id': menu_id
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);

                        $('#name').val(res[0].Menu_title);
                        $('#editFeatureIcon').val(res[0].label);
                        $('#menu_id').val(res[0].menu_id);
                        $('#editOrder').val(res[0].isOrder);


                        // window.location.href = '<?php echo base_url('Feature') ?>';
                    }
                });

            });
            $('#save').click(function() {

                var menu_id = $("#menu_id").val();
                // alert(menu_id);
                var name = $('#name').val();
                var editFeatureIcon = $('#editFeatureIcon').val();
                var editOrder = $('#editOrder').val();


                var data = {
                    'menu_id': menu_id,
                    'name': name,
                    'editFeatureIcon': editFeatureIcon,
                    'editOrder': editOrder
                };

                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('Feature_c/updatebypid') ?>",
                    data: data,
                    success: function(response) {
                        console.log("updated");
                        window.location.href = '<?php echo base_url('Feature') ?>';
                    }

                });




            });
        });
    </script>

</body>

</html>