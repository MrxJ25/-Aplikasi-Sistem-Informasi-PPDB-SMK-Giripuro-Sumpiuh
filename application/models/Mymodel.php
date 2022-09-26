<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {

    public function nomor_tok($key=false, $max=false)
    {
        //bilin nomor
        $h=$this->db->query("SELECT * FROM autonum WHERE akey=? LIMIT 0,1",$key);
        if ($h->num_rows()==0)
        {
            $i=1;
            $this->db->query("INSERT INTO autonum (akey, aval) VALUES (?,1)",$key);
        }
        else
        {
            $d=$h->row_array();
            $i=$d['aval']+1;
            if ($i>$max) { $i=1;}
            $this->db->query("UPDATE autonum SET aval=? WHERE akey=?", array($i, $key));
        }
        $l=strlen($max);
        $id=sprintf('%0'.$l.'d',$i);
        return $id;
    }
    
    public function bikin_nomor($key=false, $max=false)
    {
        //bilin nomor
        $h=$this->db->query("SELECT * FROM autonum WHERE akey=? LIMIT 0,1",$key);
        if ($h->num_rows()==0)
        {
            $i=1;
            $this->db->query("INSERT INTO autonum (akey, aval) VALUES (?,1)",$key);
        }
        else
        {
            $d=$h->row_array();
            $i=$d['aval']+1;
            if ($i>$max) { $i=1;}
            $this->db->query("UPDATE autonum SET aval=? WHERE akey=?", array($i, $key));
        }
        $l=strlen($max);
        $id=sprintf('%0'.$l.'d',$i);
        $id=date('ymd').$id;
        return $id;
    }
    
    public function tgltext($tgl=false)
    {
        $bln=array(
            '01'=>'Januari',
            '02'=>'Februari',
            '03'=>'Maret',
            '04'=>'April',
            '05'=>'Mei',
            '06'=>'Juni',
            '07'=>'Juli',
            '08'=>'Agustus',
            '09'=>'September',
            '10'=>'Oktober',
            '11'=>'November',
            '12'=>'Desember'
        );
        $t=explode('-',$tgl);
        $h=$t[2].' '.$bln[$t[1]].' '.$t[0];
        return $h;
    }
    
    public function tgldmy($tgl=false)
    {
        $t=explode('-',$tgl);
        $h=$t[2].'-'.$t[1].'-'.$t[0];
        return $h;
    }
    public function dttime_dmy($tgl=false)
    {
        $t=explode(' ',$tgl);
        $tg=$this->tgldmy($t[0]);
        $h=$tg.' '.$t[1];
        return $h;
    }
    public function paging($link, $currpage, $maxpage, $totalpage)
	{
		$start=((($currpage%$maxpage==0) ? ($currpage/$maxpage) : intval($currpage/$maxpage)+1)-1)*$maxpage+1;
		$end=((($start+$maxpage-1)<=$totalpage) ? ($start+$maxpage-1) : $totalpage);
		
		$paging='<div class="text-center my-3">';
		if($currpage>1){
			$paging.='<a class="btn btn-sm btn-primary" href="'.$link.'1"><i class="bx bx-chevrons-left"></i></a> ';
			$paging.='<a class="btn btn-sm btn-primary" href="'.$link.($currpage-1).'"><i class="bx bx-chevron-left"></i></a> ';
		}
		
		if($start>$maxpage){
			$paging.='<a class="btn btn-sm btn-primary" href="'.$link.($start-1).'">...</a> ';
		}
		
		for($i=$start;$i<=$end;$i++){
			if($currpage==$i){
				$paging.='<a  class="btn btn-sm btn-danger" href="#"
                onclick="return javascript:void();">'.$i.'</a> ';
			}
			else{
				$paging.='<a class="btn btn-sm btn-primary" href="'.$link.$i.'">'.$i.'</a> ';
			}
		}
		
		if($end<$totalpage){
			$paging.='<a class="btn btn-sm btn-primary" href="'.$link.($end+1).'">...</a> ';
		}
		
		if($currpage<$totalpage){
			$paging.='<a class="btn btn-sm btn-primary" href="'.$link.($currpage+1).'"><i class="bx bx-chevron-right"></i></a> ';
			$paging.='<a class="btn btn-sm btn-primary" href="'.$link.$totalpage.'"><i class="bx bx-chevrons-right"></i></a>';
		}
		$paging.='</div>';
		return $paging;
	}
    
    
}
?>