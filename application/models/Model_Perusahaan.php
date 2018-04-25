<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Perusahaan extends CI_Model {



    public function createPerusahaan($nama,$email, $username, $password){


       $insert = $this->db->insert("user",array("username"=>$username,
            "email_user"=>$email, "password" =>$password, "status"=>"P"));

        if ($insert){
            $this->db->insert("perusahaan",array("nama_perusahaan"=> $nama,
                "id_user"=> $this->getIdUserFromUsername($username),
                "id_provinsi"=>0, "id_kota"=>0));
        }

    }

    public function getIdUserFromUsername($username){
        $sql = "SELECT user.id_user FROM user WHERE username ='$username'";

        return $this->db->query($sql)->row()->id_user;
    }

    public function tampilkanPelamar($id_perusahaan){

        $sql = "SELECT b.*, lowongan.nama_lowongan FROM
(SELECT a.*, k.id_pelamar, k.id_lowongan, k.cv, k.periksa FROM
(SELECT user.email_user, mahasiswa.id_mhs, mahasiswa.nama_depan, mahasiswa.nama_belakang, mahasiswa.perguruan_tinggi,mahasiswa.hp,
mahasiswa.foto, mahasiswa.linkedin FROM mahasiswa INNER JOIN user ON mahasiswa.id_user = user.id_user) AS a
INNER JOIN (SELECT pelamar.* FROM pelamar INNER JOIN
(SELECT lowongan.id_lowongan FROM lowongan WHERE id_perusahaan = '$id_perusahaan') as z ON pelamar.id_lowongan = z.id_lowongan) AS k ON a.id_mhs = k.id_mhs) AS b INNER JOIN lowongan ON b.id_lowongan = lowongan.id_lowongan";

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

    public function getLowongan($id_perusahaan){
        $sql = "SELECT * FROM lowongan WHERE id_perusahaan='$id_perusahaan'";

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
            "deadline_submit" =>$waktu,
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

    public function updateEmailPerusahaan($email, $id_user){
        $updateEmail= array(
            'email_user' => $email
        );

        $this->db->where('id_user',$id_user);
        $this->db->update('user',$updateEmail);

    }

    public function updateProfilPerusahaan($logo, $nama_perusahaan, $jalan,
                                           $link_website,$id_perusahaan,
                                           $id_provinsi,$id_kabkot,$email,
                                           $industri){

        $data = array(
            'logo' => $logo,
            'nama_perusahaan' => $nama_perusahaan,
            'link_website' => $link_website,
            'alamat_perusahaan' => $jalan,
            'id_provinsi' => $id_provinsi,
            'id_kota' => $id_kabkot,
            'email' =>$email,
            'jenis_industri'=>$industri
        );

        $this->db->where('id_perusahaan', $id_perusahaan);
        $this->db->update('perusahaan', $data);

    }


    public function getLogoPerusahaan($id_perusahaan){

        $sql ="SELECT perusahaan.logo FROM perusahaan WHERE id_perusahaan = '$id_perusahaan'";

        return $this->db->query($sql)->row()->logo;
    }

    public function getProvinsi(){

        $sql = "SELECT * FROM provinsi";

        return $this->db->query($sql);
    }

    public function getKabkot($id_provinsi){
        $sql = "SELECT * FROM kabupaten_kota WHERE id_provinsi ='$id_provinsi'";
        return $this->db->query($sql);
    }


    public function getIdPerusahaanFromIdUser($id_user){
        $sql = "SELECT perusahaan.id_perusahaan FROM perusahaan WHERE id_user='$id_user'";

        return $this->db->query($sql)->row()->id_perusahaan;
    }

    public function getId($sql){
       return $this->db->query($sql)->row();
    }



}
?>