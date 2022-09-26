<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

	public $data;
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if ((!isset($_SESSION['PMB_ID'])) || ($_SESSION['PMB_ID']=='-NA-')) 
        {
            redirect('web/ppdb');
        }
        if (!isset($_SESSION['PopMsg'])) 
        {
            $_SESSION['PopMsg']='';
        }
        $h=$this->db->query("SELECT * FROM sekolah WHERE id=1");
        $this->data['SEKOLAH']=$h->row_array();
        $t=date('Y-m-d');
        if ( ($t>=$this->data['SEKOLAH']['ppdbmulai']) && ($t<=$this->data['SEKOLAH']['ppdbselesai']) )
        {
             $this->data['PPDBOK']=1;
        }
        else
        {
             $this->data['PPDBOK']=0;
        }
        $h=$this->db->query("SELECT * FROM pendaftaran WHERE nodaftar=?",$_SESSION['PMB_ID']);
        $this->data['CALON']=$h->row_array();
        
        $h=$this->db->query("SELECT * FROM jurusan WHERE idjurusan<>'XXX'");
        $this->data['JURUSAN']=$h->result();
        $this->data['JMLJURUSAN']=$h->num_rows();
        $this->data['MENUNYA']='beranda';
    }
	public function index()
	{
        $h=$this->db->query("SELECT a.idjurusan, b.ppdbsiswa, COUNT(a.nodaftar) AS jml FROM pendaftaran AS a, jurusan AS b WHERE a.idjurusan=b.idjurusan GROUP BY a.idjurusan");
        $this->data['Statistik']=$h->result();
        $this->data['JmlStatistik']=$h->num_rows();
		$this->load->view('ppdb_home', $this->data);
	}
    
    public function home()
    {
        $this->index();
    }
    
    public function logout()
    {
        $_SESSION['PMB_ID']='-NA-';
        $_SESSION['PMB_NAMA']='';
        redirect('web');
    }
    public function akun()
    {
        $this->data['MENUNYA']='akun';
        $this->load->view('ppdb_akun', $this->data);
    }
    public function akunsv()
    {
        if (!isset($_POST['nama'])) { redirect('ppdb/akun'); } else
        {
            $p=array($_POST['nama'], $_POST['jeniskel'], $_POST['tmplahir'], $_POST['tgllahir'], $_POST['alamat'], $_POST['kota'], $_POST['telepon'], $_POST['asalsekolah'], $_POST['kotasekolah'], $_POST['namaayah'], $_POST['pekerjaanayah'], $_POST['teleponayah'], $_POST['namaibu'], $_POST['pekerjaanibu'], $_POST['teleponibu'], $_POST['namawali'], $_POST['pekerjaanwali'], $_POST['teleponwali'], $_SESSION['PMB_ID']);
            $this->db->query("UPDATE pendaftaran SET nama=?, jeniskel=?, tmplahir=?, tgllahir=?, alamat=?, kota=?, telepon=?, asalsekolah=?, kotasekolah=?, namaayah=?, pekerjaanayah=?, teleponayah=?, namaibu=?, pekerjaanibu=?, teleponibu=?, namawali=?, pekerjaanwali=?, teleponwali=? WHERE nodaftar=?", $p);
            $fn=$_FILES['foto']['tmp_name'];
            $fz=$_FILES['foto']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berkas/'.$_SESSION['PMB_ID'].'_foto.jpg');
            }
            $_SESSION['PopMsg']='Perubahan data tersimpan';
        }
        redirect('ppdb/akun');
    }
    
    public function berkas()
    {
        $h=$this->db->query("SELECT * FROM bank WHERE idbank>1");
        $this->data['Bank']=$h->result();
        
        $h=$this->db->query("SELECT * FROM prestasi WHERE nodaftar=?", $_SESSION['PMB_ID']);
        $this->data['Prestasi']=$h->result();
        $this->data['JmlPrestasi']=$h->num_rows();
        $this->data['MENUNYA']='berkas';
        $this->load->view('ppdb_berkas', $this->data);
    }
    
    public function berkas_ctk()
    {
        $h=$this->db->query("SELECT * FROM jurusan WHERE idjurusan=?",$this->data['CALON']['idjurusan']);
        $this->data['Jurusan']=$h->row_array();
        $h=$this->db->query("SELECT * FROM bank WHERE idbank=?",$this->data['CALON']['idbank']);
        $this->data['Bank']=$h->row_array();
        $h=$this->db->query("SELECT * FROM prestasi WHERE nodaftar=?", $_SESSION['PMB_ID']);
        $this->data['Prestasi']=$h->result();
        $this->data['JmlPrestasi']=$h->num_rows();
        $this->load->view('ppdb_berkas_ctk', $this->data);
    }
    public function bayar()
    {
        if (isset($_POST['tglbayar']))
        {
            $fn=$_FILES['bukti']['tmp_name'];
            $fz=$_FILES['bukti']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berkas/'.$_SESSION['PMB_ID'].'_bayar.jpg');

                $p=array($_POST['tglbayar'], $this->data['SEKOLAH']['biayappdb'], $_POST['idbank'], $_SESSION['PMB_ID']);
                $this->db->query("UPDATE pendaftaran SET tglbayar=?, jmlbayar=?, idbank=? WHERE nodaftar=?", $p);
                redirect('ppdb/berkas');
            }
            else
            {
                $_SESSION['PopMsg']='Gagal mengupload bukti pembayaran';
            }
        }
        else
        {
            redirect('ppdb/berkas');
        }
    }
    public function berkassv()
    {
        if (!isset($_POST['idjurusan'])) { redirect('ppdb/berkas'); } else
        {
            $p=array($_POST['idjurusan'], $_POST['nilaiijazah'], $_POST['nilaiun'], $_SESSION['PMB_ID']);
            $this->db->query("UPDATE pendaftaran SET idjurusan=?, nilaiijazah=?, nilaiun=?,
            score=(nilaiijazah+nilaiun+sertifikat) WHERE nodaftar=?", $p);
            $fn=$_FILES['ijazah']['tmp_name'];
            $fz=$_FILES['ijazah']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berkas/'.$_SESSION['PMB_ID'].'_ijazah.jpg');
            }
            $fn=$_FILES['un']['tmp_name'];
            $fz=$_FILES['un']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berkas/'.$_SESSION['PMB_ID'].'_un.jpg');
            }
            $fn=$_FILES['kk']['tmp_name'];
            $fz=$_FILES['kk']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berkas/'.$_SESSION['PMB_ID'].'_kk.jpg');
            }
            $_SESSION['PopMsg']='Perubahan data tersimpan';
        }
        redirect('ppdb/berkas');
    }
    
    public function prestasisv()
    {
        if (!isset($_POST['keterangan'])) { redirect('ppdb/berkas'); } else
        {
            $nilai=($_POST['tingkat']+1 * 5) + ($_POST['peringkat']+1);
            
            
            $this->load->model('Mymodel');
            //210612345678
            $id=date('Y').$this->Mymodel->nomor_tok('IDPRES', 99999999);
            $p=array($id,  $_SESSION['PMB_ID'], $_POST['keterangan'], $_POST['tingkat'], $_POST['peringkat'], $nilai);
            $this->db->query("INSERT INTO prestasi (idprestasi, nodaftar, keterangan, tingkat, peringkat, nilai) VALUES (?, ?, ?, ?, ?, ?)", $p);
            $fn=$_FILES['sertifikat']['tmp_name'];
            $fz=$_FILES['sertifikat']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berkas/'.$_SESSION['PMB_ID'].'_sert_'.$id.'.jpg');
            }
            //update nilai
            $h=$this->db->query("SELECT SUM(nilai) AS jml FROM prestasi WHERE nodaftar=?", $_SESSION['PMB_ID']);
            $dt=$h->row_array();
            $p=array($dt['jml'], $_SESSION['PMB_ID']);
            $this->db->query("UPDATE pendaftaran SET sertifikat=?,
            score=(nilaiijazah+nilaiun+sertifikat) WHERE nodaftar=?", $p);
            
            $_SESSION['PopMsg']='Perubahan data tersimpan';
        }
        redirect('ppdb/berkas');
    }
    
    public function prestasi_del($id=false)
    {
        if ($id===false) { } else
        {
            $this->db->query("DELETE FROM prestasi WHERE idprestasi=?", $id);
            $f='./img/berkas/'.$_SESSION['PMB_ID'].'_sert_'.$id.'.jpg';
            if (file_exists($f)) { unlink($f);}
            
            $h=$this->db->query("SELECT SUM(nilai) AS jml FROM prestasi WHERE nodaftar=?", $_SESSION['PMB_ID']);
            $dt=$h->row_array();
            $p=array($dt['jml'], $_SESSION['PMB_ID']);
            $this->db->query("UPDATE pendaftaran SET sertifikat=?,
            score=(nilaiijazah+nilaiun+sertifikat) WHERE nodaftar=?", $p);
                
        }
        redirect('ppdb/berkas');
    }
    public function seleksi()
    {
        $r=array();
        foreach($this->data['JURUSAN'] as $j)
        {
            $h=$this->db->query("SELECT nodaftar, nama, score FROM pendaftaran WHERE idjurusan=? ORDER BY score DESC", $j->idjurusan);
            $jm=$h->num_rows();
            if ($jm>0)
            {
                $r[$j->idjurusan]['JmlData']=$jm;
                $dt=$h->result();
                $x=0;
                foreach ($dt as $d)
                {
                    $r[$j->idjurusan]['Data'][$x]=array(
                        'nodaftar'=>$d->nodaftar,
                        'nama'=>$d->nama,
                        'score'=>$d->score
                    );
                    $x++;
                }
            }
            else
            {
                $r[$j->idjurusan]['JmlData']=0;
                $r[$j->idjurusan]['Data']=array();
            }
        }
        
        $this->data['Seleksi']=$r;
        $this->data['MENUNYA']='seleksi';
        $this->load->view('ppdb_seleksi', $this->data);
    }
}
?>