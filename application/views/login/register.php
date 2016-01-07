 <body class="bg-black">

    <div class="form-box" id="login-box">
        <div class="header">Register New Membership</div>

            <?php echo form_open('register'); ?>

            <div class="body bg-gray">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo set_value('name'); ?>" />
                    <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="User ID" value="<?php echo set_value('username'); ?>" />
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" />
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                    <input type="password" name="passconf" class="form-control" placeholder="Retype password" value="<?php echo set_value('passconf'); ?>" />
                    <?php echo form_error('passconf'); ?>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" />
                    <?php echo form_error('email'); ?>
                </div>
            </div>
            <div class="footer">                    

                <button type="submit" class="btn bg-olive btn-block">Sign me up</button>

                <a href="login" class="text-center">I already have a membership</a>
            </div>

            <?php echo form_close(); ?>

        <div class="margin text-center">
            <span>Register using social networks</span>
            <br/>
            <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
            <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
            <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>