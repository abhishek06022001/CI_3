<?php
$menu_arr = getMenuItems(0);// table se data laega ye specific parent id k hisab se 
$id = 0;
?>

    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php foreach ($menu_arr as $key => $menu) { //  array hena php ka so 0=>dashboard , 1=> Layouts etc type rahega ...
                        //key is 0,1,2,3 which represents the databasr 
                        $child_menu = getMenuItems($menu['menu_id']);
                        // echo "<pre>";print_r($child_menu);echo "</pre>";
                        $collapsed = '';
                        $href = '';
                        $datacolpase = '';
                        if ($child_menu) {
                            $collapsed = 'collapsed';
                            $href = '#';
                            $datacolpase = 'data-bs-toggle="collapse" data-bs-target="#collapse' . $key . '" aria-expanded="false" aria-controls="collapse' . $key . '"';
                        }
                    ?>
                        <a class="nav-link <?php echo $collapsed; ?>" href="<?php echo $menu['hreflink'];?>" <?php echo $datacolpase; ?>>
                            <div class="sb-nav-link-icon"><i class="<?php echo $menu['label'] ?>"></i></div>
                            <?php echo $menu['Menu_title']; ?>
                        </a>
                        <?php if ($child_menu) { ?>
                            <div class="collapse" id="collapse<?php echo $key; ?>" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php foreach ($child_menu as $cmenu) { ?>
                                        <a class="nav-link" href= <?php echo $cmenu['hreflink']; ?>><?php echo $cmenu['Menu_title']; ?></a>
                                    <?php } ?>
                                </nav>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
            </nav>
    </div>
                