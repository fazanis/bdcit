<?require_once APPLICATION_PATH.'Views/layouts/header.php';?>
<body>

<?require_once APPLICATION_PATH.'Views/layouts/topmenu.php';?>

<section>
    <div class="mainwrapper">
        <?require_once APPLICATION_PATH.'Views/layouts/leftpanel.php';?>

        <div class="mainpanel">
            <div class="pageheader">
                <div class="media">
                    <div class="pageicon pull-left">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="media-body">
                        <ul class="breadcrumb">
                            <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>

                        </ul>
                        <h4><?=$title?></h4>
                    </div>
                </div><!-- media -->
            </div><!-- pageheader -->
            <div class="panel panel-primary-head">
                <div class="panel-heading">
                    <h4 class="panel-title"><?=$title?></h4>
                    <a href="/myprofile/"><button class="btn btn-danger">Отмена</button></a>
                </div><!-- panel-heading -->
            </div><!-- panel -->
            <div class="col-md-6">
                <form id="basicForm" method="post" action="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-btns">
                                <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <h4 class="panel-title">Форма <?=$title?></h4>
                            <p>Измените данные</p>
                        </div><!-- panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Имя <span class="asterisk">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="<?=$user['name']?>" required />
                                    </div>
                                </div><!-- form-group -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Логин <span class="asterisk">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="login" class="form-control" value="<?=$user['login']?>" required />
                                    </div>
                                </div><!-- form-group -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Почта <span class="asterisk">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" value="<?=$user['email']?>" required />
                                    </div>
                                </div><!-- form-group -->
                                <div class="form-group" style="display: none">
                                    <label class="col-sm-3 control-label"> <span class="asterisk">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" name="access" class="form-control" value="<?=$user['access']?>" />
                                    </div>
                                </div><!-- form-group -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Пароль <span class="asterisk">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" />
                                    </div>
                                </div><!-- form-group -->


                            </div><!-- row -->
                        </div><!-- panel-body -->
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <input type="submit" name="saveuser" class="btn btn-primary mr5" value="Сохранить">

                                </div>
                            </div>
                        </div><!-- panel-footer -->
                    </div><!-- panel -->
                </form>

            </div><!-- col-md-6 -->
        </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
</section>



</body>

<?require_once APPLICATION_PATH.'Views/layouts/footer.php';?>
