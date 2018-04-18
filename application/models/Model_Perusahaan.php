<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Perusahaan extends CI_Model {



    public function createPerusahaan($nama, $username, $email, $password){

       /* $this->db->insert("perusahaan",array("nama_perusahaan"=> $nana));

        $this->db->insert("user",array("username"=>$username_daftar, "password" =>$password_daftar, "status"=>"P"));

        return $this->db->insert_id();*/
    }

    public function tampilkanPelamar(){

        $sql = "SELECT b.*, lowongan.nama_lowongan FROM
(SELECT a.*, pelamar.id_pelamar, pelamar.id_lowongan, pelamar.cv, pelamar.periksa FROM
(SELECT user.email_user, mahasiswa.id_mhs, mahasiswa.nama_depan, mahasiswa.nama_belakang, mahasiswa.perguruan_tinggi,mahasiswa.hp,
mahasiswa.foto, mahasiswa.linkedin FROM mahasiswa INNER JOIN user ON mahasiswa.id_user = user.id_user) AS a
INNER JOIN pelamar ON a.id_mhs = pelamar.id_mhs) AS b INNER JOIN lowongan ON b.id_lowongan = lowongan.id_lowongan";

        return $this->db->query($sql);

    }


    public function getCV($id_pelamar){
        $sql = "SELECT pelamar.cv FROM pelamar where id_pelamar='$id_pelamar'";
        return $this->db->query($sql);
    }

    public function updateStatusPemeriksaanPelamar($id_pelamar,$status_periksa){
            $data = $status_periksa;
        if ($status_periksa == "belum"){
            $data = "sudah";
        }else{
            $data = "belum";
        }

        $updateData=array("periksa"=> $data);

        $this->db->where('id_pelamar',$id_pelamar);
        $this->db->update('pelamar',$updateData);

    }

    public function getLowongan(){
        $sql = "SELECT * FROM lowongan";

        return $this->db->query($sql);
    }

    public function updateStatusLowongan($id_lowongan,$status){
        $data = $status;
        if ($status == "aktif"){
            $data = "non aktif";
        }else{
            $data = "aktif";
        }

        $updateData=array("status"=> $data);

        $this->db->where('id_lowongan',$id_lowongan);
        $this->db->update('lowongan',$updateData);
    }

    public function insertLowongan($data){
        $this->db->insert('lowongan', $data);
    }

    public function updateLowonganM($id_lowongan,$nama_lowongan,$deskripsi,$waktu,$jenis_magang,
$status,$lokasi){


        $updateData=array(
            "nama_lowongan"=> $nama_lowongan,
            "deskripsi"=> $deskripsi,
            "dateline_submit" =>$waktu,
            "jenis_magang" => $jenis_magang,
            "lokasi" => $lokasi,
            "status" =>$status);


        $this->db->where('id_lowongan',$id_lowongan);
        $this->db->update('lowongan',$updateData);
    }


    public function getPerusahaan(){
        $a =$_SESSION['id_user'];
        $sql = "SELECT a.*, kabupaten_kota.nama_kabkot FROM
(SELECT perusahaan.id_user, perusahaan.nama_perusahaan, perusahaan.logo, perusahaan.id_perusahaan, perusahaan.alamat_perusahaan,
 perusahaan.deskripsi, perusahaan.jenis_industri, perusahaan.status, perusahaan.email, perusahaan.link_website, perusahaan.id_provinsi, perusahaan.id_kota, perusahaan.kodepos, provinsi.nama_provinsi FROM perusahaan INNER JOIN provinsi ON perusahaan.id_provinsi = provinsi.id_provinsi) AS a
INNER JOIN kabupaten_kota ON a.id_kota = kabupaten_kota.id_kabkot WHERE id_user ='$a'";

        return $this->db->query($sql);
    }

    public function hapusLowongan($id_lowongan){
        $sql = "DELETE FROM lowongan WHERE id_lowongan ='$id_lowongan'";

        return $this->db->query($sql);
    }

}
?>