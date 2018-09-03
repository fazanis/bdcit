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
                    <h4 class="panel-title">Работа с пользователями</h4>
                    <a href="create/"><button class="btn btn-success">Добавить</button></a>
                </div><!-- panel-heading -->
            <table id="basicTable" class="table table-striped table-bordered responsive">
                <thead class="">
                <tr>
                    <th>ФИО(Организация)</th>
                    <th>Логин</th>
                    <th>Район</th>
                    <th>Редактирование</th>

                </tr>
                </thead>
                <tbody>
                <?foreach ($userlist as $user):?>

                <tr>
                    <td> <?=$user['name']?></td>
                    <td><?=$user['login']?></td>
                    <td><?=\App\Models\Siti::getSitiById($user['access'])?></td>
                    <td><a href="edit/<?=$user['id']?>/">изменить</a></td>

                </tr>
                <?endforeach;?>
                </tbody>
            </table>
        </div><!-- panel -->

        </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
</section>



</body>

<?require_once APPLICATION_PATH.'Views/layouts/footer.php';?>