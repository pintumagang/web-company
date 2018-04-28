
jQuery(document).ready(function(){

    /*
        Fullscreen background
    */


    /*
	    Modals
	*/
    $('#tommbolTambahLowongan').on('click', function(e){
        e.preventDefault();
        $( '#' + $(this).data('modal-id') ).modal();
    });

    /*
        Form validation
    */
    $('#tambahLowonganForm input[type="text"], .registration-form textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });

    $('#tambahLowonganForm').on('submit', function(e) {
        $(this).find('input[type="text"], textarea,select').each(function(){
            var character = $('#deskripsii').val().length;
            if( $(this).val() == "") {
                $(this).removeClass('input-error');
                e.preventDefault();
                $(this).addClass('input-error');
                //$('.dss').append(character);

            }else if ($('#provinsiii').val() == "Pilih Provinsi"){
                e.preventDefault();
                $('#provinsiii').addClass('input-error');

            }
            else if (character < 500){
                $('#dss').empty();
                $('#deskripsii').removeClass('input-error');
                e.preventDefault();
                $('#deskripsii').addClass('input-error');
                $('#dss').append('<p> kurang '+ (200 - character) + ' character lagi </p>');

            }else if (character > 1000){
                $('#dss').empty();
                $('#deskripsii').removeClass('input-error');
                e.preventDefault();
                $('#deskripsii').addClass('input-error');
                $('#dss').append('<p> jumlah katakter melebihi batas: '+ character + '</p>');

            }else {
                $(this).removeClass('input-error');
            }

        });




    });


});


