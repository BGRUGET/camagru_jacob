<?php
if (empty($_GET))
    header('Location: /index.php?p=studio');
if (User::get_user() == FALSE)
    header('Location: /signin.php');
?>
<script src="js/filtre.js"></script>
<div class="row">
    <div class="column">
        <img class='fruit' id='pomme' onclick="pomme();" src='pomme.png' alt='Card image cap'>
        <img class='fruit' id='banane' onclick="banane();" src='banane.png' alt='Card image cap'>
        <img class='fruit' id='fraise' onclick="fraise();" src='fraise.png' alt='Card image cap'>
    </div>
    <div class="booth" id="main-div">
        <?php
        $database = myPDO::getdb();
        ?>

        <video id="video" width="380" height="300"></video>
        <a href="#" id="capture" onclick="nikegame();" class="booth-capture-button">Take photo </a>
        <div>
            <img class="invisible1" id="invisi" src="" alt="invisible">
            <canvas id="canvas" class="picture" width="380" height="300"> </canvas>
        </div>
        <form method="post" name="recup" onsubmit="insert_photo()">
            <input type="hidden" name="super_photo" id="super_photo">
            <input type="hidden" name="upload_photo" id="upload_photo">
            <input type="hidden" name="superre_filtre" id="superre_filtre">
            <button id="printpas" name="valid">validation</button>
        </form>
        <input type='file' />
        <br><img id="myImg" src="#" alt="your image" height=200 width=100>
       <?php
              if ((isset($_POST['superre_filtre'])) && (isset($_POST['super_photo']))) {
                  studio::photodb($_POST['superre_filtre'], $_POST['super_photo']);
              }
            ?>

    </div>
    <div class="super_miniature" id="miniature1">
       <?php
            $res = studio::miniature();
            foreach ($res as $aff)
            {
            echo "<img class='fruit' src=$aff[0] alt='Card image cap'>";
            }
        ?>
    </div>
</div>

<script src="js/loadfile.js"></script>
<script src="js/webcam.js"></script>

<!--
<script src="filtre.js"></script>
      <div class="row">
          <div class="column">
            <img class='fruit' id='chichi' onclick="chichi();" src='/img/pics/chichi.png' alt='moustache' width="242px" height="183px">
            <img class='fruit' id='banane' onclick="banane();" src='/img/pics/banane.png' alt='banane' width="242px" height="183px">
            <img class='fruit' id='robin' onclick="robin();" src='/img/pics/robin.png' alt='robin' width="242px" height="183px">
          </div>
          <div class="booth" id="main-div"
            <video id="video" width="380" height="300"></video>
            <a href="#" id="capture" onclick="nikegame();" class="booth-capture-button">Take photo </a>
           <div>
              <img class="invisible1" id="invisi" src="" alt="invisible">
              <canvas id="canvas" class="picture" width="380" height="300"> </canvas>
            </div>
              <form method="post" name="recup" onsubmit="insert_photo()">
                <input type="hidden" name="super_photo" id="super_photo">
                <input type="hidden" name="upload_photo" id="upload_photo">
                <input type="hidden" name="superre_filtre" id="superre_filtre">
                <button id="printpas" name="valid">users</button>
              </form>
              <input type='file' />
              <br><img id="myImg" src="#" alt="your image" height=200 width=100>
              /*php
              if ((isset($_POST['superre_filtre'])) && (isset($_POST['super_photo']))) {
                  studio::photodb($_POST['superre_filtre'], $_POST['super_photo']);
              }
            ?>
          </div>
          <div class="super_miniature" id="miniature1">
            php
                $res = studio::miniature();
                foreach ($res as $aff)
            {
              echo "<img class='fruit' src=$aff[0] alt='Card image cap'>";
            }
            ?>
          </div>
        </div>
    <script src="loadfile.js"></script>
    <script src="webcam.js"></script>
