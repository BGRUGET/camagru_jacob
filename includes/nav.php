<?php require_once __DIR__ . '/header.php' ?>

<style> .ehmerce
{
	bottom: 0;
	position: fixed;
} </style>

<link rel="shortcut icon" type="image/x-icon" href="lyon.jpg">
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="/index.php"><?= $title ?></a>
        <button class="navbar-toggler" type="button" id="navbar-button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav ml-auto">
                <?php if (get_user()): ?>
                    <li class="nav-item <?= isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/my_pictures.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/my_pictures.php">My pictures</a>
                    </li>
                    <li class="nav-item <?= isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/add-pictures.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/add-pictures.php">Add a picture</a>
                    </li>
                    <li class="nav-item <?= isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/profil.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/profil.php">My account</a>
                    </li>
                    <li class="nav-item <?= isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/deconnect.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/deconnect.php">Disconnect</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item <?= isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/login.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/login.php">Connect</a>
                    </li>
                    <li class="nav-item <?= isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/register.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<footer class="ehmerce">
  <p>Posted by: Themarch</p>
</footer>

<script> document.getElementById('navbar-button').addEventListener('click', () => {
    const content = document.getElementById('navbar-content')
    const classes = content.className.split(' ')
    const collapsed = classes
        .reduce((has, content) => has || content === 'collapse', false)
    content.className = collapsed ? classes.filter(className => className !== 'collapse').join(' ') : [classes, 'collapse'].join(' ')
}) </script>
