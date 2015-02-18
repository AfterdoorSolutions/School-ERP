
<?php
if(isset($_POST['submit']))
{
    $res=get_where("person","*","email='".$_POST['email']."' and password='".$_POST['password']."'");
    $result=$res->fetch_array();
    if($res->num_rows>0)
    {
        register_session("login",$result['person_id']);
        register_session("author",$result['person_id']);
        //echo $_SESSION['login'];
    ?>
    <script type="text/javascript">
    window.location='?module=Dashboard&varient=Dashboard';
    </script>
    <?php
    }
    else
    {
        echo "error";
    }
}
?>

    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="images/logo-primary.png" alt="Chain Logo" >
                    </div>
                    <br />
                    <h4 class="text-center mb5">Welcome</h4>
                    <p class="text-center">Sign in to your account</p>
                    
                    <div class="mb30"></div>
                    
                    <form action="" method="post" id="valWizard">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="email" placeholder="Username" required>
                        </div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div><!-- input-group -->
                        
                        <div class="clearfix">
                            <div class="pull-left">
                                <div class="ckbox ckbox-primary mt10">
                                    <input type="checkbox" id="rememberMe" value="1">
                                    <label for="rememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" name="submit" class="btn btn-success">Sign In <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>
                    
                </div><!-- panel-body -->
                <div class="panel-footer">
                </div><!-- panel-footer -->
            </div><!-- panel -->
            
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>

        <script src="js/custom.js"></script>

    </body>

</html>
