<div class="uk-form-row">
    <input value="<?php echo $itemDetails['id']; ?>" name="item" type="text" hidden required>
    <label><?php echo _WHATSYOURRATING ?></label>

    <select class="uk-select uk-margin-bottom uk-width-1-1" name="rating" required>
        <option value="" disabled selected>···</option>
        <?php foreach($arrayRatings as $num): ?>
            <option value="<?php echo $num; ?>"><?php echo $num; ?></option>
        <?php endforeach; ?>

    </select>
    <textarea class="uk-width-1-1" name="content" cols="30" rows="5" placeholder="<?php echo _TYPEYOURREVIEWHERE ?>"></textarea>
</div>
<div class="uk-form-row">
    <button type="submit" class="uk-button uk-button uk-button-default uk-margin-right"><?php echo _POSTBUTTON ?></button>
</div>
