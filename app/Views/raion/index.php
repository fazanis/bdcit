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
                    <a href="create/"><button class="btn btn-success">Добавить</button></a>
                </div><!-- panel-heading -->
                <table id="basicTable" class="table table-striped table-bordered responsive">
                    <thead class="">
                    <tr>
                        <th>№</th>
                        <th>Район</th>
                        <th>Редактирование</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?$i=1;
                    foreach ($raionList as $raion):?>

                        <tr>
                            <td> <?=$i++?></td>
                            <td> <?=$raion['name']?></td>
                            <td>
                                <a href="edit/<?=$raion['id']?>/"><i class="fa fa-edit"></i></a>
                                <a href="drop/<?=$raion['id']?>/" onclick="return confirm('Вы действительно хотите удалить район?')"><i class="fa fa-minus-circle"></i></a>
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
