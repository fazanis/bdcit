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

                    <a href="edit/"><button class="btn btn-success">Редактировать</button></a>
                    <h3><?=$alt?></h3>
                </div><!-- panel-heading -->
                <div class="col-md-6">

                    <div class="table-responsive">
                        <table class="table mb30">

                            <tbody>
                            <tr>
                                <td><b>ФИО</b></td>
                                <td><?=$myProfile['fio']?></td>
                            </tr>
                            <tr>
                                <td><b>Логин</b></td>
                                <td><?=$myProfile['login']?></td>
                            </tr>
                            <tr>
                                <td><b>Почта</b></td>
                                <td><?=$myProfile['email']?></td>
                            </tr>
                            <tr>
                                <td><b>Телефон (WhatsApp/Telegram)</b></td>
                                <td><?=$myProfile['phone']?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- col-md-6 -->
            </div><!-- panel -->

        </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
</section>



</body>

<?require_once APPLICATION_PATH.'Views/layouts/footer.php';?>
