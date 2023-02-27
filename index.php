<?php 

$device_posts = new WP_Query(array(
"post_type" => "Devices"
));
 
 query_posts($device_posts);
 
 while($device_posts -> have_posts()): 
 	$device_posts -> the_post();
?>

<div>

<h4><?php echo get_the_title(); ?> </h4>
<p><?php the_content(); ?> </p>
</div>

<?php
endwhile;
get_footer();

?>

