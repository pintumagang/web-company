<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ('User.php');
class Perusahaan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Model_Perusahaan');
    }


    public function View_Beranda (){
        $this->load->view('Perusahaan_Home');
    }

    public function View_Pendaftar(){

        $dataPendaftar['pendaftar']	= $this->Model_Perusahaan->tampilkanPelamar()->result();

        $this->load->view('Perusahaan_Home', $dataPendaftar);
    }

    public function View_TambahLowongan(){

        $dataLowongan['daftarLowongan']= $this->Model_Perusahaan->getLowongan()->result();

        $this->load->view('Perusahaan_Home', $dataLowongan);

    }

    public function View_EditProfil(){

        $dataPerusahaan['dataPerusahaan']= $this->Model_Perusahaan->getPerusahaan()->result();
        $this->load->view('Perusahaan_Home', $dataPerusahaan);
    }
	public function view_register(){

        $this->load->view('Registrasi');

       /* if (isset($_POST["submit_daftar"])){
                $this->register();
        }*/
	}

    /**
     *
     */
    public function tampilkanCV(){

       $cv_id = $this->input->post('cv',true);

        $cv['data'] = $this->Model_Perusahaan->getCV($cv_id)->result();

        $this->load->view('CV',$cv);


    }

    public function periksaDaftarPelamar(){

        $id = $this->input->post('id',true);
        $status_periksa = $this->input->post('periksa',true);

        $this->Model_Perusahaan->updateStatusPemeriksaanPelamar($id,$status_periksa);

        redirect('Perusahaan/View_Pendaftar?module=Pendaftar');

    }

    public function statusDaftarLowongan(){

        $id = $this->input->post('id',true);
        $status_periksa = $this->input->post('periksa',true);

        $this->Model_Perusahaan->updateStatusLowongan($id,$status_periksa);

        //$this->load->view('Perusahaan_Home');
        redirect('Perusahaan/View_Pendaftar?module=TambahLowongan');

    }

    public function tambahLowongan(){


        $data = array(
            'nama_lowongan' => $this->input->post('namaLowongan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'dateline_submit' => $this->input->post('date'),
            'jenis_magang' => $this->input->post('jenisMagang'),
             'status' => $this->input->post('status'),
            'lokasi' => $this->input->post('lokasi')
        );


        $this->Model_Perusahaan->insertLowongan($data);
        redirect('Perusahaan/View_Pendaftar?module=TambahLowongan');

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

           $id = $this->input->post('id', true);
           $nama_lowongan = $this->input->post('namaLowongan2',true);
           $deskripsi =$this->input->post('deskripsi2', true);
           $time = $this->input->post('date2');
           $jenis_magang = $this->input->post('jenisMagang2', true);
           $lokasi =$this->input->post('lokasi2',true);
           $status = $this->input->post('status2',true);


        $this->Model_Perusahaan->updateLowonganM(
            $id,$nama_lowongan,$deskripsi,$time,$jenis_magang,$status,$lokasi
        );

        //$this->load->view('Perusahaan_Home');
        redirect('Perusahaan/View_Pendaftar?module=TambahLowongan');

    }

    public function hapusLowongan(){
        $id = $this->input->post('id', true);
        $this->Model_Perusahaan->hapusLowongan($id);
        //$this->load->view('Perusahaan_Home');
        redirect('Perusahaan/View_Pendaftar?module=TambahLowongan');
    }




    public function register(){

/*
        $nama_perusahaan = $this->input->post('nama_perusahaan',true);
        $nama_jalan = $this->input->post('nama_jalan',true);
        $provinsi = $this->input->post('provinsi',true);
        $kota = $this->input->post('kota',true);
        $negara = $this->input->post('negara',true);
        $kode_pos = $this->input->post('kode_pos',true);
        $no_tlp = $this->input->post('no_tlp',true);
        $email_daftar = $this->input->post('email_daftar',true);
        $username_daftar = $this->input->post('username_daftar',true);
        $password_daftar = $this->input->post('password_daftar',true);
        $jenis_industri = $this->input->post('jenis_industri',true);
        $website = $this->input->post('website',true);
	    $this->load->model('Model_Perusahaan');

	    $this->Model_Perusahaan->createPerusahaan($nama_perusahaan, $nama_jalan, $provinsi,
            $kota, $negara, $kode_pos, $no_tlp,
            $email_daftar, $username_daftar, $password_daftar, $jenis_industri, $website);*/

    }

    public function test_modal(){
        $this->load->view('Modal_Test');
    }

}
