	<form>
       </br></br> ID:
       <input  type="text"   name="authorID"  id="authorID"  readonly value="<?php echo $author['authorID']?>"> 
       </br></br> First Name:
       <input  type="text"   name="firstName" id="firstName" readonly value="<?php echo $author['firstName']?>"> 
       </br></br> Last Name: 
       <input  type="text"   name="lastName"  id="lastName"  readonly value="<?php echo $author['lastName']?>"> 
       </br></br> Year Born:
       <input  type="text"   name="yearBorn"  id="yearBorn"  readonly value="<?php echo $author['yearBorn']?>"> 
       </br></br> Image:
       <img src="<?php echo base_url(); ?>/assets/images/full/<?= $author['image'] ?>"/>
	</form>