window.addEventListener('load', function() {
    document.querySelector('input[type="file"]').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            console.log(this.files[0]);
            var canvas = document.getElementById('canvas'),
                context = canvas.getContext('2d');
            var img = document.getElementById('myImg');  // $('img')[0]
            img.src = URL.createObjectURL(this.files[0]); // set src to file url
            context.drawImage(canvas, 0, 0, 380, 300);
            img.onload = function (e){
                nikegame()
                var img = document.getElementById('myImg');
                var re = document.getElementById('super_photo');
                context.drawImage(e.path[0], 0, 0, 380, 300);
                var tt = canvas.toDataURL();
                re.value = tt;
            };
        }
    });
});
