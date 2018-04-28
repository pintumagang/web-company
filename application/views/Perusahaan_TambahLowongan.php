<div class="judul">
    <h3 align="center">Daftar Lowongan</h3>
</div>
<div id="toolbar" class="btn-group">
</div>


<table id="myTable" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 50px;">No</th>
        <th>Nama Lowongan</th>
        <th>Deskripsi</th>
        <th>Tenggang waktu</th>
        <th>lokasi</th>
        <th>jenis magang</th>
        <th>Status</th>
        <th><div>
                <button id="tommbolTambahLowongan" style="padding: 0;
border: none;
background: none;" type="button" data-toggle="modal" data-target="#m"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></button>

            </div>

            <div class="modal fade" id="m" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tambah Lowongan</h4>
                        </div>
                        <div class="modal-body" >
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="center-block">
                                            <form id="tambahLowonganForm" method="post" action="<?php echo site_url("Perusahaan/tambahLowongan")?>">

                                                <div class="form-group">
                                                    <input name="id_perusahaan" type="hidden" value="<?php echo $this->Model_Perusahaan->getIdPerusahaanFromIdUser($_SESSION['id_user']) ?>">
                                                </div>


                                                <div class="form-group" id="InamaLowongan">
                                                    <input class="form-control" id="namaLowongann" name="namaLowongan" placeholder="Nama Lowongan" type="text"/>
                                                    <p id="masageNamaLowongan"></p>
                                                </div>


                                                <div class="form-group">
                                                    <textarea  id="deskripsii" class="form-control" cols="40" name="deskripsi" placeholder="Deskripsi Pekerjaan" id="textarea" name="textarea" rows="10"></textarea>
                                                    <p class="text-muted" id="dss"></p>
                                                </div>

                                                <!--<script>
                                                    function count_up(obj) {
                                                        document.getElementById('dss').innerHTML = obj.value.length;
                                                    }
                                                </script>-->

                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar">
                                                            </i>
                                                        </div>
                                                        <input class="form-control date" id="date" name="date" placeholder="YYYY-DD-MM" type="text"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <select class="form-control" name="lokasi" id="provinsiii">
                                                        <?php
                                                        foreach ($provinsi as $prov){
                                                            ?>
                                                            <?php
                                                            if ($prov->nama_provinsi
                                                                == $low->lokasi){
                                                                echo "<option value='$prov->nama_provinsi' selected='selected'>".
                                                                    $prov->nama_provinsi
                                                                    ."</option>";
                                                            }else{
                                                                echo "<option value='$prov->nama_provinsi'>".
                                                                    $prov->nama_provinsi.
                                                                    "</option>";
                                                            }
                                                            ?>

                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <select class="select form-control" id="select" name="jenisMagang">
                                                        <option value="fulltime">
                                                            fulltime
                                                        </option>
                                                        <option value="part time">
                                                            part time
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label " for="select1">
                                                        Select a Choice
                                                    </label>
                                                    <select class="select form-control" id="select1" name="status">
                                                        <option value="aktif">
                                                            aktif
                                                        </option>
                                                        <option value="non aktif">
                                                            non aktif
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button  id="submitTambahLowongan" class="btn btn-primary" name="submit" type="submit">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>



        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($daftarLowongan as $low) {?>
        <tr><td><?php echo $low->id_lowongan?></td>
            <td><?php echo $low->nama_lowongan?></td>
            <td>
                <?php
                    if (strlen($low->deskripsi) > 15){
                       echo substr($low->deskripsi,0,15);
                    }else{
                        echo $low->deskripsi;
                    }
               ?>
            </td>
            <td><?php echo $low->deadline_submit?></td>
            <td><?php echo $low->lokasi?></td>
            <td><?php echo $low->jenis_magang?></td>
            <td><form method="post" action="<?php echo site_url("Perusahaan/statusDaftarLowongan")?>">
                    <input name="id" type="hidden" value="<?php echo $low->id_lowongan?>">
                    <input name="periksa" type="hidden" value="<?php echo $low->status?>">
                    <button type="submit"><?php echo $low->status?></button>
                </form>

            </td>
            <td>

                <div class="modal fade" id="<?php echo $low->id_lowongan?>" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit</h4>

                            </div>
                            <div class="modal-body" >
                                <form id="updateLowonganForm" method="post" action="<?php echo site_url("Perusahaan/updateLowongan")?>">
                                    <input name="id" type="hidden" value="<?php echo $low->id_lowongan?>">

                                    <div class="form-group ">
                                        <input class="form-control" value="<?php echo $low->nama_lowongan?>" id="namaLowongan2" name="namaLowongan2" placeholder="Nama Lowongan" type="text"/>
                                    </div>

                                    <div class="form-group ">
                                        <textarea class="form-control" cols="40" name="deskripsi2" placeholder="Deskripsi Pekerjaan" id="deskripsi2" name="deskripsi2" rows="10"><?php echo $low->deskripsi?></textarea>
                                        <p id="massageE"></p>
                                    </div>

                                    <div class="form-group ">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar">
                                                </i>
                                            </div>
                                            <input class="form-control date" value="<?php echo $low->deadline_submit?>" id="<?php echo $low->deadline_submit?>" name="date2" placeholder="YYYY-DD-MM" type="text"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="lokasi2" id="provinsi2">
                                            <?php
                                            foreach ($provinsi as $prov){
                                                ?>
                                                <?php
                                                if ($prov->nama_provinsi
                                                    == $low->lokasi){
                                                    echo "<option value='$prov->nama_provinsi' selected='selected'>".
                                                        $prov->nama_provinsi
                                                        ."</option>";
                                                }else{
                                                    echo "<option value='$prov->nama_provinsi'>".
                                                        $prov->nama_provinsi.
                                                        "</option>";
                                                }
                                                ?>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group ">
                                        <select class="select form-control" value="<?php echo $low->jenis_magang?>" id="select" name="jenisMagang2">
                                            <option value="fulltime">
                                                fulltime
                                            </option>
                                            <option value="part time">
                                                part time
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <select class="select form-control" value="<?php echo $low->status?>" id="select1" name="status2">
                                            <option value="aktif">
                                                aktif
                                            </option>
                                            <option value="non aktif">
                                                non aktif
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button class="btn btn-primary "  name="submit" type="submit">
                                                Submit
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!--<div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
            -->            </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <button id="tombolUpdateLowongan" style="padding: 0;
border: none;background: none;" type="button" data-toggle="modal" data-target="#<?php echo $low->id_lowongan?>"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></button>
                    </div>


                    <div class="container col-sm-6">

                        <button type="button" style="padding: 0;border: none;background: none;"  data-toggle="modal" data-target="#<?php echo $low->id_lowongan?>2">
                            <i class="fa fa-remove fa-2x" aria-hidden="true"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo $low->id_lowongan?>2" role="dialog">
                            <div class="modal-dialog" style="width: 350px;">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Warning!</h4>
                                    </div>
                                    <div class="modal-body">

                                        <h5>Apakah Anda Yakin ingin Menghapus Lowongan</h5>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <form method="post" action="<?php echo site_url("Perusahaan/hapusLowongan")?>">
                                                    <input name="id" type="hidden" value="<?php echo $low->id_lowongan?>">
                                                    <button style="padding: 0;border: none;background: none;" type="submit"><i class="fa fa-check fa-2x" aria-hidden="true"></i></button>
                                                </form>
                                            </div>

                                            <div class="col-sm-4">
                                                <button style="padding: 0;border: none;background: none;" type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            </div>

                                        </div>



                                    </div>
                                    <!--<div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                    -->            </div>

                            </div>
                        </div>

                    </div>


                </div>






            </td>
        </tr>
    <?php }?>

    </tbody>
</table>


<script>
    // If user clicks anywhere outside of the modal, Modal will close

    var modal = document.getElementById('modal-wrapper');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var modal = document.getElementById('modal-wrapper-edit');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>



<script>
    /*$(document).ready(function(){
        var date_input=$('.date'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });

    })*/
    //var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    $(function() {
        $( ".date" ).datepicker({
            format: 'yyyy-mm-dd',
            //container: container,
            todayHighlight: true,
            autoclose: true, });
    });

</script>


<!--<script>
    $(document).ready(function () {
        $('#namaLowongann').change(function () {
            var namaLowongan = $(this).val();
            $.ajax({
                url: "<?php /*echo site_url('Perusahaan/ceknamaLowongan')*/?>",
                method:"POST",
                data:{namaLowongan: namaLowongan)},
                datatype:"text",
                success:function (data) {

                    $('#InamaLowongan').append(data);

                }
            })
        })
    });
</script>-->



