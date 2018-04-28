
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
                $(this).removeClass('input-error');
                e.preventDefault();
                $(this).addClass('input-error');
                //$('.dss').append(character);

            }

        });




    });


});


