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