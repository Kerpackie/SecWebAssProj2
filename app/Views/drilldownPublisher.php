	<form>
       </br></br> ID:
       <input  type="text"   name="publisherID"  id="publisherID"  readonly value="<?php echo $publisher['publisherID']?>"> 
       </br></br> Publisher Name:
       <input  type="text"   name="publisherName" id="publisherName" readonly value="<?php echo $publisher['publisherName']?>"> 
       </br></br> Address Line 1: 
       <input  type="text"   name="addressLine1"  id="addressLine1"  readonly value="<?php echo $publisher['addressLine1']?>"> 
       </br></br> Address Line 2: 
       <input  type="text"   name="addressLine2"  id="addressLine2"  readonly value="<?php echo $publisher['addressLine2']?>"> 
       </br></br> Address Line 3: 
       <input  type="text"   name="addressLine3"  id="addressLine3"  readonly value="<?php echo $publisher['addressLine3']?>"> 
       </br></br> Contact Name:
       <input  type="text"   name="contactName"  id="contactName"  readonly value="<?php echo $publisher['contactName']?>"> 
       </br></br> Image:
       <img src="<?php echo base_url(); ?>/assets/images/publishers/full/<?= $publisher['image'] ?>"/>
	</form>