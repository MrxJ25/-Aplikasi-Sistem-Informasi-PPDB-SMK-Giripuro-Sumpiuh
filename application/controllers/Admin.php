<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $data;
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if ((!isset($_SESSION['ADM_ID'])) || ($_SESSION['ADM_ID']==0)) 
        {
            redirect('admlogin');
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
        
        $this->data['MENUNYA']='beranda';
    }
	public function index()
	{
        $this->load->view('admin_home', $this->data);
	}
    
    public function logout()
    {
        $_SESSION['ADM_ID']=0;
        $_SESSION['ADM_NAMA']='';
        redirect('admlogin');
    }
    
    //BERITA
    public function berita()
    {
        
        $h=$this->db->query("SELECT idberita, judul, namaadmin, tglpost, dibaca, aktif FROM berita ORDER BY idberita DESC");
        $this->data['Berita']=$h->result();
        $this->data['JmlBerita']=$h->num_rows();
        
		$this->load->view('admin_berita', $this->data);
    }
    
    public function beritanew()
    {
        //cek apa ada data judul
		if (isset($_POST['judul']))
		{
			$dt=array($_POST['judul'], $_POST['isiberita'],
				$_POST['aktif'], $_POST['dibaca'], $_SESSION['ADM_NAMA']);
			$h=$this->db->query("INSERT INTO berita (judul, isiberita, aktif, dibaca,
                namaadmin)
				VALUES (?,?,?,?,?)",$dt);
			
			$id=$this->db->insert_id();
            $fn=$_FILES['gambarbs']['tmp_name'];
            $fz=$_FILES['gambarbs']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berita/'.$id.'_b.jpg');
            }
            $fn=$_FILES['gambarkc']['tmp_name'];
            $fz=$_FILES['gambarkc']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berita/'.$id.'_k.jpg');
            }
			redirect('admin/berita');
		}
		$this->load->view('admin_beritanew', $this->data);
    }
    //edit berita
	public function beritaedit($id=false)
	{
		if (isset($_POST['judul']))
        {
            $dt=array($_POST['judul'], addslashes($_POST['isiberita']), $_POST['aktif'], $_POST['dibaca'],  $_SESSION['ADM_NAMA'], $_POST['idberita']);
            $this->db->query("UPDATE berita SET judul=?, isiberita=?, aktif=?, dibaca=?, namaadmin=? WHERE idberita=?",$dt);
            $id=$_POST['idberita'];
			$fn=$_FILES['gambarbs']['tmp_name'];
            $fz=$_FILES['gambarbs']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berita/'.$id.'_b.jpg');
            }
            $fn=$_FILES['gambarkc']['tmp_name'];
            $fz=$_FILES['gambarkc']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berita/'.$id.'_k.jpg');
            }
            redirect('admin/berita');
        }
        if ($id===false) { } else
        {
            $hasil=$this->db->query("SELECT * FROM berita WHERE idberita=?",$id);
            $this->data['Berita']=$hasil->row_array();
            $this->load->view('admin_beritaedit',$this->data);
        }
	}
    //hapus berita
	public function beritadel($id=false)
	{
		
        if ($id===false)  { } else
        {
            $this->db->query("DELETE FROM berita WHERE idberita=?",$id);
            $f='./img/berita/'.$id.'_b.jpg';
            if (file_exists($f)) { unlink($f); }
            $f='./img/berita/'.$id.'_k.jpg';
            if (file_exists($f)) { unlink($f); }
            $_SESSION['PopMsg']='Berita telah dihapus';
            redirect('admin/berita');
        }
	}
    
    //GURU STAFF
    public function gurustaff()
    {
        
        $h=$this->db->query("SELECT * FROM gurustaff ORDER BY nama ASC");
        $this->data['Guru']=$h->result();
        $this->data['JmlGuru']=$h->num_rows();
        
		$this->load->view('admin_guru', $this->data);
    }
    
    public function gurustaffnew()
    {
        //cek apa ada data judul
		if (isset($_POST['nama']))
		{
			$dt=array($_POST['nama'], $_POST['tugas'],
				$_POST['facebook'], $_POST['instagram']);
			$h=$this->db->query("INSERT INTO gurustaff (nama, tugas, facebook, instagram)
				VALUES (?,?,?,?)",$dt);
			
			$id=$this->db->insert_id();
            $fn=$_FILES['foto']['tmp_name'];
            $fz=$_FILES['foto']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/guru/'.$id.'.jpg');
            }
			redirect('admin/gurustaff');
		}
		$this->load->view('admin_gurunew', $this->data);
    }
    //edit gurustaff
	public function gurustaffedit($id=false)
	{
		if (isset($_POST['nama']))
        {
            $dt=array($_POST['nama'], $_POST['tugas'], $_POST['facebook'], $_POST['instagram'], $_POST['idgurustaff']);
            $this->db->query("UPDATE gurustaff SET nama=?, tugas=?, facebook=?, instagram=? WHERE idgurustaff=?",$dt);
            $id=$_POST['idgurustaff'];
			$fn=$_FILES['foto']['tmp_name'];
            $fz=$_FILES['foto']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/guru/'.$id.'.jpg');
            }
            redirect('admin/gurustaff');
        }
        if ($id===false) { } else
        {
            $hasil=$this->db->query("SELECT * FROM gurustaff WHERE idgurustaff=?",$id);
            $this->data['Guru']=$hasil->row_array();
            $this->load->view('admin_guruedit',$this->data);
        }
	}
    //hapus gurustaff
	public function gurustaffdel($id=false)
	{
		
        if ($id===false)  { } else
        {
            $this->db->query("DELETE FROM gurustaff WHERE idgurustaff=?",$id);
            $f='./img/guru/'.$id.'.jpg';
            if (file_exists($f)) { unlink($f); }
            $_SESSION['PopMsg']='Guru dan staff telah dihapus';
            redirect('admin/gurustaff');
        }
	}

    //jurusan
    public function jurusan()
    {
        
        $h=$this->db->query("SELECT * FROM jurusan WHERE idjurusan<>'XXX' ORDER BY idjurusan ASC");
        $this->data['Jurusan']=$h->result();
        $this->data['JmlJurusan']=$h->num_rows();
        
		$this->load->view('admin_jurusan', $this->data);
    }
    
    public function jurusannew()
    {
        //cek apa ada data judul
		if (isset($_POST['namajurusan']))
		{
            $_POST['idjurusan']=strtoupper($_POST['idjurusan']);
            $cek=$this->db->query("SELECT * FROM jurusan WHERE idjurusan=?", $_POST['idjurusan']);
            if ($cek->num_rows()==0)
            {
			     $dt=array($_POST['idjurusan'], $_POST['namajurusan'], $_POST['ppdbsiswa']);
			     $h=$this->db->query("INSERT INTO jurusan (idjurusan, namajurusan, ppdbsiswa) VALUES (?,?,?)",$dt);
			     redirect('admin/jurusan');
            }
            else
            {
                 $_SESSION['PopMsg']='Kode Jurusan sudah dipakai';
            }
        }
		$this->load->view('admin_jurusannew', $this->data);
    }
        
    //edit jurusan
	public function jurusanedit($id=false)
	{
		if (isset($_POST['idjurusan']))
        {
            $dt=array($_POST['namajurusan'], $_POST['ppdbsiswa'], $_POST['idjurusan']);
            $this->db->query("UPDATE jurusan SET namajurusan=?, ppdbsiswa=? WHERE idjurusan=?",$dt);
            redirect('admin/jurusan');
        }
        if ($id===false) { } else
        {
            $hasil=$this->db->query("SELECT * FROM jurusan WHERE idjurusan=?",$id);
            $this->data['Jurusan']=$hasil->row_array();
            $this->load->view('admin_jurusanedit',$this->data);
        }
	}
    //hapus jurusan
	public function jurusandel($id=false)
	{
		
        if ($id===false)  { } else
        {
            $this->db->query("DELETE FROM jurusan WHERE idjurusan=?",$id);
            $_SESSION['PopMsg']='Jurusan sudah dihapus';
            redirect('admin/jurusan');
        }
	}

    //Buku tamu
    public function bukutamu()
    {
        
        $h=$this->db->query("SELECT * FROM bukutamu ORDER BY idbktamu DESC");
        $this->data['BkTamu']=$h->result();
        $this->data['JmlBkTamu']=$h->num_rows();
        
		$this->load->view('admin_bktamu', $this->data);
    }
    //edit jurusan
	public function bukutamuedit($id=false)
	{
		if (isset($_POST['idbktamu']))
        {
            $dt=array(htmlentities($_POST['komentar'], ENT_QUOTES), $_POST['tampil'], $_POST['idbktamu']);
            $this->db->query("UPDATE bukutamu SET komentar=?, tampil=? WHERE idbktamu=?",$dt);
            redirect('admin/bukutamu');
        }
        if ($id===false) { } else
        {
            $hasil=$this->db->query("SELECT * FROM bukutamu WHERE idbktamu=?",$id);
            $this->data['BkTamu']=$hasil->row_array();
            $this->load->view('admin_bktamuedit',$this->data);
        }
	}
    public function bukutamudel($id=false)
	{
		
        if ($id===false)  { } else
        {
            $this->db->query("DELETE FROM bukutamu WHERE idbktamu=?",$id);
            $_SESSION['PopMsg']='Buku tamu sudah dihapus';
            redirect('admin/bukutamu');
        }
	}
    
    //profil
    public function profil()
    {
        
        $h=$this->db->query("SELECT * FROM profil");
        $this->data['Profil']=$h->result();
        $this->data['JmlProfil']=$h->num_rows();
        
		$this->load->view('admin_profil', $this->data);
    }
    
    public function profilnew()
    {
        //cek apa ada data judul
		if (isset($_POST['judul']))
		{
            $dt=array($_POST['judul'], addslashes($_POST['deskripsi']), $_POST['tampil']);
			     $h=$this->db->query("INSERT INTO profil (judul, deskripsi, tampil) VALUES (?,?,?)",$dt);
			     redirect('admin/profil');
        }
		$this->load->view('admin_profilnew', $this->data);
    }
        
    //edit profil
	public function profiledit($id=false)
	{
		if (isset($_POST['idprofil']))
        {
            $dt=array($_POST['judul'], addslashes($_POST['deskripsi']), $_POST['tampil'], $_POST['idprofil']);
            $this->db->query("UPDATE profil SET judul=?, deskripsi=?, tampil=? WHERE idprofil=?",$dt);
            redirect('admin/profil');
        }
        if ($id===false) { } else
        {
            $hasil=$this->db->query("SELECT * FROM profil WHERE idprofil=?",$id);
            $this->data['Profil']=$hasil->row_array();
            $this->load->view('admin_profiledit',$this->data);
        }
	}
    //hapus profil
	public function profildel($id=false)
	{
		
        if ($id===false)  { } else
        {
            $this->db->query("DELETE FROM profil WHERE idprofil=?",$id);
            $_SESSION['PopMsg']='Profil sudah dihapus';
            redirect('admin/profil');
        }
	}
    
    //sertifikat
    public function sertifikat()
    {
        
        $h=$this->db->query("SELECT * FROM sertifikat");
        $this->data['Sertifikat']=$h->result();
        $this->data['JmlSertifikat']=$h->num_rows();
        
		$this->load->view('admin_sertifikat', $this->data);
    }
    
    public function sertifikatnew()
    {
        //cek apa ada data judul
		if (isset($_POST['nama']))
		{
			$dt=array();
			$h=$this->db->query("INSERT INTO sertifikat (nama)
				VALUES (?)",$_POST['nama']);
			
			$id=$this->db->insert_id();
            $fn=$_FILES['foto']['tmp_name'];
            $fz=$_FILES['foto']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/sert_'.$id.'.png');
            }
			redirect('admin/sertifikat');
		}
		$this->load->view('admin_sertifikatnew', $this->data);
    }
    //edit sertifikat
	public function sertifikatedit($id=false)
	{
		if (isset($_POST['nama']))
        {
            $dt=array($_POST['nama'], $_POST['idsertifikat']);
            $this->db->query("UPDATE sertifikat SET nama=? WHERE idsertifikat=?",$dt);
            $id=$_POST['idsertifikat'];
			$fn=$_FILES['foto']['tmp_name'];
            $fz=$_FILES['foto']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/sert_'.$id.'.png');
            }
            redirect('admin/sertifikat');
        }
        if ($id===false) { } else
        {
            $hasil=$this->db->query("SELECT * FROM sertifikat WHERE idsertifikat=?",$id);
            $this->data['Sertifikat']=$hasil->row_array();
            $this->load->view('admin_sertifikatedit',$this->data);
        }
	}
    //hapus sertifikat
	public function sertifikatdel($id=false)
	{
		
        if ($id===false)  { } else
        {
            $this->db->query("DELETE FROM sertifikat WHERE idsertifikat=?",$id);
            $f='./img/sert_'.$id.'.png';
            if (file_exists($f)) { unlink($f); }
            $_SESSION['PopMsg']='Sertifikat telah dihapus';
            redirect('admin/sertifikat');
        }
	}
    
    //ADMINISTRATOR
    public function dtadmin()
    {
        $h=$this->db->query("SELECT * FROM admin WHERE idadmin>1 ORDER BY namaadmin ASC");
        $this->data['Admin']=$h->result();
        $this->load->view('admin_dtadmin',$this->data);
    }
    public function dtadminnew()
    {

        if (isset($_POST['nama']))
        {
            
            $p=array($_POST['nama'], $_POST['login'], md5($_POST['passwd']));
            $this->db->query("INSERT INTO admin (namaadmin, login, passwd) VALUES (?,?,?)",$p);
            $id=$this->db->insert_id();
            $fn=$_FILES['foto']['tmp_name'];
            $fz=$_FILES['foto']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn,'./img/admin_'.$id.'.jpg');
            }        
            redirect('admin/dtadmin'); 
        }
        $this->load->view('admin_dtadminnew',$this->data);
    }
    public function dtadminedit($id=false)
    {

        if (isset($_POST['idadmin']))
        {
            if ($_POST['passwd']=='')
            {
                $p=array($_POST['nama'], $_POST['login'], $_POST['idadmin']);
                $this->db->query("UPDATE admin SET namaadmin=?, login=?
                WHERE idadmin=?",$p);
            }
            else
            {
                $p=array($_POST['nama'], $_POST['login'], md5($_POST['passwd']), $_POST['idadmin']);
                $this->db->query("UPDATE admin SET namaadmin=?, login=?, passwd=?
                WHERE idadmin=?",$p);
            }    
            $fn=$_FILES['foto']['tmp_name'];
            $fz=$_FILES['foto']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn,'./img/admin_'.$_POST['idadmin'].'.jpg');
            }        
            redirect('admin/dtadmin'); 
        }
        if ($id===false) { } else
        {
            
            $h=$this->db->query("SELECT * FROM admin WHERE idadmin=?",$id);
            $this->data['Admin']=$h->row_array();
            $this->load->view('admin_dtadminedit',$this->data);
        }
    }
    //hapus admin
    public function dtadmindel($id=false)
    {
        if (($id===false) || ($id==1) )
        { 
            // diam
        }
        else
        {
            $h=$this->db->query("DELETE FROM admin WHERE idadmin=?",$id);
            $f='./img/admin_'.$id.'.jpg';
            if (file_exists($f)) { unlink($f); }
            redirect('admin/dtadmin');
        }
    }
    
    //admin ubah pass
    public function ubahpass()
    {
        if (isset($_POST['namaadmin']))
        {
            if ($_POST['passwd']=='')
            {
                $p=array($_POST['namaadmin'], $_POST['login'], $_SESSION['ADM_ID']);
                $this->db->query("UPDATE admin SET namaadmin=?, login=? WHERE idadmin=?",$p);
            }
            else
            {
                $p=array($_POST['namaadmin'], $_POST['login'], md5($_POST['passwd']), $_SESSION['ADM_ID']);
                $this->db->query("UPDATE karyawan SET namaadmin=?, login=?, passwd=? WHERE idadmin=?",$p);
            }    
            $fn=$_FILES['foto']['tmp_name'];
            $fz=$_FILES['foto']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn,'./img/admin_'.$_SESSION['ADM_ID'].'.jpg');
            }  
            $_SESSION['ADM_NAMA']=$_POST['namaadmin'];   
            $_SESSION['PopMsg']='Perubahan data tersimpan';
        }
        $h=$this->db->query("SELECT * FROM admin WHERE idadmin=?",$_SESSION['ADM_ID']);
        $this->data['Admin']=$h->row_array();
        $this->load->view('admin_ubahpass',$this->data);
    }
    
    public function sekolah()
    {
        if (isset($_POST['namasekolah']))
        {
           $p=array($_POST['namasekolah'], $_POST['alamat'], $_POST['kota'], $_POST['telepon'], $_POST['teleponwa'], $_POST['email'], $_POST['facebook'], $_POST['instagram'], $_POST['youtube'], $_POST['gmap'], $_POST['intro'], $_POST['ppdbaktif'], $_POST['ppdbmulai'], $_POST['ppdbselesai']);
           
           $this->db->query("UPDATE sekolah  SET namasekolah=?, alamat=?, kota=?, telepon=?, teleponwa=?, email=?, facebook=?, instagram=?, youtube=?, gmap=?, intro=?, ppdbaktif=?, ppdbmulai=?, ppdbselesai=? WHERE id=1",$p);
          
           $_SESSION['PopMsg']='Perubahan data tersimpan';
        }
        $h=$this->db->query("SELECT * FROM sekolah WHERE id=1");
        $this->data['Skl']=$h->row_array();
        $this->load->view('admin_sekolah',$this->data);
    }
    
    
    //PPDB
    public function ppdb()
    {
        $r=array();
        $h=$this->db->query("SELECT * FROM jurusan ORDER BY idjurusan ASC");
        $this->data['Jurusan']=$h->result();
        foreach($this->data['Jurusan'] as $j)
        {
            $h=$this->db->query("SELECT nodaftar, nama, score, tglbayar, tglverifikasi FROM pendaftaran WHERE idjurusan=? ORDER BY score DESC", $j->idjurusan);
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
                        'score'=>$d->score,
                        'tglbayar'=>$d->tglbayar,
                        'tglverifikasi'=>$d->tglverifikasi
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
        $this->load->view('admin_ppdb', $this->data);
    }
    
    public function ppdbctk($idjurusan=false)
    {
        if ($idjurusan===false) { } else
        {
            $r=array();
            $h=$this->db->query("SELECT * FROM jurusan WHERE idjurusan=?",$idjurusan);
            $this->data['Jurusan']=$h->row_array();
            
            $h=$this->db->query("SELECT nodaftar, nama, score FROM pendaftaran WHERE idjurusan=? ORDER BY score DESC", $idjurusan);
            $jm=$h->num_rows();
            if ($jm>0)
            {
                $r['JmlData']=$jm;
                $dt=$h->result();
                $x=0;
                foreach ($dt as $d)
                {
                    $r['Data'][$x]=array(
                        'nodaftar'=>$d->nodaftar,
                        'nama'=>$d->nama,
                        'score'=>$d->score
                    );
                    $x++;
                }
            }
            else
            {
                $r['JmlData']=0;
                $r['Data']=array();
            }
            

            $this->data['Seleksi']=$r;
            $this->load->view('admin_ppdbctk', $this->data);
        }
    }
    
	public function ppdb_lap()
    {
        
            
            $h=$this->db->query("SELECT a.nodaftar, a.nama, a.idjurusan, a.tglbayar, a.jmlbayar, 
				a.tglverifikasi, a.idadmin, a.idbank, b.namabank, b.norekening, c.namaadmin 
				FROM pendaftaran AS a, bank AS b, admin AS c
				WHERE a.idadmin>1 AND a.idbank=b.idbank AND a.idadmin=c.idadmin ORDER BY a.tglbayar ASC");
            $this->data['Jm']=$h->num_rows();
			$this->data['Bayar']=$h->result();
            
            $this->load->view('admin_ppdblap', $this->data);
        
    }
	
    //calon sisa detail
    public function calondetail($nodaftar=false)
    {
        if ($nodaftar===false) { } else
        {
            $h=$this->db->query("SELECT * FROM bank WHERE idbank>1");
            $this->data['Bank']=$h->result();
            
            $h=$this->db->query("SELECT a.*, b.namajurusan, c.namaadmin FROM pendaftaran AS a, jurusan AS b, admin AS c  WHERE a.nodaftar=? AND a.idjurusan=b.idjurusan AND a.idadmin=c.idadmin LIMIT 0,1", $nodaftar);
            $this->data['Calon']=$h->row_array();
            $h=$this->db->query("SELECT * FROM prestasi WHERE nodaftar=?", $nodaftar);
            $this->data['Prestasi']=$h->result();
            $this->data['JmlPrestasi']=$h->num_rows();
            $this->load->view('admin_calondetail', $this->data);
        }
    }
    
    //calon sisa detail cetak
    public function calondetail_ctk($nodaftar=false)
    {
        if ($nodaftar===false) { } else
        {
            
            $h=$this->db->query("SELECT a.*, b.namajurusan FROM pendaftaran AS a, jurusan AS b WHERE a.nodaftar=? AND a.idjurusan=b.idjurusan LIMIT 0,1", $nodaftar);
            $this->data['Calon']=$h->row_array();
            $h=$this->db->query("SELECT * FROM prestasi WHERE nodaftar=?", $nodaftar);
            $this->data['Prestasi']=$h->result();
            $this->data['JmlPrestasi']=$h->num_rows();
            $this->load->view('admin_calondetail_ctk', $this->data);
        }
    }
    
    public function ppdbbayar()
    {
        if (isset($_POST['nodaftar']))
        {
            $fn=$_FILES['bukti']['tmp_name'];
            $fz=$_FILES['bukti']['size'];
            if ($fz>0)
            {
                move_uploaded_file($fn, './img/berkas/'.$_POST['nodaftar'].'_bayar.jpg');

                $p=array($_POST['tglbayar'], $this->data['SEKOLAH']['biayappdb'], $_POST['idbank'], date('Y-m-d'), $_SESSION['ADM_ID'], $_POST['nodaftar']);
                $this->db->query("UPDATE pendaftaran SET tglbayar=?, jmlbayar=?, idbank=?, tglverifikasi=?, idadmin=? WHERE nodaftar=?", $p);
                redirect('admin/calondetail/'.$_POST['nodaftar']);
            }
            else
            {
                $_SESSION['PopMsg']='Gagal mengupload bukti pembayaran';
            }
        }
    }
    public function ppdbveri($nodaftar=false)
    {
        if ($nodaftar===false) { } else
        {
            $p=array(date('Y-m-d'), $_SESSION['ADM_ID'], $nodaftar);
            $this->db->query("UPDATE pendaftaran SET tglverifikasi=?, idadmin=? WHERE nodaftar=?", $p);
            $_SESSION['PopMsg']='Pembayaran telah diverifikasi';
            redirect('admin/calondetail/'.$nodaftar);
        }
    }
    //hapus ppdb
    public function ppdb_reset()
    {
        $this->db->query("TRUNCATE TABLE pendaftaran");
        $this->db->query("TRUNCATE TABLE prestasi");
        $dirname='./img/berkas';
        if (is_dir($dirname))
        {
            $dir_handle = opendir($dirname);
        }
        if ($dir_handle)
        {
            while($file = readdir($dir_handle)) 
            {
                if ($file != "." && $file != "..") 
                {
                    if (!is_dir($dirname."/".$file))
                    { unlink($dirname."/".$file); }
                }
           }
            
        }
        closedir($dir_handle);
        
        $_SESSION['PopMsg']='Data PPDB sudah ksosong...';
        redirect('admin/ppdb');
    }
}
?>