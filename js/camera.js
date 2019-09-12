(function() {

    var streaming = false,
        video        = document.querySelector('#video'),
        can       = document.querySelector('#can'),
        canvas       = document.querySelector('#canvas'),
        startbutton  = document.querySelector('#startbutton'),
        preview = document.querySelector('#preview'),
        prevctx = preview.getContext('2d')
        width = 320,
        height = 320;

    navigator.getMedia = (navigator.getUserMedia ||
        navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia ||
        navigator.msGetUserMedia);

    navigator.getMedia(
        {
            video:true,
            audio:false,
        },
        function(stream) {
            if (navigator.mozGetUserMedia) {
                video.mozSrcObject = stream;
            } else {
                var vendorURL = window.URL || window.webkitURL;
                video.srcObject=stream;

            }
            video.play();
        },
        function(err) {
            console.log("An error occured! " + err);
        }
    );

   video.addEventListener('canplay', function(ev){
        if (!streaming) {
            let height = video.videoHeight / (video.videoWidth / width);
            video.setAttribute('width', width);
            video.setAttribute('height', height);
            canvas.setAttribute('width', width);
            canvas.setAttribute('height', height);
            streaming = true;
            prevctx.width = video.width + 'px';
            prevctx.height = video.height + 'px';
            prevctx.fillStyle = 'rgba(0,0,0,0.4)';
            prevctx.strokeStyle = 'rgba(0,153,255,0.4)';
        }
    }, false);

    function takepicture() {
        canvas.width = width;
        canvas.height = height;
        canvas.getContext('2d').drawImage(video, 0, 0, width, height);
        var data = canvas.toDataURL('image/png');
        console.log(data);
        var image = document.createElement("img");
        image.setAttribute('src', data);
        adddiv(image);

    }
    function adddiv(image){
       var div1 = document.createElement("div");
       div1.classList = "col-md-3 mb-3";
        var div2 = document.createElement("div");
        div2.classList ="card";

        div1.appendChild(div2);
        div2.appendChild(image);
        can.appendChild(div1);
    }

    startbutton.addEventListener('click', function(ev){
        takepicture();
        ev.preventDefault();
    }, false);


})();
