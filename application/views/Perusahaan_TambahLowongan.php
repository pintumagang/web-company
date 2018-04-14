<div class="judul">
    <h3 align="center">Daftar Lowongan</h3>
</div>
<div id="toolbar" class="btn-group">
</div>

<button type="button" data-toggle="modal" data-target="#m">tambah</button>

<div class="modal fade" id="m" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profil</h4>
            </div>
            <div class="modal-body" >
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <form method="post">

                                    <div class="form-group ">
                                        <input class="form-control" id="name" name="namaLowongan" placeholder="Nama Lowongan" type="text"/>
                                    </div>

                                    <div class="form-group ">
                                        <textarea class="form-control" cols="40" placeholder="Deskripsi Pekerjaan" id="textarea" name="textarea" rows="10"></textarea>
                                    </div>

                                    <div class="form-group ">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar">
                                                </i>
                                            </div>
                                            <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text"/>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <input class="form-control" id="name1" name="name1" placeholder="Lokasi" type="text"/>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label " for="select">
                                            Select a Choice
                                        </label>
                                        <select class="select form-control" id="select" name="select">
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
                                        <select class="select form-control" id="select1" name="select1">
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



            </div>
        </div>
    </div>
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
        <th>edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($daftarLowongan as $low) {
        ?>
        <tr><td><?php echo $low->id_lowongan?></td>
            <td><?php echo $low->nama_lowongan?></td>
            <td><?php echo $low->deskripsi?></td>
            <td><?php echo $low->dateline_submit?></td>
            <td><?php echo $low->lokasi?></td>
            <td><?php echo $low->jenis_magang?></td>
            <td><form method="post" action="<?php echo site_url("Perusahaan/statusDaftarLowongan")?>">
                    <input name="id" type="hidden" value="<?php echo $low->id_lowongan?>">
                    <input name="periksa" type="hidden" value="<?php echo $low->status?>">
                    <button type="submit"><?php echo $low->status?></button>
                </form></td>
            <td><button type="button">Edit</button></td>
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
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>