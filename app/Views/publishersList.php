<h1 class="center-text"> List of Publishers </h1>
<table>
	<col width="20">
	<col width="200">
	<col width="150">
	<col width="150">
	<col width="150">
	<col width="150">
	<col width="100">
	<col width="100">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Address 1</th>
		<th>Address 2</th>
		<th>Address 3</th>
		<th>Contact</th>
		<th>Image</th>
		<th>Actions</th>
	</tr>
	<?php foreach($publisher as $row){?>
		<tr>
			<td><?php echo $row['publisherID'];?></td>
			<td><?php echo $row['publisherName'];?></td>
			<td><?php echo $row['addressLine1'];?></td>
			<td><?php echo $row['addressLine2'];?></td>
			<td><?php echo $row['addressLine3'];?></td>
			<td><?php echo $row['contactName'];?></td>
			<td><img src="<?php echo base_url(); ?>/assets/images/publishers/thumbs/<?= $row['image'] ?>"/>
			<td><a href="<?php echo base_url('drilldownPublisher/'.$row['publisherID']); ?>"> View </a></td>
		</tr>     
	<?php }?>  
</table>
<div>
</div>