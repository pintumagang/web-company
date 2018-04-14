<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Perusahaan extends CI_Model {



    public function createPerusahaan($nama_perusahaan, $nama_jalan, $provinsi, $kota, $negara, $kode_pos, $no_tlp,
                                    $email_daftar, $username_daftar, $password_daftar, $jenis_industri, $website){

        $this->db->insert("perusahaan",array("nama_perusahaan"=>$nama_perusahaan, "alamat_perusahaan"=> $nama_jalan,
                                            "link_website"=>$website, "kodepos" =>$kode_pos, "status"=> "P"));

        $this->db->insert("user",array("username"=>$username_daftar, "password" =>$password_daftar, "status"=>"P"));

        return $this->db->insert_id();
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



}
?>