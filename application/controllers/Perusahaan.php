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

            $this->load->view('Perusahaan_Home', $data);


        }


    }


	public function view_register(){

        if ($this->session->userdata('user') == FALSE && $this->session->userdata('logged_in') == FALSE ) {
            $this->load->view('Registrasi');
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




            $this->Model_Perusahaan->updateProfilPerusahaan(
                $gambar,
                $this->input->post('namaPerusahaan', true),
                $this->input->post('jalan', true),
                $this->input->post('linkWebsite', true),
                $this->input->post('idPerusahaan', true),
                $this->input->post('provinsi', true),
                $this->input->post('kabkot', true),
                $this->input->post('email', true),
                $this->input->post('industri', true)
                );

            $this->Model_Perusahaan->updateEmailPerusahaan(
                $this->input->post('email', true),
                $this->input->post('idUser', true)
            );

            /*$this->Model_Perusahaan->updateProvinsiPerusahaan(
                $this->input->post('provinsi', true),
                $this->input->post('idPerusahaan', true)

            );


            $this->Model_Perusahaan->updateKabkotPerusahaan(
                $this->input->post('kota', true),
                $this->input->post('idPerusahaan', true)

            );*/

            redirect('Perusahaan/View_EditProfil?module=EditProfil');
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

            $output = '<option value="" >pilih kabupaten kota</option>';
                foreach($data as $d){

                    $output .= '<option value="'.$d->id_kabkot.'" >'.$d->nama_kabkot.'</option>';
                }

                echo $output;
        }



        public function register(){

            $idprovinsidankabkot = 0;
            $this->Model_Perusahaan->createPerusahaan(
                $this->input->post('nama'),
                $this->input->post('email'),
                $this->input->post('username'),
                md5($this->input->post('pass')),
                $idprovinsidankabkot
            );

            $this->load->view('Login');
        }

    public function test_modal(){
        //$this->load->view('Modal_Test');

        $destFile = "/../mobile-android/image/".$_FILES['file']['name'];
        move_uploaded_file( $_FILES['file']['tmp_name'], $destFile );
        
    }

}
