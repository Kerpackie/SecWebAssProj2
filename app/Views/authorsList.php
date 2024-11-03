<h1 class="center-text"> List of Authors </h1>
<table>
	<col width="20">
	<col width="100">
	<col width="100">
	<col width="100">
	<col width="100">
	<tr>
		<th align="left">ID</th>
		<th align="left">First Name</th>
		<th align="left">Last Name</th>
		<th align="left">Year of Birth</th>
		<th align="left">Image</th>
	</tr>
	<?php foreach($author as $row){?>
		<tr>
			<td><?php echo $row['authorID'];?></td>
			<td><?php echo $row['firstName'];?></td>
			<td><?php echo $row['lastName'];?></td>
			<td><?php echo $row['yearBorn'];?></td>
			<td><img src="<?php echo base_url(); ?>/assets/images/thumbs/<?= $row['image'] ?>"/>
			<td><a href="<?php echo base_url('drilldownAuthor/'.$row['authorID']); ?>"> View </a></td>
			<td><a href="<?php echo base_url('updateAuthor/'.$row['authorID']); ?>"> Update </a></td>			
            <td><a href="<?php echo base_url('deleteAuthor/'.$row['authorID']); ?>" 
				onclick="return checkDelete();">Delete </a></td>
		</tr>     
	<?php }?>  
</table>
<div>
	<?php if ($pager)
		echo $pager->links(); ?>
</div>