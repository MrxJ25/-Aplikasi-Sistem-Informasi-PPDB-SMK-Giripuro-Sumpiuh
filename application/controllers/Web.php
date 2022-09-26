<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public $data;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if (!isset($_SESSION['PMB_ID']))
        {
            $_SESSION['PMB_ID']='-NA-';
            $_SESSION['PMB_NAMA']='';
        }
        if (!isset($_SESSION['PopMsg']))
        {
            $_SESSION['PopMsg']='';
        }
        $h=$this->db->query("SELECT * FROM sekolah WHERE id=1");
        $this->data['SEKOLAH']=$h->row_array();
        $h=$this->db->query("SELECT * FROM jurusan WHERE idjurusan<>'XXX' ");
        $this->data['JURUSAN']=$h->result();
        $this->data['JMLJURUSAN']=$h->num_rows();

        $this->data['SHOWBANNER']=0;
        $this->data['MENUNYA']='beranda';
    }
	public function index()
	{
        $h=$this->db->query("SELECT * FROM sertifikat");
        $this->data['Sertifikat']=$h->result();
        $this->data['JmlSertifikat']=$h->num_rows();

        $h=$this->db->query("SELECT idberita, judul, namaadmin, tglpost, dibaca FROM berita WHERE aktif='Y' ORDER BY idberita DESC LIMIT 0,12");
        $this->data['Berita']=$h->result();
        $this->data['JmlBerita']=$h->num_rows();
        $this->data['SHOWBANNER']=1;
		$this->load->view('web_home', $this->data);
	}

    public function profil()
    {
        $h=$this->db->query("SELECT * FROM profil WHERE tampil='Y' ORDER BY idprofil ASC");
        $this->data['Profil']=$h->result();
        $this->data['JmlProfil']=$h->num_rows();
        $this->data['MENUNYA']='profil';
		$this->load->view('web_profil', $this->data);
    }

    public function berita($page=false)
    {
        if ($page===false) { $page=1;}
        $maxdata=12;
        $awal=($page - 1) * $maxdata;
        $p=array($awal, $maxdata);
        $h=$this->db->query("SELECT idberita, judul, namaadmin, tglpost, dibaca FROM berita WHERE aktif='Y' ORDER BY idberita DESC LIMIT ?,?", $p);
        $this->data['Berita']=$h->result();
        $this->data['JmlBerita']=$h->num_rows();

        $h=$this->db->query("SELECT COUNT(idberita) AS jml FROM berita WHERE aktif='Y'");
        $dt=$h->row_array();
        $jmlpage=ceil($dt['jml']/$maxdata);
        $link=base_url().'web/berita/';

        $this->load->model('Mymodel');
        $this->data['Paging']=$this->Mymodel->paging($link, $page, 5, $jmlpage);
        $this->data['MENUNYA']='berita';
		$this->load->view('web_berita', $this->data);
    }

    public function beritadetail($idberita=false)
    {
        if ($idberita===false) {  } else
        {
            $h=$this->db->query("SELECT * FROM berita WHERE idberita=?", $idberita);
            $this->data['Berita']=$h->row_array();
            if ($this->data['Berita']['dibaca']<2000000000)
            {
                $this->db->query("UPDATE berita SET dibaca=dibaca+1 WHERE idberita=?", $idberita);
                $this->data['Berita']['dibaca']++;
            }
            $h=$this->db->query("SELECT idberita, judul, namaadmin, tglpost, dibaca FROM berita WHERE aktif='Y' AND idberita<>? ORDER BY idberita DESC LIMIT 0,10", $idberita);
            $this->data['BeritaLain']=$h->result();
            $this->data['JmlBeritaLain']=$h->num_rows();
            $this->data['MENUNYA']='berita';
            $this->load->view('web_beritadetail', $this->data);
        }
    }

    public function bukutamu()
    {
        $h=$this->db->query("SELECT * FROM bukutamu WHERE tampil='Y' LIMIT 0,24");
        $this->data['BukuTamu']=$h->result();
        $this->data['JmlBk']=$h->num_rows();
        $this->data['MENUNYA']='bukutamu';
        $this->load->view('web_bukutamu', $this->data);
    }

    public function bukutamusv()
    {
        if (isset($_POST['nama']))
        {
            $_POST['nama']=htmlentities($_POST['nama'], ENT_QUOTES);
            $_POST['email']=htmlentities($_POST['email'], ENT_QUOTES);
            $_POST['komentar']=htmlentities($_POST['komentar'], ENT_QUOTES);
            $p=array($_POST['nama'], $_POST['email'], $_POST['komentar']);
            $this->db->query("INSERT INTO bukutamu (nama, email, komentar) VALUES (?, ?, ?)", $p);
            $this->data['MENUNYA']='bukutamu';
            $this->load->view('web_bukutamusv', $this->data);
        }
    }

    public function gurustaff()
    {
        $h=$this->db->query("SELECT * FROM gurustaff");
        $this->data['Guru']=$h->result();
        $this->data['JmlGuru']=$h->num_rows();
        $this->data['MENUNYA']='gurustaff';
        $this->load->view('web_gurustaff', $this->data);
    }

    public function kontak()
    {
        $this->data['MENUNYA']='kontak';
        $this->load->view('web_kontak', $this->data);
    }

    public function ppdb()
    {
        $this->data['MENUNYA']='ppdb';
        $this->load->view('web_ppdb', $this->data);
    }

    public function ppdb_daftar()
    {
        if (isset($_POST['email']))
        {
            $cek=$this->db->query("SELECT nodaftar FROM pendaftaran WHERE email=? LIMIT 0,1", $_POST['email']);
            if ($cek->num_rows()==0)
            {
                $this->load->model('Mymodel');
                //20211234
                $nodaftar=date('Y').$this->Mymodel->nomor_tok("NODAFTAR", 9999);
                $p=array($nodaftar, $_POST['nama'], $_POST['email'], md5($_POST['pass']));
                $this->db->query("INSERT INTO pendaftaran (nodaftar, nama, email, passwd)
                    VALUES (?, ?, ?, ?)", $p);
                $_SESSION['PMB_ID']=$nodaftar;
                $_SESSION['PMB_NAMA']=$_POST['nama'];
                $_SESSION['PopMsg']='Selamat datang '.$_POST['nama'].' di '.$this->data['SEKOLAH']['namasekolah'].'...!';
                redirect('ppdb/home');
            }
            else
            {
                $_SESSION['PopMsg']='Email sudah digunakan...';
            }
        }
        else
        {
            redirect('web/ppdb');
        }
    }

    public function ppdb_login()
    {
        if (isset($_POST['email']))
        {
            $p=array($_POST['email'], md5($_POST['pass']));
            $cek=$this->db->query("SELECT nodaftar, nama FROM pendaftaran WHERE email=? AND passwd=? LIMIT 0,1", $p);
            if ($cek->num_rows()==0)
            {
                $_SESSION['PopMsg']='Data tidak ditemukan';
                redirect('web/ppdb');
            }
            else
            {
                $d=$cek->row_array();
                $_SESSION['PMB_ID']=$d['nodaftar'];
                $_SESSION['PMB_NAMA']=$d['nama'];
                $_SESSION['PopMsg']='Selamat datang '.$d['nama'].' di '.$this->data['SEKOLAH']['namasekolah'].'...!';
                redirect('ppdb/home');
            }
        }
        else
        {
             redirect('web/ppdb');
        }
    }
}
?>
