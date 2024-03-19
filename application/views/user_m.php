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
                <div class="container-md mt-5">
                    <div class="card">
                        <div class="card-body d-flex">
                            <h2 style="color:green ;">User List</h2>
                            <button style="margin-left: auto;" class="btn btn-lg btn-warning">Add User</button>
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


</body>

</html>