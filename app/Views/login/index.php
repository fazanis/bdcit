<?require_once APPLICATION_PATH.'Views/layouts/header.php';?>

<body class="signin">


<section>

    <div class="panel panel-signin">
        <div class="panel-body">
            <div class="logo text-center">
                <h3>База данных образовательных учереждений Павлодарской области</h3>
            </div>
            <br />
            <p class="text-center">Войдете в свой аккаунт</p>

            <div class="mb30"></div>
            <?if(isset($errors) && is_array($errors)): ?>
            <?foreach ($errors as $error):?>
                <?=$error?>
            <?endforeach;?>
            <?endif;?>
            <form action="/login/" method="post">
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="login" class="form-control" placeholder="Логин">
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                </div><!-- input-group -->

                <div class="clearfix">
                    <div class="pull-left">
                        <div class="ckbox ckbox-primary mt10">
                            <input type="checkbox" id="rememberMe" value="1">
                            <label for="rememberMe">Запомнить меня</label>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="submit" name="butpost" class="btn btn-success">Войти<i class="fa fa-angle-right ml5"></i></button>
                    </div>
                </div>
            </form>

        </div><!-- panel-body -->

    </div><!-- panel -->

</section>

<?require_once APPLICATION_PATH.'Views/layouts/footer.php';?>

