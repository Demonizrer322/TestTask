        <!--Login Register section start-->
            <div class="d-flex flex-row justify-content-center">
                <div class="d-flex flex-column justify-content-center">
                    <div class="row">
                        <!--Login Form Start-->
                        <div class="col-md-6 col-sm-6">
                            <h2>Login</h2>
                            <form action="/user/login" method="POST">
                                <label>Email <span class="required">*</span></label><br>
                                <p><input name="Email" type="email" required></p>
                                <label>Password <span class="required">*</span></label><br>
                                <p><input name="Password" type="password" required></p>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                        <!--Login Form End-->
                        <!--Register Form Start-->
                        <div class="col-md-6 col-sm-6">
                            <h2>Register</h2>
                            <form action="/user/registration" method="POST">
                                <label>UserName <span class="required">*</span></label><br>
                                <p><input name="UserName" type="text" required></p>
                                <label>Email <span class="required">*</span></label><br>
                                <p><input name="Email" type="email" required></p>
                                <label>Password <span class="required">*</span></label><br>
                                <p><input name="Password" type="password" required></p>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                        
                        <!--Register Form End-->
                    </div>
                    <?php
                        if(!empty($_SESSION))
                        {
                    ?>
                            <a class="btn btn-success mt-5" href="http://<?=$_SERVER['HTTP_HOST']?>/home/index">Go to Home</a>
                    <?php        
                        }
                    ?>  
                </div>   
            </div>
        <!--Login Register section end-->