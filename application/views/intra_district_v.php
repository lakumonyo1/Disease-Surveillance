<?php
$current_year = date('Y');
$earliest_year = $current_year - 5;
?>
<script type="text/javascript">
	$(function() {
		$("#year").change(function() {
			var selected_year = $(this).attr("value");
			//Get the last year of the dropdown list
			var last_year = $(this).children("option:last-child").attr("value");
			//If user has clicked on the last year element of the dropdown list, add 5 more
			if($(this).attr("value") == last_year) {
				last_year--;
				var new_last_year = last_year - 5;
				for(last_year; last_year >= new_last_year; last_year--) {
					var cloned_object = $(this).children("option:last-child").clone(true);
					cloned_object.attr("value", last_year);
					cloned_object.text(last_year);
					$(this).append(cloned_object);
				}
			}
		});
	});

</script>
<style type="text/css">
	#filter {
		border: 2px solid #DDD;
		display: block;
		width: 80%;
		margin: 10px auto;
	}
	.filter_input {
		border: 1px solid black;
	}

</style>
<div id="filter">
	<?php
	$attributes = array("method" => "POST");
	echo form_open('intra_district/download', $attributes);
	?>
	<fieldset>
		<legend>
			Select Filter Options
		</legend>
		<label for="year">Select
			Year</label>
		<select name="year" id="year">
			<?php
for($x=$current_year;$x>=$earliest_year;$x--){
			?>
			<option value="<?php echo $x;?>"
			<?php
			if ($x == $current_year) {echo "selected";
			}
			?>><?php echo $x;?></option>
			<?php }?>
		</select>
		<label for="disease">Disease</label>
		<select	name="disease">
			<?php
foreach($diseases as $disease){
			?>
			<option value="<?php echo $disease['id'];?>"><?php echo $disease['Name'];?></option>
			<?php }?>
		</select>
		<input type="submit" name="surveillance" class="button"	value="View intra-district Reporting" />
	</fieldset>
	</form> 
</div>
