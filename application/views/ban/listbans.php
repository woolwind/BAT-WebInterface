<form class="form-inline">
<h1 style="text-align: center;">
<span style="text-decoration: underline;">Ban list</span> - Sorted by
<select class="form-control selectSortBy">
	<option value="player" <?php if($this->getSortingColumn() == "player")
		echo"selected='selected'"; ?>>player</option>
	<option value="server" <?php if($this->getSortingColumn() == "server")
		echo"selected='selected'"; ?>>server</option>
	<option value="reason" <?php if($this->getSortingColumn() == "reason")
		echo"selected='selected'"; ?>>reason</option>
	<option value="staff" <?php if($this->getSortingColumn() == "staff")
		echo"selected='selected'"; ?>>staff</option>
	<option value="date" <?php if($this->getSortingColumn() == "date")
		echo"selected='selected'"; ?>>date</option>
	<option value="state" <?php if($this->getSortingColumn() == "state")
		echo"selected='selected'"; ?>>state</option>
	<option value="unban_date" <?php if($this->getSortingColumn() == "unban_date")
		echo"selected='selected'"; ?>>unban date</option>
	<option value="unban_staff" <?php if($this->getSortingColumn() == "unban_staff")
		echo"selected='selected'"; ?>>unban staff</option>
	<option value="unban_reason" <?php if($this->getSortingColumn() == "unban_reason")
		echo"selected='selected'"; ?>>unban reason</option>
</select>
</h1>
</form>
<table class="table table-bat">
<thead>
<tr>
<th>Player</th>
<th>Server</th>
<th>Reason</th>
<th>Staff</th>
<th>Date</th>
<th>State</th>
<th>Unban date</th>
<th>Unban staff</th>
<th>Unban reason</th>
</tr>
</thead>
<tbody>
<?php
if (empty($data)) {echo "<tr><td colspan='100'>There are no bans.</td></tr>";}
else{
foreach ($data as $entry){
	$ban = $entry->getData();
	?>
		<tr class="<?php echo $ban['state'] ? "warning" : "info-bat";?>">
			<td ><?php 
			$contentToDisplay = ($ban['ipPunishment']) 
				? (($this->isAdmin()) ? $ban['player'] : Message::ipHidden)
				: $ban['headImg'] . $ban['player'];
			echo $contentToDisplay;
			?></td>
			<td><?php echo $ban['server'];?></td>
			<td><?php echo $ban['reason'];?></td>
			<td><?php echo $ban['staff'];?></td>
			<td><?php echo $ban['date'];?></td>
			<td class="<?php echo $ban['state'] ? "danger-bat" : "";?>"><?php echo $ban['state'] 
				? Message::state_ACTIVE : Message::state_ENDED;?></td>
			<td><?php echo $ban['unban_date'];?></td>
			<td><?php echo $ban['unban_staff'];?></td>
			<td><?php echo $ban['unban_reason'];?></td>
		</tr>
	<?php }}
	?>
</tbody>
</table>