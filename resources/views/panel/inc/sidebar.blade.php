
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Pano</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#article-item" aria-expanded="false" aria-controls="article-item">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Makaleler</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="article-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.article.index') }}">Listele</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.article.create') }}">Oluştur</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#world-news-item" aria-expanded="false" aria-controls="world-news-item">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">News From World</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="world-news-item">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.world-news.index') }}">Listele</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.world-news.create') }}">Oluştur</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
