<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ('User.php');
class Perusahaan extends CI_Controller {

    public function __construct()
    {


        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->model('Model_Perusahaan');
    }

    public function index()
    {
        if ($this->session->userdata('user') == FALSE && $this->session->userdata('logged_in') == FALSE ) {
            $this->load->view('Login');
        }else{

            if ($this->session->userdata('status') == 'P'){
                $this->load->view('Perusahaan_Home');
            }else{
                $this->load->view('Perusahaan_Home');
            }

        }

    }


    public function View_Beranda (){

        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else{
            $this->load->view('Perusahaan_Home');
        }

    }

    public function View_Pendaftar(){


        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else{

            $id_perusahaan = $this->Model_Perusahaan->
            getIdPerusahaanFromIdUser($_SESSION['id_user']);

            $dataPendaftar['pendaftar']	= $this->Model_Perusahaan->
            tampilkanPelamar($id_perusahaan)->result();

            $this->load->view('Perusahaan_Home', $dataPendaftar);

        }


    }

    public function View_TambahLowongan(){

        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else {


           $id_perusahaan = $this->Model_Perusahaan->
            getIdPerusahaanFromIdUser($_SESSION['id_user']);


            $dataLowongan['daftarLowongan'] = $this->Model_Perusahaan->
            getLowongan($id_perusahaan)->result();

            $dataLowongan['provinsi'] = $this->Model_Perusahaan->
            getProvinsi()->result();


            $this->load->view('Perusahaan_Home', $dataLowongan);

        }

    }

    public function View_EditProfil(){

        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else{



            $data['dataPerusahaan']= $this->Model_Perusahaan->
            getPerusahaan()->result();

            $data['provinsi'] = $this->Model_Perusahaan->
            getProvinsi()->result();


            //$this->load->view('Modal_Test', $data);
            $this->load->view('Perusahaan_Home', $data);


        }


    }


	public function view_register(){

        if ($this->session->userdata('user') == FALSE && $this->session->userdata('logged_in') == FALSE ) {
            $error = array(
                'massage_kosong' =>'',
                'massage_namaUdahAda' =>'',
                'massage_emailUdahAda'=>'',
                'massage_formatEmailSalah'=>'',
                'massage_usernameUdahAda'=>'',
            );

            $this->load->view('Registrasi',$error);
        }else{
            $this->load->view('Perusahaan_Home');
        }



       /* if (isset($_POST["submit_daftar"])){
                $this->register();
        }*/


    }


   


    /**
     *
     */
    public function tampilkanCV(){

        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else {

            $cv_id = $this->input->post('cv', true);

            $cv['data'] = $this->Model_Perusahaan->getCV($cv_id)->result();

            $this->load->view('CV', $cv);

        }



    }

    public function periksaDaftarPelamar(){

        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else {

            $id = $this->input->post('id', true);
            $status_periksa = $this->input->post('periksa', true);

            $this->Model_Perusahaan->updateStatusPemeriksaanPelamar($id, $status_periksa);

            redirect('Perusahaan/View_Pendaftar?module=Pendaftar');
        }
    }

    public function statusDaftarLowongan(){

        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else {

            $id = $this->input->post('id', true);
            $status_periksa = $this->input->post('periksa', true);

            $this->Model_Perusahaan->updateStatusLowongan($id, $status_periksa);

            //$this->load->view('Perusahaan_Home');
            redirect('Perusahaan/View_TambahLowongan?module=TambahLowongan');
        }
    }

