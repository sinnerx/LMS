<section class="panel panel-default">
<header class="panel-heading font-bold">                  
 Import Excel For LMS Questions
</header>
<div class="panel-body">
	<?php echo form_open_multipart('importcsv',array('method' => 'post'));?>

	<input type="file" name="importfile[]" multiple/>

	<br /><br />

	<input type="submit" value="upload" class="btn btn-primary "/>

	</form>

</div>
</section>
