<!--open form as multipart because it will contain a file upload-->
<form action="<?php echo base_url();?>updateCustomer/<?= $customer['custID'] ?>" method="post" enctype="multipart/form-data"> 
	</br></br> ID:
   	<input type="text" name="custID" id="custID" readonly value="<?php echo $customer['custID']?>"> 
	
	</br></br> First Name:
	<input type="text" name="firstName" id="firstName" value="<?php echo $customer['firstName']?>"> 
	
	</br></br> Last Name: 
	<input type="text" name="lastName" id="lastName" value="<?php echo $customer['lastName']?>"> 
	
	</br></br> Address:
	<input type="text" name="address" id="address" value="<?php echo $customer['address']?>"> 
	
	</br></br> Credit Limit:
	<input type="text" name="creditLimit" id="creditLimit" value="<?php echo $customer['creditLimit']?>"> 
	
	</br></br> Favourite Genre:
	<input type="text" name="favGenre" id="favGenre" value="<?php echo $customer['favGenre']?>"> 

	<!-- this hidden field is used if validation fails on any of the the above inputs -->
	<input  type="text" name="prevImage" id="prevImage" hidden value="<?php echo $customer['image']?>"> 

	</br></br> Existing Image:
	<img src="<?php echo base_url(); ?>/assets/images/full/<?= $customer['image'] ?>"/>
        	
	</br></br> New Image Upload:
    <input type="file" id="file" name="file" value="<?= set_value('userFile') ?>">
	
	</br></br>
    <button type="submit" name="Update" id="Update">Update</button>
	
	<!--display any validation errors -->
	<?php if (isset($validation))
		echo $validation->listErrors() ?>
</form>