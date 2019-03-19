<div class="contentArea">
    <div class="contentBox">
    	<h1>Setting</h1>

    	<form method ="post" action="<?php echo site_url('sjoraadmin/dashboard/save_setting') ?>">
    	interval between playing : <input type="text" name="hours" value="<?php echo $setting['hours'] ?>"> Hours <br><br>
    	<input type="submit">
    	</form>

 	</div>
</div>