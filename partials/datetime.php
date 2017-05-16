

<?php 

// get raw date
$date = get_field('date', false, false);


// make date object
$date = new DateTime($date);

?>
<p>Event start date: <?php echo $date->format('j M Y'); ?></p>
<?php 

// increase by 1 day
$date->modify('+1 day');
	
?>
<p>Event end date: <?php echo $date->format('j M Y'); ?></p>



<?php

	$date_start = get_field('date_start'); // get raw date
	$date_start = new DateTime($date_end); // make date object

	$date_end = get_field('date_start'); // get raw date
	$date_end = new DateTime($date_end); // make date object

?>


<?php echo $date_start->format('M j, Y'); ?> - <?php echo $date_end->format('M j, Y'); ?>
<?php the_field('time_start'); ?> - <?php the_field('time_end'); ?>