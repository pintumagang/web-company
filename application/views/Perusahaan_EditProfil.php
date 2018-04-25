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
                    <button data-toggle="modal" data-target="#<?php echo $profil->id_perusahaan?>" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></button>
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

                            <form method="post" enctype="multipart/form-data" action="<?php echo site_url("Perusahaan/updateProfilPerusahaan")?>">

                                <input name="idUser" type="hidden" value="<?php echo $profil->id_user?>">

                                <input name="idPerusahaan" type="hidden" value="<?php echo $profil->id_perusahaan?>">


                                <div class="form-group">
                                    <label>Ubah Gamabar menjadi</label>
                                        <div class="file-loading">
                                            <input id="input-image-2"  name="input-image" type="file">
                                        </div>

                                </div>
                                <div class="form-group ">
                                        <input class="form-control" id="name" value="<?php echo $profil->nama_perusahaan?>" name="namaPerusahaan" placeholder="Nama Perusahaan" type="text"/>
                                </div>
                                <div class="form-group ">
                                    <input class="form-control" id="jalan" value="<?php echo $profil->alamat_perusahaan?>" name="jalan" placeholder="jalan" type="text"/>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Select list:</label>

                                    <select class="form-control" name="provinsi" id="provinsi">
                                        <?php
                                        foreach ($provinsi as $prov){
                                        ?>
                                            <?php
                                                if ($prov->nama_provinsi
                                                    == $profil->nama_provinsi){
                                                    $x = $profil->id_provinsi;
                                                    echo "<option value='$profil->id_provinsi' selected='selected'>".
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
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="kabkot" id="kabkot">

                                        <?php
                                            if ($profil->id_kota==0){
                                                echo "<option value='' selected = 'selected'>pilih kabupaten kota</option>";
                                            }else{
                                                echo "<option value='$profil->id_kota'>".
                                                            $profil->nama_kabkot.
                                                    "</option>";
                                            }
                                        ?>

                                    </select>
                                </div>

                                <div class="form-group ">
                                    <input class="form-control" id="website" value="<?php echo $profil->jenis_industri?>" name="industri" placeholder="industri" type="text"/>
                                </div>

                                <div class="form-group ">
                                        <input class="form-control" id="website" value="<?php echo $profil->link_website?>" name="linkWebsite" placeholder="link website" type="text"/>
                                </div>
                                <div class="form-group ">
                                        <input class="form-control" id="email" value="<?php echo $profil->email?>" name="email" placeholder="email" type="text"/>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-primary " name="submit" type="submit">
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

