
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index.php"><img src="/img/camabelagruge.png" width="150" height="150" class="d-inline-block align-top" alt="cama(bela)gru(ge)">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="hamburger">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex flex-column align-items-end h-100"  id="navbarSupportedContent1">
        <ul class="navbar-nav ml-auto">
            <?php if (get_user()): ?>
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php?p=camera">CAMERA</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?p=profil">PROFIL</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php">DISCONNECT</a>
            </li>
            <?php else: ?>
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php?p=signin" >CONNEXION</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php?p=signup">SIGN UP</a>
            </li>
        </ul>
        <?php endif; ?>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<body>
