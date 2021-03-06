<?
use \App\Models\Users;?>
<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="/myprofile/">
            <img class="img-circle" src="/public/images/photos/profile.png" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="/myprofile/"><?=Users::getUserAccess()['fio']?></a></h4>
            <small class="text-muted"><?=Users::getUserAccess()['organizacia']?></small>
        </div>
    </div><!-- media -->

    <h5 class="leftpanel-title">Навигация</h5>
    <ul class="nav nav-pills nav-stacked">
        <li <?if ($_GET['route']==''):?>class="active"<?endif;?>><a href="/"><i class="fa fa-home"></i> <span>Главная</span></a></li>
        <?if(Users::getDostup(['admin','analitik'])):?>
        <li <?if ($_GET['route']=='user/'):?>class="active"<?endif;?>><a href="/user/"><span class="pull-right badge"><?=Users::getCollParam()?></span><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
        <li <?if ($_GET['route']=='raion/'):?>class="active"<?endif;?>><a href="/raion/"><span class="pull-right badge"><?=\App\Models\Raion::getCollRaion()?></span><i class="fa fa-envelope-o"></i> <span>Списки районов</span></a></li>
        <li <?if ($_GET['route']=='organization/'):?>class="active"<?endif;?>><a href="/organization/"><i class="fa fa-file-text"></i> <span>Организации образования</span></a>
        <?endif;?>

        <li class="parent"><a href=""><i class="fa fa-suitcase"></i> <span>Базы данных</span></a>
            <ul class="children">
                <li><a href="/database/svod/">База данных свод</a></li>
                <li><a href="buttons.html">Buttons</a></li>
                <li><a href="extras.html">Extras</a></li>
                <li><a href="graphs.html">Graphs &amp; Charts</a></li>
                <li><a href="icons.html">Icons</a></li>
                <li><a href="modals.html">Modals</a></li>
                <li><a href="widgets.html">Panels &amp; Widgets</a></li>
                <li><a href="sliders.html">Sliders</a></li>
                <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                <li><a href="typography.html">Typography</a></li>
            </ul>
        </li>
        <li class="parent"><a href=""><i class="fa fa-edit"></i> <span>Отчеты</span></a>
            <ul class="children">
                <li><a href="code-editor.html">Code Editor</a></li>
                <li><a href="general-forms.html">General Forms</a></li>
                <li><a href="form-layouts.html">Layouts</a></li>
                <li><a href="wysiwyg.html">Text Editor</a></li>
                <li><a href="form-validation.html">Validation</a></li>
                <li><a href="form-wizards.html">Wizards</a></li>
            </ul>
        </li>
        <li class="parent"><a href=""><i class="fa fa-bars"></i> <span>Tables</span></a>
            <ul class="children">
                <li><a href="basic-tables.html">Basic Tables</a></li>
                <li><a href="data-tables.html">Data Tables</a></li>
            </ul>
        </li>
        <li><a href="maps.html"><i class="fa fa-map-marker"></i> <span>Maps</span></a></li>
        <li class="parent"><a href=""><i class="fa fa-file-text"></i> <span>Pages</span></a>
            <ul class="children">
                <li><a href="notfound.html">404 Page</a></li>
                <li><a href="blank.html">Blank Page</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="locked.html">Locked Screen</a></li>
                <li><a href="media-manager.html">Media Manager</a></li>
                <li><a href="people-directory.html">People Directory</a></li>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="search-results.html">Search Results</a></li>
                <li><a href="signin.html">Sign In</a></li>
                <li><a href="signup.html">Sign Up</a></li>
            </ul>
        </li>

    </ul>

</div><!-- leftpanel -->