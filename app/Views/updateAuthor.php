<!--open form as multipart because it will contain a file upload-->
<form action="<?php echo base_url();?>updateAuthor/<?= $author['authorID'] ?>" method="post" enctype="multipart/form-data"> 
	</br></br> ID:
   	<input type="text" name="authorID" id="authorID" readonly value="<?php echo $author['authorID']?>"> 
	
	</br></br> First Name:
	<input type="text" name="firstName" id="firstName" value="<?php echo $author['firstName']?>"> 
	
	</br></br> Last Name: 
	<input type="text" name="lastName" id="lastName" value="<?php echo $author['lastName']?>"> 
	
	</br></br> Year Born:
	<input type="text" name="yearBorn" id="yearBorn" value="<?php echo $author['yearBorn']?>"> 
	
	<!-- this hidden field is used if validation fails on any of the the above inputs -->
	<input  type="text" name="prevImage" id="prevImage" hidden value="<?php echo $author['image']?>"> 

	</br></br> Existing Image:
	<img src="<?php echo base_url(); ?>/assets/images/full/<?= $author['image'] ?>"/>
        	
	</br></br> New Image Upload:
    <input type="file" id="file" name="file" value="<?= set_value('userFile') ?>">
	
	</br></br>
    <button type="submit" name="Update" id="Update">Update</button>
	
	<!--display any validation errors -->
	<?php if (isset($validation))
		echo $validation->listErrors() ?>
</form>
