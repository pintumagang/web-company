



jQuery(document).ready(function(){

    /*
        Fullscreen background
    */


    /*
	    Modals
	*/
    $('#tombolEditProfil').on('click', function(e){
        e.preventDefault();
        $( '#' + $(this).data('modal-id') ).modal();
    });

    /*
        Form validation
    */
    $('#editProfilForm input[type="text"], .registration-form textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });

    $('#editProfilForm').on('submit', function(e) {
        var gambar = $('#input-image-2').val().slice(-3);
        var exstension = ["png", "jpg", "jpeg"];

        var x = function () {
            var z = 0;
            for (i= 0; i <= exstension.length; i++){

                    if (gambar == exstension[i] || gambar == ""){
                        z = 1;
                    }
            }
            return z;
        };
        $(this).find('input[type="text"], textarea,select').each(function(){
            if( $(this).val() == "" || $(this).val() == -1 || $(this).val() == -2) {
                e.preventDefault();
                $(this).addClass('input-error');

            }else if ($('#kabkot').val() != -2){
                $('#kabkot').removeClass('input-error');
            }else if ($('#provinsi').val() != -1){
                $('#provinsi').removeClass('input-error');
            }


        });

        if (x() == 0){
            e.preventDefault();
            $('.te').empty();
            $('.te').append('<p style="color: red">format ekstensi file hanya boleh untuk jpeg, jpg, png</p>');
        }else {
            $('.te').empty();
        }




    });


});


