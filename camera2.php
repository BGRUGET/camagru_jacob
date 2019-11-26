<?php/*
echo 'only for connected';
if (User::get_user() == FALSE)
    header('Location: /signin.php');
?>

<div class="cam_container columns" style="margin-top: 100px; margin-left: 50px;">
    <form id="yolo" method="POST" action="storechoosefile.php" enctype="multipart/form-data">
        <div>
            <div style="margin-top: 20px;">Choose a filter to take a snapshot..</div>
            <br>
            <div style="position: relative;">
                <div id="banane" class="filter-above"><img src="./img/pics/banane.png" width="121px" height="91px" style="margin-left: 60px;"></div>
                <div id="chichi" class="filter-above"><img src="./img/pics/chichi.png" width="121px" height="91px" style="margin-top: 60px; margin-left: 123px;"></div>
                <div id="robin" class="filter-above"><img src="./img/pics/robin.png" width="121px" height="91px" style="margin-bottom: 0px;"></div>
                <div id="my_camera"></div>
                <br/>
                <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
                <input id="min_id" type="hidden" name="MIN_FILE_SIZE" value="100000"/>
                <input id="choose_file" name="photo" type="file" onchange="upload_check();loadFile(event);" accept="image/png,image/jpeg,image">
                <input id="button_snap" type="button" value="Take Snapshot" onClick="take_snapshot()" class="button btn_snap">
                <input type="hidden" name="image" class="image-tag" id="picture" value="var-tag">
            </div>
            <div style="position: relative;">
                <div id="banane2" class="filter-above"><img src="./img/pics/banane.png" width="121px" height="91px" style="margin-left: 60px;"></div>
                <div id="chichi2" class="filter-above"><img src="./img/pics/chichi.png" width="121px" height="91px" style="margin-top: 60px; margin-left: 123px;"></div>
                <div id="robin2" class="filter-above"><img src="./img/pics/robin.png" width="121px" height="91px" style="margin-bottom: 0px;"></div>
                <div id="results" style="margin-top: 20px;">Your captured image will appear here...</div>
                <input type="hidden" id="filter" name="filter" value="">
                <input type="hidden" id="filter_screen" name="filter_screen" value="">
                <button id="submit" class="btn button" style="display: none">Submit</button>
                <br/>
            </div>
            <br/>
        </div>
        <table style="margin-bottom: 50px;">
            <tr class="filters">
                <td>
                    <img src="./img/cancel.png" onclick="addFilters('cancel')" title="cancel" width="162.5">
                </td>
                <td>
                    <img src="./img/pics/banane.png" onclick="addFilters('banane')" title="banane" width="162.5">
                </td>
                <td>
                    <img src="./img/pics/chichi.png" onclick="addFilters('chichi')" title="chichi" width="162.5">
                </td>
                <td>
                    <img src="./img/pics/robin.png" onclick="addFilters('robin')" title="robin" width="162.5">
                </td>
            </tr>
        </table>
    </form>

    <div class="column center" style="margin-right: 50px;">
        <form action="share.php" method="POST">

            <br><br>
        </form>
    </div>
</div>

<script src="js/webcam.js"></script>