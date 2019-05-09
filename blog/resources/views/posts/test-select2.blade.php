{{!! Html::style('css/select2.min.css') !!}}



<form  action="">


	<input type="text" name="name">
	<label for="tags">Tags:</label>
	<select class="form-control select2-multi" name="tags[]"  multiple="multiple">

			<option value="1">Tag One</option>
  			<option value="3">PHP</option>
  			<option value="5">Node JS</option>
  			<option value="6">Sales &amp; Marketing</option>
  			<option value="7">Development</option>

	</select> 



</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="js/select2.min.js"></script>

<script type="text/javascript">
	
		$(document).ready(function() {
	    	$('.select2-multi').select2();
		});
</script>