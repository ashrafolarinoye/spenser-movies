<h1 class="uk-heading-small pagetitle"><?php echo _EDITPROFILE ?></h1>

<form id="editProfile" class="uk-form uk-margin-large-bottom" enctype="multipart/form-data" action="../edit-profile.php" method="post">

	<input type="text" value="<?php echo echoOutput($userInfo['user_id']); ?>" name="user_id" hidden>

	<div class="uk-grid" data-uk-grid="{gutter: 10, animation: false}">

		<div class="uk-width-medium-1-2 uk-width-small-1-1">
			<label class="uk-display-block uk-margin-small"><?php echo _USERNAME ?></label>
			<input class="uk-input uk-width-1-1" value="<?php echo echoOutput($userInfo['user_name']); ?>" name="user_name" type="text">
		</div>

		<div class="uk-width-medium-1-2 uk-width-small-1-1">
			<label class="uk-display-block uk-margin-small"><?php echo _USERPASSWORD ?></label>
			<input type="text" value="<?php echo echoOutput($userInfo['user_password']); ?>" name="user_password_save" hidden>
			<input class="uk-input uk-width-1-1" name="user_password" placeholder="*******" type="password">
		</div>

	</div>

	<button class="uk-button uk-button-default uk-button-large uk-margin-top" type="submit" name="save">Update</button> 

</form>

