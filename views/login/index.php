<?php   require_once '../../assets/template/header.php'; ?>
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <div class="row-fluid user-row">
                        <img src="http://s11.postimg.org/7kzgji28v/logo_sm_2_mr_1.png" class="img-responsive" alt="Admin"/>
                    </div>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" class="form-signin" method="post" action="<?php echo URL;?>controlers/login/login.php">
                    <input type="hidden" name="op" value="login">

                        <fieldset>
                            <label class="panel-login">
                                <div class="login_result"></div>
                            </label>
                            <input class="form-control" placeholder="Email" id="username" type="text" name="email">
                            <input class="form-control" placeholder="Senha" id="password" type="password" name="senha">
                            <br></br>
                            <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php   require_once '../../assets/template/footer.php'; ?>