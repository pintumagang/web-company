<div class="judul">
    <h3 align="center">Data User Mahasiswa</h3>
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
        <th>Linkedin</th>
        <th><button onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-default Tambah">
                <i class="glyphicon glyphicon-plus">Tambah</i>
            </button></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($pendaftar as $pndf) {
        ?>
        <tr><td><?php echo $pndf->id_pelamar?></td>
            <td><?php echo $pndf->nama_lowongan?></td>
            <td><?php echo $pndf->email?></td>
            <td><?php echo $pndf->cv?></td>
            <td><?php echo $pndf->linkedin?></td>

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