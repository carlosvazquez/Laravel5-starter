$(window).ready( function() {

    var time = 600

    setInterval( function() {

        time--;

        $('#time').html(time);

        if (time === 0) {

            location.reload();
        }


    }, 1000 );

});