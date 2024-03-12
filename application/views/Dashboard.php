                <!DOCTYPE html>
                <html lang="en">
                <!-- #region -->

                <?php $this->load->view('header'); ?>


                <body class="sb-nav-fixed">
                    <?php $this->load->view('header_top'); ?>
                    <div id="layoutSidenav">
                        <?php $this->load->view('sidebar'); ?>
                        <div id="layoutSidenav_content">
                            <main>
                                <div class="container-fluid px-4">
                                    <h1 class="mt-4">Dashboard</h1>
                                    <ol class="breadcrumb mb-4">
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card bg-primary text-white mb-4">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h4>TOTAL EMPLOYEES</h4>
                                                        </div>
                                                        <div>
                                                        <h1><?php echo (implode(" ",$part_time)+ implode(" ",$full_time)) ?></h1>

                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <!-- <FORM>
                                                    <a class="small text-white stretched-link" href="<?php echo base_url("Employees") ?>"  style="color: white;  text-decoration: none;">VIEW DETAILS!</a>
                                                    </FORM> -->
                                                    <form id="total_details" action="<?php echo base_url("Employees") ?>" method="post">
                                                        <input type="hidden" value="" name="typeSearch" />
                                                        <a href="#" onclick="document.getElementById('total_details').submit();" style="color: white;  text-decoration: none;">VIEW DETAILS!</a>
                                                    </form>

                                                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
                                                        </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card bg-info text-white mb-4">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h4>PART TIME EMPLOYEES</h4>
                                                        </div>
                                                        <div>
                                                        <h1><?php echo $part_time['total_count'] ?></h1>

                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="card-footer d-flex align-items-center justify-content-between">

                                                    <form id="part_time_details" action="<?php echo base_url("Employees") ?>" method="post">
                                                        <input type="hidden" value="0" name="typeSearch" />
                                                        <a href="#" onclick="document.getElementById('part_time_details').submit();" value="0" style="color: white;  text-decoration: none;">VIEW DETAILS!</a>
                                                    </form>
                                                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
                                                        </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card bg-danger text-white mb-4">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h4>FULL TIME EMPLOYEES</h4>
                                                        </div>
                                                        <div>
                                                        <h1><?php echo $full_time['total_count'] ?></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <form id="full_time_details" action="<?php echo base_url("Employees") ?>" method="post">
                                                        <input type="hidden" value="1" name="typeSearch" />
                                                        <a href="#" onclick="document.getElementById('full_time_details').submit();" style="color: white;  text-decoration: none;">VIEW DETAILS!</a>
                                                    </form>
                                                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
                                                        </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <svg class="svg-inline--fa fa-chart-area me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-area" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor" d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm96 288H448c17.7 0 32-14.3 32-32V251.8c0-7.6-2.7-15-7.7-20.8l-65.8-76.8c-12.1-14.2-33.7-15-46.9-1.8l-21 21c-10 10-26.4 9.2-35.4-1.6l-39.2-47c-12.6-15.1-35.7-15.4-48.7-.6L135.9 215c-5.1 5.8-7.9 13.3-7.9 21.1v84c0 17.7 14.3 32 32 32z"></path>
                                                    </svg><!-- <i class="fas fa-chart-area me-1"></i> Font Awesome fontawesome.com -->
                                                    Area Chart Example
                                                </div>
                                                <div class="card-body">
                                                    <div class="chartjs-size-monitor">
                                                        <div class="chartjs-size-monitor-expand">
                                                            <div class=""></div>
                                                        </div>
                                                        <div class="chartjs-size-monitor-shrink">
                                                            <div class=""></div>
                                                        </div>
                                                    </div><canvas id="myAreaChart" width="769" height="307" class="chartjs-render-monitor" style="display: block; width: 769px; height: 307px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <svg class="svg-inline--fa fa-chart-bar me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-bar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor" d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zm96 96c0-17.7 14.3-32 32-32l192 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0c-17.7 0-32-14.3-32-32zm32 64H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 96H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32z"></path>
                                                    </svg><!-- <i class="fas fa-chart-bar me-1"></i> Font Awesome fontawesome.com -->
                                                    Bar Chart Example
                                                </div>
                                                <div class="card-body">
                                                    <div class="chartjs-size-monitor">
                                                        <div class="chartjs-size-monitor-expand">
                                                            <div class=""></div>
                                                        </div>
                                                        <div class="chartjs-size-monitor-shrink">
                                                            <div class=""></div>
                                                        </div>
                                                    </div><canvas id="myBarChart" width="769" height="307" class="chartjs-render-monitor" style="display: block; width: 769px; height: 307px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path>
                                            </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                                            DataTable Example
                                        </div>
                                        <div class="card-body">
                                            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                                <div class="datatable-top">
                                                    <div class="datatable-dropdown">
                                                        <label>
                                                            <select class="datatable-selector">
                                                                <option value="5">5</option>
                                                                <option value="10" selected="">10</option>
                                                                <option value="15">15</option>
                                                                <option value="20">20</option>
                                                                <option value="25">25</option>
                                                            </select> entries per page
                                                        </label>
                                                    </div>
                                                    <div class="datatable-search">
                                                        <input class="datatable-input" placeholder="Search..." type="search" title="Search within table" aria-controls="datatablesSimple">
                                                    </div>
                                                </div>
                                                <div class="datatable-container">
                                                    <table id="datatablesSimple" class="datatable-table">
                                                        <thead>
                                                            <tr>
                                                                <th data-sortable="true" style="width: 19.310344827586206%;"><a href="#" class="datatable-sorter">Name</a></th>
                                                                <th data-sortable="true" style="width: 30.28213166144201%;"><a href="#" class="datatable-sorter">Position</a></th>
                                                                <th data-sortable="true" style="width: 14.858934169278998%;"><a href="#" class="datatable-sorter">Office</a></th>
                                                                <th data-sortable="true" style="width: 8.714733542319749%;"><a href="#" class="datatable-sorter">Age</a></th>
                                                                <th data-sortable="true" style="width: 14.482758620689657%;"><a href="#" class="datatable-sorter">Start date</a></th>
                                                                <th data-sortable="true" style="width: 12.351097178683386%;"><a href="#" class="datatable-sorter">Salary</a></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr data-index="0">
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr data-index="1">
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr data-index="2">
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr data-index="3">
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr data-index="4">
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr data-index="5">
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr data-index="6">
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr data-index="7">
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr data-index="8">
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr data-index="9">
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datatable-bottom">
                                                    <div class="datatable-info">Showing 1 to 10 of 57 entries</div>
                                                    <nav class="datatable-pagination">
                                                        <ul class="datatable-pagination-list">
                                                            <li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><a data-page="1" class="datatable-pagination-list-item-link">‹</a></li>
                                                            <li class="datatable-pagination-list-item datatable-active"><a data-page="1" class="datatable-pagination-list-item-link">1</a></li>
                                                            <li class="datatable-pagination-list-item"><a data-page="2" class="datatable-pagination-list-item-link">2</a></li>
                                                            <li class="datatable-pagination-list-item"><a data-page="3" class="datatable-pagination-list-item-link">3</a></li>
                                                            <li class="datatable-pagination-list-item"><a data-page="4" class="datatable-pagination-list-item-link">4</a></li>
                                                            <li class="datatable-pagination-list-item"><a data-page="5" class="datatable-pagination-list-item-link">5</a></li>
                                                            <li class="datatable-pagination-list-item"><a data-page="6" class="datatable-pagination-list-item-link">6</a></li>
                                                            <li class="datatable-pagination-list-item"><a data-page="2" class="datatable-pagination-list-item-link">›</a></li>
                                                        </ul>
                                                    </nav>
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
                        $(document).ready(function() {
                            // Prepare the preview for profile picture
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


                        function part_time() {

                        }



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
                </body>

                </html>