    public function tambahLowongan(){
        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else {

            $data = array(
                'nama_lowongan' => $this->input->post('namaLowongan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'deadline_submit' => $this->input->post('date'),
                'jenis_magang' => $this->input->post('jenisMagang'),
                'status' => $this->input->post('status'),
                'lokasi' => $this->input->post('lokasi'),
                'id_perusahaan' => $this->input->post('id_perusahaan')

            );


            $this->Model_Perusahaan->insertLowongan($data);
            redirect('Perusahaan/View_TambahLowongan?module=TambahLowongan');
            //$this->load->view('Perusahaan_Home');
        }
        /*$waktu = explode("/",$this->input->post('date'));
        $time = $waktu[2].'-'.$waktu[1].'-'.$waktu[0];*/
       /* $data = array(
            'tanggal' => $waktu[0],
            'bulan' => $waktu[1],
            'tahun' => $waktu[2],
            'a' =>$time,
            'id_user'=> $this->session->userdata('id_user'),
            'id_user2' => $_SESSION['id_user']
        );
        $this->load->view('Modal_Test',$data);*/

    }

    public function updateLowongan(){
        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else {
            $id = $this->input->post('id', true);
            $nama_lowongan = $this->input->post('namaLowongan2', true);
            $deskripsi = $this->input->post('deskripsi2', true);
            $time = $this->input->post('date2');
            $jenis_magang = $this->input->post('jenisMagang2', true);
            $lokasi = $this->input->post('lokasi2', true);
            $status = $this->input->post('status2', true);


            $this->Model_Perusahaan->updateLowonganM(
                $id, $nama_lowongan, $deskripsi, $time, $jenis_magang, $status, $lokasi
            );

            //$this->load->view('Perusahaan_Home');
            redirect('Perusahaan/View_TambahLowongan?module=TambahLowongan');
        }

    }

    public function hapusLowongan(){

        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else {
            $id = $this->input->post('id', true);
            $this->Model_Perusahaan->hapusLowongan($id);
            redirect('Perusahaan/View_TambahLowongan?module=TambahLowongan');
            //$this->load->view('Perusahaan_Home');
        }
    }

    public function updateProfilPerusahaan()
    {
        if ($this->session->userdata('user') == FALSE &&
            $this->session->userdata('logged_in') == FALSE )
        {
            $this->load->view('Login');
        }else {
            $gambar = $this->Model_Perusahaan->
            getLogoPerusahaan($this->input->post('idPerusahaan', true));

            $inputGambar = $this->input->post('input-image', true);

            //cek ada gambar yang di inputkan atau tidak


                $config = array(
                    'upload_path' => '../mobile-android/image/',
                    'allowed_types' => 'jpg|jpeg|png|bmp',
                    'max_size' => 100000,
                    'filename' => url_title($this->input->post('input-image', true))
                );

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('input-image')) {
                    //echo $config['filename'];
                    $name = str_replace(' ', '_', $_FILES["input-image"]["name"]);
                    $gambar = '/' . $config['upload_path'] . $name;
                }


                //$gambar = "test";
                //echo $_FILES["input-image"]["name"];


                $namaPerusahaan = $this->input->post('namaPerusahaan', true);
                $jalan = $this->input->post('jalan', true);
                $linkWebsite = $this->input->post('linkWebsite', true);
                $idPerusahaan = $this->input->post('idPerusahaan', true);
                $provinsi = $this->input->post('provinsi', true);
                $kabkot = $this->input->post('kabkot', true);
                $email = $this->input->post('emaill', true);
                $industri = $this->input->post('industri', true);




                $this->Model_Perusahaan->updateProfilPerusahaan(
                    $gambar,
                    $namaPerusahaan,
                    $jalan,
                    $linkWebsite,
                    $idPerusahaan,
                    $provinsi,
                    $kabkot,
                    $email,
                    $industri
                );

                $this->Model_Perusahaan->updateEmailPerusahaan(
                    $this->input->post('email', true),
                    $this->input->post('idUser', true)
                );
               redirect('Perusahaan/View_EditProfil?module=EditProfil');





            /*$this->Model_Perusahaan->updateProvinsiPerusahaan(
                $this->input->post('provinsi', true),
                $this->input->post('idPerusahaan', true)

            );


            $this->Model_Perusahaan->updateKabkotPerusahaan(
                $this->input->post('kota', true),
                $this->input->post('idPerusahaan', true)

            );*/


            //$this->View_EditProfil();*

        }
    }
        public function uploadImagePerusahaan(){



            /*if(array_key_exists('input-image', $_FILES)){
                if ($_FILES['input-image']['error'] === UPLOAD_ERR_OK) {


                    move_uploaded_file( $_FILES['input-image']['tmp_name'], getcwd().'/assets/'.$_FILES["input-image"]["name"]);
                    echo 'upload was successful';
                } else {
                    die("Upload failed with error code " . $_FILES['input-image']['error']);
                }
            }*/

            $config = array(
                'upload_path' => '../mobile-android/image/',
                'allowed_types' => 'jpg|jpeg|png|bmp',
                'max_size' =>100000,
                'filename' => url_title($this->input->post('input-image',true))
            );

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('input-image')){
                echo $config['filename'];
            }else{
                echo "tel";
            }
        }

        public function tampilkanKabkot(){

            $data= $this->Model_Perusahaan->
            getKabkot($this->input->post('id_provinsi'))->result();

            $output = '<option value="-2" >Pilih Kabupaten Kota</option>';
                foreach($data as $d){

                    $output .= '<option value="'.$d->id_kabkot.'" >'.$d->nama_kabkot.'</option>';
                }

                echo $output;
        }

        public function cekNamaPerusahaan(){
                    $id_perusahaan = $this->input->post('id_perusahaaan');
                    $nama_perusahaan= $this->input->post('nama_perusahaan');

                    $sqlNamaPerusahaan ="SELECT * FROM perusahaan WHERE nama_perusahaan = '$nama_perusahaan'".
                                        "AND id_perusahaan != '$id_perusahaan'";


                    $periksaNamaPerusahaan = $this->Model_Perusahaan->generalSelect($sqlNamaPerusahaan)->result();


                    $addErorrName = '<script>var element = document.getElementById("IperusahaanName");
                                        element.classList.add("input-error");
                                    </script>';


                    $removeclassNama ='<script>
                                        var element = document.getElementById("IperusahaanName");
                                        element.classList.remove("input-error");
                                    </script>';


                    $enableSubmit = '<script>document.getElementById("bs").disabled = false;
                                     </script>';
                    $disableSubmit = '<script>document.getElementById("bs").disabled = true;
                                     </script>';

                    if (!empty($periksaNamaPerusahaan)){

                        //echo '<p id="qa" style="color: red">'.$nama_perusahaan.' sudah terdaftar</p>'.$addclass.$disableSubmit;

                       echo '<script> $("#qa").append("'.$nama_perusahaan.' sudah terdaftar")</script>'.$addErorrName.$disableSubmit;

                    }else{
                       // echo '<script>document.getElementById("qa").remove();</script>'.$removeclass.$enableSubmit;
                        echo '<script> $("#qa").empty()</script>'.$removeclassNama.$enableSubmit;;
                    }



                    //echo 1;
                //}


        }

        public function cekEmailPerusahaan(){
            $id_perusahaan = $this->input->post('id_perusahaaan');
            $email = $this->input->post('emaill');

            $sqlEmail = "SELECT * FROM perusahaan WHERE email = '$email'".
                "AND id_perusahaan != '$id_perusahaan'";

            $periksaEmail = $this->Model_Perusahaan->generalSelect($sqlEmail)->result();

            $addErorrEmail = '<script>var element = document.getElementById("emaill");
                                        element.classList.add("input-error");
                                    </script>';

            $removeclassEmail ='<script>
                                        var element = document.getElementById("emaill");
                                        element.classList.remove("input-error")</script>';

            $enableSubmit = '<script>document.getElementById("bs").disabled = false;
                                     </script>';
            $disableSubmit = '<script>document.getElementById("bs").disabled = true;
                                     </script>';

            if (!empty($periksaEmail)){
                echo '<script> $("#erroremail").append("'.$email.' sudah digunakan")</script>'.$addErorrEmail.$disableSubmit;

            }else{
                echo '<script> $("#erroremail").empty()</script>'.$removeclassEmail.$enableSubmit;;
            }





        }

   /* public function ceknamaLowongan(){
            $namaLowongan = $this->input('namaLowongan');
            $sql ="SELECT * FROM lowongan WHERE nama_lowongan = 'software engineer'";

            $udahAda = $this->Model_Perusahaan->generalSelect($sql)->result();

            $adderrorNama = '<script>var element = document.getElementById("namaLowongann");
                                        element.classList.add("input-error");
                                    </script>';
            $removeErrorNama ='<script>var element = document.getElementById("namaLowongann");
                                        element.classList.remove("input-error")</script>';


            $enableSubmit = '<script>document.getElementById("submitTambahLowongan").disabled = false;
                                     </script>';
            $disableSubmit = '<script>document.getElementById("submitTambahLowongan").disabled = true;
                                     </script>';


            //if (!empty($udahAda)){

                echo '<script> $("#masageNamaLowongan").append("axcc '.$namaLowongan.' sudah digunakan")</script>'.$adderrorNama.$disableSubmit;

            //}else{
                //echo '<script> $("#masageNamaLowongan").append("'.$namaLowongan.' sudah digunakan")</script>'.$removeErrorNama.$disableSubmit;

            //}
    }*/



    public function register(){

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $pass = $this->input->post('pass');

           $namaUdahAda =  $this->Model_Perusahaan->
           udahAda("perusahaan","nama_perusahaan", $nama);

           $emailUdahAda = $this->Model_Perusahaan->
           udahAda("user","email_user", $email);

           $usernameUdahAda = $this->Model_Perusahaan->
            udahAda("user","username", $username);


            $error = array(
               'massage_kosong' =>'',
               'massage_namaUdahAda' =>'',
               'massage_emailUdahAda'=>'',
               'massage_formatEmailSalah'=>'',
                'massage_usernameUdahAda'=>'',
           );

           //cek inputan kosong
            if(empty($nama) || empty($email) || empty($username)
                || empty($pass)){

                $error['massage_kosong']= "kolom tidak boleh kosong";

                //cek kalo nama udah ada
            }else if (!empty($namaUdahAda)){

                $error['massage_namaUdahAda']="Nama Perusahaan Sudah Ada";

                //cek kalo email udah ada
            }else if (!empty($emailUdahAda)){

                $error['massage_emailUdahAda']= "Email Sudah Ada";

            }else if (strpos($email, '@') == false){

                $error['massage_formatEmailSalah']="Format Email Salah";

            }else if (!empty($usernameUdahAda)){

                $error['massage_usernameUdahAda'] ="Username sudah Ada";

            }

            if ($error['massage_kosong']=="" &&
                $error['massage_namaUdahAda']==""&&
                $error['massage_emailUdahAda']==""&&
                $error['massage_formatEmailSalah']==""&&
                $error['massage_usernameUdahAda']==""){


                $this->Model_Perusahaan->createPerusahaan(
                    $nama,
                    $email,
                    $username,
                    md5($pass)
                );

                $this->load->view('Login');
            }else {

                $this->load->view('Registrasi',$error);
            }





        }

    public function test_modal(){
        //$this->load->view('Modal_Test');

        $destFile = "/../mobile-android/image/".$_FILES['file']['name'];
        move_uploaded_file( $_FILES['file']['tmp_name'], $destFile );
        
    }

}
