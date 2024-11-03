<br><br><br>
<form action="<?php echo base_url();?>insert" method="post"> 
	First Name:
		<input  type="text"   name="firstName" id="firstName" value="<?php echo set_value('firstName')?>"> </br></br>
	Last Name: 
		<input  type="text"   name="lastName"  id="lastName"  value="<?php echo set_value('lastName')?>"> </br></br> 	
	Year Born:
		<input  type="text"   name="yearBorn"  id="yearBorn"  value="<?php echo set_value('yearBorn')?>"> </br></br>
	<button type="submit" name="Insert"    id="Insert">Insert</button>
	
	<?php if (isset($validation))
		echo $validation->listErrors() ?>
	
</form>
