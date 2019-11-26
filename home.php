<?php

if (empty($_GET)) {
    header('Location: /index.php?p=home');
}

$database = myPDO::getdb();

$photo_par_page = 5;
$retour_total = $database->query('SELECT COUNT(*) AS total FROM pictures');
$donnees_total = $retour_total->fetch();
$total = $donnees_total['total'];
$nombre_de_page = ceil($total/$photo_par_page);

if (isset($_GET['page']))
{
    if ($_GET['page'] == 0)
        header("Location: /index.php?page=1");
    $page_actuelle = intval($_GET['page']);
    if ($page_actuelle > $nombre_de_page)
        $page_actuelle = $nombre_de_page;
}
else
    $page_actuelle = 1;
$premiere_entree = ($page_actuelle - 1) * $photo_par_page;
$reponse = $database->query("SELECT id_unique, content FROM pictures ORDER BY id DESC LIMIT $premiere_entree, $photo_par_page");

?>

    <script src="galerie.js"> </script>

<?php

while ($donnees = $reponse->fetch())
{
    ?>
    <div class='gallery' id="img-<?= $donnees[0] ?>">
        <div class='mb-3 pics animation all 2'>
    <?php if (User::get_user()): ?>
            <a href="/post.php?id=<?= $donnees[0] ?>">
                <img class='img-fluid' id="help" src="<?= $donnees[1] ?>">
<?php else: ?>
    <img class='img-fluid' id="help" src="<?= $donnees[1] ?>">
            </a>
        </div>
    </div>
<?php endif; }
$rep = $database->prepare("SELECT id_unique FROM pictures where id >= '0'");
$rep->execute();
$ss = $rep->fetch();
if ($ss[0] != '')
{
    echo '<p id="pageact" align="center">Page : ';
    for ($i = 1 ; $i <= $nombre_de_page; $i++)
    {
        if ($i == $page_actuelle)
            echo ' [ '.$i.' ] ';
        else
            echo '<a id="pagination" href="index.php?page='.$i.'"> '.$i.' </a>';
    }
    echo '</p>';
    $reponse->closeCursor();
}
?>