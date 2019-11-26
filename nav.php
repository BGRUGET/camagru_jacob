
<!-- <link href="/css/nav.css" rel="stylesheet"> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top" role="navigation"">
    <a class="navbar-brand" href="/index.php"><img src="/img/camabelagruge.png" width="150" height="150" class="d-inline-block align-top" alt="cama(bela)gru(ge)">
    </a>
    <button class=" navbar-burger burger" type="button" data-toggle="collapse" data-target="navbarBasicExample" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="hamburger">
        <span class="navbar-toggler-icon"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent1">
        <ul class="nav navbar-nav ml-auto">
            <?php if (User::get_user()): ?>
            <li class="nav-item">
                <a class="nav-link" href="/index.php?p=portfolio">PORTFOLIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php?p=studio">STUDIO</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?p=profil"><img name = "pic" src="<?= profil::get_profil('pic')?>" alt="<?= profil::get_profil('login')?>" height= "40" width="40"  class="rounded-circle"</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="/disconnect.php">DISCONNECT</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="/index.php?p=signin" >CONNEXION</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/index.php?p=signup">SIGN UP</a>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</nav>
<body>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>

