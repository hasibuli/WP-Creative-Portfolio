<?php 
function ewpEditableCSS(){
    ?>
<style type="text/css">
.ca-item-main {
  background-color: <?php $ewp_bg_color = get_option('ewp_bg_color'); if(!empty($ewp_bg_color)) {echo $ewp_bg_color;} else {echo "#3397db";}?>;
}
.ca-item h3{
	color: <?php $ewp_title_color = get_option('ewp_title_color'); if(!empty($ewp_title_color)) {echo $ewp_title_color;} else {echo "#fff";}?>;
}
.ca-item-main span {
  color: <?php $ewp_content_color = get_option('ewp_content_color'); if(!empty($ewp_content_color)) {echo $ewp_content_color;} else {echo "#000";}?>;
}
.ca-content {
	background: <?php $ewp_bg_color = get_option('ewp_bg_color'); if(!empty($ewp_bg_color)) {echo $ewp_bg_color;} else {echo "#3397db";}?>;
}
.ewpColor{display:none !important;}
</style>
<?php
}
add_action('wp_footer','ewpEditableCSS', 100);
?>