<?php

echo 'only for connected';

if (User::get_user() == FALSE)
    header('Location: /signin.php');
?>
<link rel="stylesheet" href="css/test.css">

<div class="d-flex p-2 bd-highlight">
    <div class="booth" style="position:relative;">

        <video id="video" width ="320"  height="" autoplay ></video>
        <button id="startbutton">Prendre une photo</button>
    <canvas id="preview" width="320" height="240" style="z-index:5; position: absolute;top:0;left:0;border: 2px solid red;"></canvas>
    </div>
    <div class="d-flex flex-column bd-highlight mb-3">
       <button id ="mst"> <img src="/img/pics/mstch.png" alt="mstch" height= "100" width="100"></button>
        <img src="/img/pics/hat.png" alt="hat" height= "100" width="100">
        <img src="/img/pics/heart.png" alt="heart" height= "100" width="100" >
    </div>
</div>
<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">

    <!--Controls-->
    <div class="controls-top">
        <a class="black-text" href="#multi-item-example" data-slide="prev"><i class="fas fa-angle-left fa-3x pr-3"></i></a>
        <a class="black-text" href="#multi-item-example" data-slide="next"><i class="fas fa-angle-right fa-3x pl-3"></i></a>
    </div>
    <!--/.Controls-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div id="can" class="carousel-item active">

        </div>
        <!--/.First slide-->



    </div>
    <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->
<canvas id="canvas" style ="display:none;"></canvas>

<script src="js/camera.js"></script>



