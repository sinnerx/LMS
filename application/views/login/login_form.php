 <body class="bg-black">

    <div class="form-box" id="login-box">
        <div class="header">Sign In</div>

            <div class="body bg-gray">

            <?php echo validation_errors(); ?>
            <?php echo form_open('verifylogin'); ?>

                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="User ID"/>
                </div>
                <div class="form-group">
                    <input type="password" id="passowrd" name="password" class="form-control" placeholder="Password"/>
                </div>          
                <div class="form-group">
                    <input type="checkbox" name="remember_me"/> Remember me
                </div>
            </div>
            <div class="footer">
                <input type="submit" class="btn bg-olive btn-block" value="Sign me in"/> 
                
                <p><a href="#">I forgot my password</a></p>
                
                <a href="http://fulkrum.net.my/labs/pivot/index.php/register" class="text-center">Register a new membership</a>
            </div>

            <?php echo form_close(); ?>

        <div class="margin text-center">
            <span>Sign in using social networks</span>
            <br/>
            <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
            <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
            <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>