<?php
if($the_events){
	foreach ($the_events as $value)
	{
		echo $value['event_title']."<br>";
		echo $value['event_description']."<br>";
		echo $value['event_location']."<br>";
		echo $value['event_datetime']."<br>";
		echo $value['event_price']."<br>";
	}
}
?>