
<?php 
 $menu_arr = getMenuItems(0);
 echo "<pre>";print_r($menu_arr);echo "</pre>";exit;
 $id = 0 ;
?>
<div class="sb-sidenav-menu">
    <div class="nav">

        
    </div>
    <?php
        foreach($menu_arr as $menu) {       
                echo '<a class="nav-link parent" data-menu-id="' . $menu['menu_id'] . '" href="#">' . $menu['Menu_title'] . '</a>';    
        }
    ?>
    
</div>
<?php 
  function show($num){
    $arr = getMenuItems($num);
    foreach($arr as $row){
        echo '<a class="nav-link child" href="#">' . $row['Menu_title'] . '</a>';     
    }
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.parent').click(function(e) {
        e.preventDefault(); 
        var menuId = $(this).data('menu-id');
        
        show(menuId); 
    });
});
</script>






