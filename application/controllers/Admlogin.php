<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admlogin extends CI_Controller {

	public $data;
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if (!isset($_SESSION['ADM_ID'])) 
        { 
            $_SESSION['ADM_ID']=0;
            $_SESSION['ADM_NAMA']='';
        }
          
        if (!isset($_SESSION['PopMsg'])) 
        {
            $_SESSION['PopMsg']='';
        }
        $h=$this->db->query("SELECT * FROM sekolah WHERE id=1");
        $this->data['SEKOLAH']=$h->row_array();
        
    }
            
	public function index()
	{
        if (isset($_POST['login']))
        {
           $dt=array($_POST['login'], md5($_POST['passwd'])) ;
           $hasil=$this->db->query("SELECT * FROM admin WHERE login=? AND passwd=?",$dt);
           if ($hasil->num_rows()>0)
           {
               
               $d=$hasil->row_array();
               $_SESSION['ADM_ID']=$d['idadmin'];
               $_SESSION['ADM_NAMA']=$d['namaadmin'];
               redirect('admin');
           }
           else
           {
               
                $_SESSION['PopMsg']='Gagal login, pastikan user name dan password benar';
           }
        }
		$this->load->view('admin_login', $this->data);
	}
}
?>