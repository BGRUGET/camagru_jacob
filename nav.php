
<?php
require_once ('header.php'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="/img/camabelagruge.png" width="150" height="150" class="d-inline-block align-top" alt="cama(bela)gru(ge)">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="hamburger">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex flex-column align-items-end h-100"  id="navbarSupportedContent1">
        <ul class="navbar-nav ml-auto">
            <?php if (get_user()): ?>
            <li class="nav-item active">
                <a class="nav-link" href="/indexview.php">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cameraview.php">CAMERA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/disconnect.php">DISCONNECT</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="/signin.php">CONNEXION</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/signup.php">SIGN UP</a>
            </li>
        </ul>
        <?php endif; ?>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
</body>
<script> document.getElementById('hamburger').addEventListener('click', () => {
        const content = document.getElementById('navbarSupportedContent1')
        const classes = content.className.split(' ')
        const collapsed = classes
            .reduce((has, content) => has || content === 'collapse', false)
        content.className = collapsed ? classes.filter(className => className !== 'collapse').join(' ') : [classes, 'collapse'].join(' ')
    }) </script>