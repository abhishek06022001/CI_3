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


                      
                        <button type="submit" class="btn btn-primary btn-block" id="register"  value="Register">Submit</button>
                      
                    </form>
                    </div>
                         <!-- table  addd here-->
                         <table id="datatablesSimple"  class="table table-bordered "  >
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
                                                        <button class="col-sm-3 btn  btn-info btn-sm editbutton " data-bs-toggle="modal" data-bs-target="#exampleModaladd">EDIT</button>
                                                        <button class="col-sm-4 btn  btn-danger btn-sm deletebutton edit-button" >Delete</button>
                                                    </td>
                                                </tr>
                                        <?php endforeach;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                </div>
               




            </main>
            <?php $this->load->view('footer_bottom'); ?>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
    <script>
        $('#featureName, #featureIcon').bind('keyup', function() {


            if (allFilled()) {
                $('#register').removeAttr('disabled');
            }
        });

        function allFilled() {
            var filled = true;
            $('main input').each(function() {
                if ($(this).val() == '') filled = false;
            });
            return filled;
        }
    </script>

</body>

</html>