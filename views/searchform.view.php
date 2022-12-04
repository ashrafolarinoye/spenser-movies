<form class="uk-form searchform uk-margin-large-bottom" action="<?php echo htmlspecialchars(getCurrentUrl()); ?>" method="get" id="searchform">

    <div class="uk-grid uk-grid-small">

        <div class="uk-width-medium-1-3 uk-width-small-1-1 uk-margin-bottom">
            <?php if(!getParamsTitle()) { ?>
            <input class="uk-input uk-width-1-1" placeholder="<?php echo _SEARCHPLACEHOLDER ?>" name="title" type="text">
            <?php } else { ?>
            <input class="uk-input uk-width-1-1" value="<?php echo getParamsTitle(); ?>" name="title" type="text">
            <?php } ?>
        </div>

        <div class="uk-width-medium-1-4 uk-width-small-1-2 uk-margin-bottom">

            <select class="uk-select uk-width-1-1" name="genre" id="form-horizontal-select">

                <?php if(getParamsGenre()) { ?>
                <option selected value> <?php echo _GENRES ?> </option>
                <?php
                foreach($rGenres as $item) {
                    if(getParamsGenre() == $item['genre_id'])
                    {
                        echo '<option value="'.getParamsGenre().'" selected="selected">'.$item['genre_title'].'</option>';
                    } else {
                        echo '<option value="'.$item['genre_id'].'">'.$item['genre_title'].'</option>';

                    }}} ?>

                    <?php if(!getParamsGenre()) { ?>
                    <option selected value> <?php echo _GENRES ?> </option>
                    <?php foreach($rGenres as $item): ?>
                        <option value="<?php echo $item['genre_id']; ?>"><?php echo $item['genre_title']; ?></option>
                    <?php endforeach; ?>
                    <?php } ?>

                </select>
            </div>

            <div class="uk-width-medium-1-4 uk-width-small-1-2 uk-margin-bottom">
                <select class="uk-select uk-width-1-1" name="year" id="form-horizontal-select">

                    <?php if(getParamsYear()) { ?>
                    <option selected value> <?php echo _YEARS ?> </option>
                    <?php
                    foreach($rYears as $item) {
                        if(getParamsYear() == $item['year'])
                        {
                            echo '<option value="'.getParamsYear().'" selected="selected">'.$item['year'].'</option>';
                        } else {
                            echo '<option value="'.$item['year'].'">'.$item['year'].'</option>';

                        }}} ?>

                        <?php if(!getParamsYear()) { ?>
                        <option selected value> <?php echo _YEARS ?> </option>
                        <?php foreach($rYears as $item): ?>
                            <option value="<?php echo $item['year']; ?>"><?php echo $item['year']; ?></option>
                        <?php endforeach; ?>
                        <?php } ?>

                    </select>
                </div>

                <div class="uk-width-medium-1-6 uk-width-small-1-1">
                    <button class="uk-button uk-button-large uk-width-1-1" type="submit"><?php echo _SEARCHBUTTON ?></button>
                </div>


            </div>

        </form>

