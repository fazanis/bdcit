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
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Организация</th>
                    <th>Логин</th>
                    <th>email</th>
                    <th>Телефон (WhatsApp/Telegram)</th>
                    <th>Права доступа</th>
                    <th>Редактирование</th>

                </tr>
                </thead>
                <tbody>
                <?$i=1;
                foreach ($userlist as $user):?>

                <tr>
                    <td> <?=$i++?></td>
                    <td> <?=$user['fio']?></td>
                    <td> <?=$user['name']?></td>
                    <td><?=$user['login']?></td>
                    <td><?=$user['email']?></td>
                    <td><?=$user['phone']?></td>
                    <td><?=\App\Models\Access::getRoleById($user['access'])?></td>
                    <td>
                        <a href="edit/<?=$user['id']?>/"><i class="fa fa-edit"></i></a>
                        <a href="drop/<?=$user['id']?>/" onclick="return confirm('Вы действительно хотите удалить пользователя?')"><i class="fa fa-minus-circle"></i></a>
                    </td>

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
