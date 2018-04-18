<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-0 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Profil Company</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <?php
                                foreach ($dataPerusahaan as $profil) {
                                ?>
                                <tr>
                                    <td>Nama Perusahaan</td>
                                    <td><?php echo $profil->nama_perusahaan?></td>
                                </tr>
                                <tr>
                                    <td>jalan</td>
                                    <td><?php echo $profil->alamat_perusahaan?></td>
                                </tr>
                                <tr>
                                    <td>Provinsi/Kota</td>
                                    <td><?php echo $profil->nama_provinsi?>/ <?php echo $profil->nama_kabkot?></td>
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
    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                </div>

            </div>
        </div>
    </div>
</div>