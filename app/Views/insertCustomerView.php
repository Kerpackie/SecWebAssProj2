	<br><br><br>
	<!-- open form as multipart because it will contain a file upload -->
	<form action="<?php echo base_url();?>insertCustomer" method="post" enctype="multipart/form-data">

		First Name:
			<input  type="text"   name="firstName"   id="firstName"   value="<?php echo set_value('firstName')?>"> </br></br>
		Last Name: 
			<input  type="text"   name="lastName"    id="lastName"    value="<?php echo set_value('lastName')?>"> </br></br> 	
		Address:
			<input  type="text"   name="address"     id="address"     value="<?php echo set_value('address')?>"> </br></br>
		Credit Limit:
			<input  type="text"   name="creditLimit" id="creditLimit" value="<?php echo set_value('creditLimit')?>"> </br></br>
		Favourite Genre:
			<input  type="text"   name="favGenre"    id="favGenre"    value="<?php echo set_value('favGenre')?>"> </br></br>

		</br></br>
        Image Upload:
        	<input type="file" id="file" name="file" value="<?= set_value('userFile') ?>"> </br></br>

		<button type="submit" name="Insert" id="Insert">Insert</button>
	
		<?php if (isset($validation))
			echo $validation->listErrors() ?>
	
	</form>