	<form>
       </br></br> ID:
       <input  type="text"   name="custID"  id="custID"  readonly value="<?php echo $customer['custID']?>"> 
       </br></br> First Name:
       <input  type="text"   name="firstName" id="firstName" readonly value="<?php echo $customer['firstName']?>"> 
       </br></br> Last Name: 
       <input  type="text"   name="lastName"  id="lastName"  readonly value="<?php echo $customer['lastName']?>"> 
       </br></br> Address:
       <input  type="text"   name="address"  id="address"  readonly value="<?php echo $customer['address']?>"> 
       </br></br> Credit Limit:
       <input  type="text"   name="creditLimit"  id="creditLimit"  readonly value="<?php echo $customer['creditLimit']?>"> 
       </br></br> Favourite Genre:
       <input  type="text"   name="favGenre"  id="favGenre"  readonly value="<?php echo $customer['favGenre']?>"> 
       </br></br> Image:
       <img src="<?php echo base_url(); ?>/assets/images/customers/full/<?= $customer['image'] ?>"/>
	</form>