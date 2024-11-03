<h1 class="center-text"> List of Customers </h1>
<table>
	<col width="200">
	<col width="200">
	<col width="200">
	<col width="200">
	<col width="200">
	<col width="100">
	<col width="100">
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Image</th>
		<th>Actions</th>
	</tr>
	<?php foreach($customer as $row){?>
		<tr>
			<td><?php echo $row['custID'];?></td>
			<td><?php echo $row['firstName'];?></td>
			<td><?php echo $row['lastName'];?></td>
			<td><?php echo $row['address'];?></td>
			<td> <a href="<?php echo base_url('drilldownCustomer/'.$row['custID']); ?>">
				<img src="<?php echo base_url(); ?>/assets/images/customers/thumbs/<?= $row['image'] ?>"/> </a> </td>
			<td><a href="<?php echo base_url('updateCustomer/'.$row['custID']); ?>"> Update </a></td>			
            <td><a href="<?php echo base_url('deleteCustomer/'.$row['custID']); ?>" 
				onclick="return checkDelete();">Delete </a></td>
		</tr>     
	<?php }?>  
</table>
<div>
	<?php if ($pager)
		echo $pager->links(); ?>
</div>