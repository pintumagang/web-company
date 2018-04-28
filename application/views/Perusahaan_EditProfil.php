<div class="container">
    <div class="col-sm-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Profil Company</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php
                    foreach ($dataPerusahaan as $profil) {
                    ?>
                    <div class="col-md-12 col-lg-12" align="center">
                      <img alt="User Pic"
                           src="<?php echo $profil->logo ?>"
                           class="img-circle img-responsive">
                    </div>

                    <div class=" col-md-12 col-lg-12 ">
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>Nama Perusahaan</td>
                                    <td>
                                      <?php echo $profil->nama_perusahaan?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>jalan</td>
                                    <td>
                                      <?php echo $profil->alamat_perusahaan?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Provinsi/Kota</td>
                                    <td>
                                      <?php echo $profil->nama_provinsi?>/
                                      <?php echo $profil->nama_kabkot?></td>
                                </tr>
                                <tr>
                                    <td>Industri</td>
                                    <td><?php echo $profil->jenis_industri?></td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Link Website</td>
                                    <td><?php echo $profil->link_website?></td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><a href="#"><?php echo $profil->email?></a></td>
                                </tr>
                                <!--<td>Phone Number</td>
                                <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                </td>-->

                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
            </div>

                    <!-- Trigger the modal with a button -->
            <div class="panel-footer">
                    <button data-toggle="modal" id="tombolEditProfil" data-target="#<?php echo $profil->id_perusahaan?>" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></button>
            </div>
                    <!-- Modal -->
            <div class="modal fade" id="<?php echo $profil->id_perusahaan?>" role="dialog">
                <div class= "modal-dialog">
                            <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">

                                    <!--<form method="post" action="<?php /*echo site_url("Perusahaan/uploadImagePerusahaan")*/?>" enctype="multipart/form-data">


                                        <input name="input-image" type="file">
                                        <input type="submit" value="submit" name="submit">

                                    </form>-->

                            <form  id="editProfilForm" method="post" enctype="multipart/form-data" action="<?php echo site_url("Perusahaan/updateProfilPerusahaan")?>">

                                <input name="idUser" type="hidden" value="<?php echo $profil->id_user?>">

                                <input id="idPer" name="idPerusahaan" type="hidden" value="<?php echo $profil->id_perusahaan?>">



                                <div class="form-group">
                                    <label>Ubah Gamabar menjadi</label>
                                        <div class="file-loading">
                                            <input id="input-image-2"  name="input-image" type="file">
                                        </div>
                                    <div class="te">

                                    </div>

                                </div>
                                <div class="form-group" id="DperusahaanName">
                                        <input class="form-control" id="IperusahaanName" value="<?php echo $profil->nama_perusahaan?>" name="namaPerusahaan" placeholder="Nama Perusahaan" type="text"/>

                                    <p id="qa" style="color: red"></p>
                                </div>

                                <!--<input  class="form-control"  id ="errr" type="text"  disabled="disabled">-->




                                <div class="form-group ">
                                    <input class="form-control" id="jalan" value="<?php echo $profil->alamat_perusahaan?>" name="jalan" placeholder="jalan" type="text"/>
                                </div>
                               <!-- <div>
                                    <p style="align-items: left; color: red">
                                        <?php /*echo $error_jalan*/?>
                                    </p>
                                </div>-->
                                <div class="form-group">
                                    <label for="sel1">Select list:</label>

                                    <select class="form-control" name="provinsi" id="provinsi">
                                        <?php
                                        foreach ($provinsi as $prov){
                                        ?>
                                            <?php
                                                if ($prov->nama_provinsi
                                                    == $profil->nama_provinsi){
                                                    echo "<option value='$prov->id_provinsi' selected>".
                                                                $prov->nama_provinsi
                                                           ."</option>";
                                            }else{
                                                    echo "<option value='$prov->id_provinsi'>".
                                                                  $prov->nama_provinsi.
                                                        "</option>";
                                                }
                                            ?>

                                        <?php } ?>
                                    </select>
                                    <!--<div>
                                        <p style="align-items: left; color: red">
                                            <?php /*echo $error_provinsi*/?>
                                        </p>
                                    </div>-->
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="kabkot" id="kabkot">

                                        <?php


                                            echo "<option value='$profil->id_kota' selected>".
                                                    $profil->nama_kabkot.
                                                    "</option>";



                                        ?>

                                    </select>
                                    <!--<div>
                                        <p style="align-items: left; color: red">
                                            <?php /*echo $error_kabkot*/?>
                                        </p>
                                    </div>-->
                                </div>

                                <div class="form-group ">
                                    <select class="form-control" name="industri" id="industri">

                                        <option id="Teknologi" value="Teknologi">Teknologi</option>
                                        <option id="Kesehatan" value="Kesehatan">Kesehatan</option>
                                        <option id="Makanan" value="Makanan">Makanan</option>
                                        <option id="Keuangan" value="Keuangan">Keuangan</option>

                                    </select>
                                </div>

                                <script>
                                    var x = "<?php echo $profil->jenis_industri?>";
                                    $('#'+x).attr("selected",true);
                                </script>

                                <div class="form-group ">
                                        <input class="form-control" id="website" value="<?php echo $profil->link_website?>" name="linkWebsite" placeholder="link website" type="text"/>

                                </div>
                                <!--<div>
                                    <p style="align-items: left; color: red">
                                        <?php /*echo $error_linkWebsite*/?>
                                    </p>
                                </div>-->
                                <div class="form-group" id="divEmail">
                                        <input class="form-control" id="emaill" value="<?php echo $profil->email?>" name="emaill" placeholder="email" type="email"/>

                                        <p style="color: red" id="erroremail"></p>
                                </div>

                                <!--<div>
                                    <p style="align-items: left; color: red">
                                        <?php /*echo $formatEmail*/?>
                                    </p>
                                </div>-->

                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-primary " id="bs" name="submit" type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <?php } ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#provinsi').change(function () {
            var id_provinsi = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Perusahaan/tampilkanKabkot')?>",
                method:"POST",
                data:{id_provinsi:id_provinsi},
                datatype:"text",
                success:function (data) {
                    $('#kabkot').html(data);
                }
            })
        })
    })
</script>

<script>
    $('#IperusahaanName').keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }


        });

    $('#emaill').keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }


        });
</script>

<script>
    $(document).ready(function () {
        $('#IperusahaanName').change(function () {
            var nama_perusahaan = $('#IperusahaanName').val();
            var id_perusahaan = $('#idPer').val();
            var emaill = $("#emaill").val();
            $.ajax({
                url: "<?php echo site_url('Perusahaan/cekNamaPerusahaan')?>",
                method:"POST",
                data:{nama_perusahaan: nama_perusahaan,
                    id_perusahaan: id_perusahaan,
                    emaill : emaill},
                datatype:"text",
                success:function (data) {
                    /*if ('input["nama_perusahaan"]' == 1){
                        $('#DperusahaanName').append('<p>teas</p>');
                    }else {*/
                    $('#DperusahaanName').append(data);
                    //}
                }
            })
        })
    });
</script>

<script>
    $(document).ready(function () {
        $('#emaill').change(function () {
            var id_perusahaan = $('#idPer').val();
            var emaill = $("#emaill").val();
            $.ajax({
                url: "<?php echo site_url('Perusahaan/cekEmailPerusahaan')?>",
                method:"POST",
                data:{id_perusahaan: id_perusahaan,
                    emaill : emaill},
                datatype:"text",
                success:function (data) {

                    $('#divEmail').append(data);

                }
            })
        })
    });
</script>





