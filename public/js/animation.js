function chargement() {
    let timing = 2000 * (strateIng.length);
    $('.infos').html('En cours de préparation');
    $('#chargement').animate({width: '768px'}, timing, function () {
        $('.infos').html('Servez vous !');
    });
}

function remplissageGob() {
    let totalIng = 0;
    for (let i = 0; i < strateIng.length; i++) {
        totalIng += strateIng[i];
    }
    let multiple = 100 / totalIng;
    for (let i = 0; i < strateIng.length; i++) {
        strateIng[i] = strateIng[i] * multiple;
    }

    let i = strateIng.length - 1;
    chargement();
    animateStrate();

    function animateStrate() {
        if (i >= 0) {
            $('.ingredients:eq(' + (i) + ')').animate({height: strateIng[i] + '%'}, 2000, function () {
                animateStrate();
            });
            i--
        } else {
            $('.animated').animate({backgroundColor: color, opacity: 0.8}, 2000);
        }
    }
}

function affichageGob() {
    $('#gobelet').fadeIn('slow', remplissageGob());
}

$(document).ready(function () {


    for (let iing = 0; iing < $('.ingredients').length; iing++) {

        let ingredient = $('.ingredients:eq(' + (iing) + ')'),
            color = ingredient.css('background-color'),
            waveWidth = 5,
            waveCount = Math.floor(ingredient.width() / waveWidth),
            docFrag = document.createDocumentFragment();
        for (let i = 0; i < waveCount; i++) {
            let wave = document.createElement("div");
            wave.className += "animated";
            wave.style.backgroundColor = color;
            wave.style.webkitAnimationDelay = (i / 100) + "s";
            if (iing == 0) {
                wave.style.webkitAnimationIterationCount = 'infinite';
            } else {
                wave.style.webkitAnimationIterationCount = $('.ingredients').length - iing;
            }
            docFrag.appendChild(wave);
        }
        ingredient.append(docFrag);
    }
    $('.ingredients').css('background-color', 'transparent');
    $('#gobelet').hide();

    affichageGob();

});