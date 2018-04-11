<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<form action="<?php echo site_url('welcome/insertsk')?>" method="POST" >

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nama Pekerjaan</label>
        <div class="col-sm-10">
            <input type="text" name="nama" class="form-control"/><br>
        </div>
    </div>

    <div class="form-group">
        <label for="deskripsi_pekerjaan" class="col-sm-2 control-label">Deskripsi Pekerjaan</label>
        <div class="col-sm-10">
            <textarea name="deskripsi_pekerjaan" class="form-control" rows="5"/></textarea><br>
        </div>
    </div>

    <div class="form-group">
        <label for="syarat" class="col-sm-2 control-label">syarat</label>
        <div class="col-sm-10">
            <textarea name="syarat" class="form-control" rows="5"/></textarea><br>
        </div>
    </div>


</form>