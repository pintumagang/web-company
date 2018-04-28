
jQuery(document).ready(function(){

    /*
        Fullscreen background
    */


    /*
	    Modals
	*/
    $('#tombolUpdateLowongan').on('click', function(e){
        e.preventDefault();
        $( '#' + $(this).data('modal-id') ).modal();
    });

    /*
        Form validation
    */
    $('#updateLowonganForm input[type="text"], .registration-form textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });

    $('#updateLowonganForm').on('submit', function(e) {
        $(this).find('input[type="text"], textarea,select').each(function(){
            var character = $('#deskripsi2').val().length;
            if( $(this).val() == "") {
                //$(this).removeClass('input-error');
                e.preventDefault();
                $(this).addClass('input-error');
                //$('.dss').append(character);

            }else if ($('#provinsi2').val() == "Pilih Provinsi"){
                e.preventDefault();
                $('#provinsi2').addClass('input-error');

            }
            else if (character < 500){
                $('#massageE').empty();
                $('#deskripsi2').removeClass('input-error');
                e.preventDefault();
                $('#deskripsi2').addClass('input-error');
                $('#massageE').append('<p> kurang '+ (200 - character) + ' character lagi </p>');

            }else if (character > 1000){
                $('#massageE').empty();
                $('#deskripsi2').removeClass('input-error');
                e.preventDefault();
                $('#deskripsi2').addClass('input-error');
                $('#massageE').append('<p> jumlah katakter melebihi batas: '+ character + '</p>');

            }else {
                $(this).removeClass('input-error');
            }


        });




    });


});


