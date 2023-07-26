<div class="m-4">
    <style>
        .nav-link{
            cursor: pointer;
        }
    </style>
    <nav style="background-color: <?=$siteHeaderColor?>" class="navbar navbar-expand-sm navbar-light bg-green rounded">
        <div class="container-fluid">

            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a onclick="loadMainPage('home_page')" class="nav-link"><?=_ana_sayfa?></a>
                    </li>

                    <?php
                        unset($pageShow);
                        $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='about_us'");
                        $pageName = $page['page_menu_name'] ?: _hakkimizda;
                        if ($page['page_show'] == 2)$pageShow="d-none";

                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('about_us')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>

                    <?php
                        unset($pageShow);
                        $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='aims_scope'");
                        $pageName = $page['page_menu_name'] ?: _amac_ve_kapsam;
                        if ($page['page_show'] == 2)$pageShow="d-none";

                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('aims_scope')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>

                    <?php
                        unset($pageShow);
                        $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='ethics_malpractice'");
                        $pageName = $page['page_menu_name'] ?: _etik_ve_yanlış_uygulama;
                        if ($page['page_show'] == 2)$pageShow="d-none";

                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('ethics_malpractice')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>

                    <?php
                        unset($pageShow);
                        $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='editorial_board'");
                        $pageName = $page['page_menu_name'] ?: _yayın_kurulıu;
                        if ($page['page_show'] == 2)$pageShow="d-none";

                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('editorial_board')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>

                    <?php
                        unset($pageShow);
                        $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='submission'");
                        $pageName = $page['page_menu_name'] ?: _teslim;
                        if ($page['page_show'] == 2)$pageShow="d-none";

                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('submission')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>

                    <?php
                    unset($pageShow);
                    $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='author_guidelines'");
                    $pageName = $page['page_menu_name'] ?: _yazar_yonergeleri;
                    if ($page['page_show'] == 2)$pageShow="d-none";
                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('author_guidelines')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>

                    <?php
                        unset($pageShow);
                        $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='contact'");
                        $pageName = $page['page_menu_name'] ?: _iletisim;
                        if ($page['page_show'] == 2)$pageShow="d-none";

                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('contact')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>

                    <?php
                        unset($pageShow);
                        $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='archive'");
                        $pageName = $page['page_menu_name'] ?: _arsiv;
                        if ($page['page_show'] == 2)$pageShow="d-none";

                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('archive')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>

                    <?php
                        unset($pageShow);
                        $page = db::query_fetch_assoc("SELECT page_menu_name,page_show FROM page_settings WHERE page_name='faq'");
                        $pageName = $page['page_menu_name'] ?: _sss;
                        if ($page['page_show'] == 2)$pageShow="d-none";

                    ?>
                    <li class="nav-item">
                        <a onclick="loadMainPage('faq')" class="nav-link <?=$pageShow?>"><?=$pageName?></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Admin</a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="admin/index.php" class="dropdown-item">Panel</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>