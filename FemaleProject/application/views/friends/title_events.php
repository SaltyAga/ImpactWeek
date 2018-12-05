<?php
if($all_events){
foreach ($all_events as $value)
{
?>
<form method="post" action="get_event">
	<input type="hidden" name="event_id" value="<?php echo $value['event_id']; ?>">
	<input type="submit" value ="<?php echo $value['event_title']; ?>">
</form>
<?php
}
}
?>