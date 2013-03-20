<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    </fieldset>
	<div class="submit">
		<input value="Add User" type="submit">
		<a href="<?php echo $this->base?>/users/login">Login</a>
	</div>
</div>