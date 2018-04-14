<div class="judul">
    <h3 align="center">Daftar Pelamar</h3>
</div>
<div id="toolbar" class="btn-group">
</div>

<table id="myTable" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 50px;">No</th>
        <th>Nama Lowongan</th>
        <th>Email</th>
        <th>CV</th>
        <th>Profil</th>
        <th>Periksa</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($pendaftar as $pndf) {
        ?>
        <tr><td><?php echo $pndf->id_pelamar?></td>
            <td><?php echo $pndf->nama_lowongan?></td>
            <td><?php echo $pndf->email_user?></td>
            <td>
                <form target="_blank" action="<?php echo site_url("Perusahaan/tampilkanCV")?>" method="post">
                    <input name="cv" type="hidden" value="<?php echo $pndf->id_pelamar?>">
                    <button type="submit" style="padding: 0;border: none;background: none;">click cv</button>
                </form>
            </td>

            <td>
                <button type="button" data-toggle="modal" data-target="#<?php echo $pndf->id_pelamar?>">Open profil</button>

                <div class="modal fade" id="<?php echo $pndf->id_pelamar?>" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Profil</h4>
                            </div>
                            <div class="modal-body" >
                                <div class="row" style="margin-bottom: 50px">
                                    <div class="col-md-1 col-md-offset-4">
                                        <img style="width: 170px; height: 150px;"
                                             src="data:image/jpeg;base64,<?php echo base64_encode($pndf->foto)?>"/>
                                    </div>
                                </div>

                                <div class="row" >
                                    <div class="col-sm-6">
                                        <h4>Nama</h4>
                                        <h4>Perguruan Tinggi</h4>
                                        <h4>No HP</h4>
                                        <h4>Url LinkedIn</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4><?php echo $pndf->nama_depan?> <?php echo $pndf->nama_belakang?></h4>
                                        <h4><?php echo $pndf->perguruan_tinggi?></h4>
                                        <h4><?php echo $pndf->hp?></h4>
                                        <h4><?php echo $pndf->linkedin?></h4>
                                    </div>
                                </div>









                            </div>
                            <!--<div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
            -->            </div>

                    </div>
                </div>

            </td>

            <td><form method="post" action="<?php echo site_url("Perusahaan/periksaDaftarPelamar")?>">
                    <input name="id" type="hidden" value="<?php echo $pndf->id_pelamar?>">
                    <input name="periksa" type="hidden" value="<?php echo $pndf->periksa?>">
                    <button type="submit"><?php echo $pndf->periksa?> diperiksa</button>
            </form></td>
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