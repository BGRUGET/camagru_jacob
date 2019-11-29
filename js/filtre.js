function banane() {
    var img_invi = document.getElementById('invisi');
    var superr = document.getElementById('superre_filtre');

    superr.value = 'banane.png';

    img_invi.setAttribute('src', 'banane.png');
    img_invi.style.display='block' ;
}

function fraise() {
    var img_invi = document.getElementById('invisi');
    var superr = document.getElementById('superre_filtre');

    superr.value = 'fraise.png';
    img_invi.setAttribute('src', 'fraise.png');
    img_invi.style.display='block';
}

function pomme() {
    var img_invi = document.getElementById('invisi');
    var superr = document.getElementById('superre_filtre');

    superr.value = 'pomme.png';

    img_invi.setAttribute('src', 'pomme.png');
    img_invi.style.display='block';
}

let count = 0;

function nikegame() {
    count = 1;
}

function printt() {
    var aff = document.getElementById('superre_filtre');
    var affpas = document.getElementById('printpas');
    if (aff.value != '' && count == 1)
        affpas.style.display = 'block';
}

setInterval(printt, 200);