<div class="wrap">
    <h1>OopTheme Setting</h1>
    <style>
        .form-row {
            margin: 20px 0;
        }
    </style>
    <form action="" method="post">
        <div class="form-row">
            <label for="member_content_active">Active access to content</label>
            <input type="checkbox"
                   name="member_content_active"
             <?php checked( 1, isset( $options['member_content_active'] ) ? $options['member_content_active'] : 0 ); ?>>
        </div>
        <div class="form-row">
            <p>
                <label for="full_mode">Full</label>
                <input type="radio" id="full_mode" name="display_mode" value="full">
            </p>
            <p>
                <label for="normal_mode">Normal</label>
                <input type="radio" id="normal_mode" name="display_mode" value="normal">
            </p>
            <p>
                <label for="boxed_mode">Boxed</label>
                <input type="radio" id="boxed_mode" name="display_mode" value="boxed">
            </p>
        </div>
        <div class="form-row">
            <button type="submit" class="button button-primary" name="save_options">Save</button>
        </div>
    </form>
</div>