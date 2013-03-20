<div>

	<div style="float:left;">
		<h2>Loggedin History</h2>
	</div>

	<div style="float:right;">
		<a href="<?php echo $this->base?>/users/logout">Logout</a>
	</div>

</div>
<table>
    <tr>
        <th>User Name</th>
        <th>Log</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($history as $log): ?>
    <tr>
        <td><?php echo $username; ?></td>
        <td>
            <?php echo $log['History']['loggedin_time']; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($history); ?>
</table>