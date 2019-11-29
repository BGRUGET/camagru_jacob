
<!-- <link href="/css/nav.css" rel="stylesheet"> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="/index.php"><img src="/img/camabelagruge.png" width="150" height="150" class="d-inline-block align-top" alt="cama(bela)gru(ge)"></a>
        <button class="navbar-toggler" type="button" id="navbar-button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"  id="navbar-content">
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
                <?php endif; ?>
            </ul>
         </div>
    </div>
</nav>
<body>

<script> document.getElementById('navbar-button').addEventListener('click', () => {
        const content = document.getElementById('navbar-content')
        if (content){
        const classes = content.className.split(' ')
        const collapsed = classes
            .reduce((has, content) => has || content === 'collapse', false)
        content.className = collapsed ? classes.filter(className => className !== 'collapse').join(' ') : [classes, 'collapse'].join(' ')}
    }) </script>
