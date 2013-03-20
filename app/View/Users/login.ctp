<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    </fieldset>
	<div class="submit">
		<input value="Login" type="submit">
		<a href="<?php echo $this->base?>/users/add">Add User</a>
	</div>
</div>