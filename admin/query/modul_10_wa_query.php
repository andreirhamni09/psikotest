<?php    
    include '../../kumpulan_function.php';
    $soal = new Soal();

    if(isset($_POST['add_soal']))
    {
        $pindah_html    = '../soal/modul_10_wa';

        
        
        $cekNomorSoal   = $soal->CekNomorSoal($_POST['add_nomor'], 'modul_10_wa');
        switch ($cekNomorSoal) {
            case 'TIDAK ADA':
                $nama_modul = 'modul_10_wa';
                $pilihan    = '';

                if(empty($_POST['pilihan_a_'.$_POST['add_nomor'].'']) || empty($_POST['pilihan_b_'.$_POST['add_nomor'].'']) || empty($_POST['pilihan_c_'.$_POST['add_nomor'].'']) || empty($_POST['pilihan_d_'.$_POST['add_nomor'].'']) || empty($_POST['pilihan_e_'.$_POST['add_nomor'].'']))
                {
                    header('location:../soal/modul_10_wa?soal_id='.$_POST['add_soal_id'].'&status=20');
                }
                else{
                    $pilihan .= $_POST['pilihan_a_'.$_POST['add_nomor'].''].';'.
                    $_POST['pilihan_b_'.$_POST['add_nomor'].''].';'.
                    $_POST['pilihan_c_'.$_POST['add_nomor'].''].';'.
                    $_POST['pilihan_d_'.$_POST['add_nomor'].''].';'.
                    $_POST['pilihan_e_'.$_POST['add_nomor'].''].';';
                }

                $array_kolom  = array('soal_id', 'nomor_soal', 'pilihan' ,'kunci_jawaban');
                $array_data   = array($_POST['add_nomor'], $pilihan, $_POST['add_kunci_jawaban']);
                $soal->TambahSoalModul($_POST['add_soal_id'], $nama_modul, $array_kolom, $array_data, $pindah_html, 7, 8);
                                
                break;
            
            default:
                header('location:'.$pindah_html.'?soal_id='.$_POST['add_soal_id'].'&status=6');
                break; 
        }


    }

    if(isset($_POST['update_soal']))
    {
        $pindah_html    = '../soal/modul_10_wa';


        $nomor_soal     = $_POST['up_nomor_soal'];

        $pilihan_a      = '';
        if(isset($_POST['up_pilihan_a_'.$nomor_soal.'']))
        {
            $pilihan_a      = $_POST['up_pilihan_a_'.$nomor_soal.''];
        }
        else 
        {
            $pilihan_a      = '';
        }

        $pilihan_b      = '';
        if(isset($_POST['up_pilihan_b_'.$nomor_soal.'']))
        {
            $pilihan_b      = $_POST['up_pilihan_b_'.$nomor_soal.''];
        }
        else 
        {
            $pilihan_b      = '';
        }

        $pilihan_c      = '';
        if(isset($_POST['up_pilihan_c_'.$nomor_soal.'']))
        {
            $pilihan_c      = $_POST['up_pilihan_a_'.$nomor_soal.''];
        }
        else 
        {
            $pilihan_c      = '';
        }

        $pilihan_d      = '';
        if(isset($_POST['up_pilihan_d_'.$nomor_soal.'']))
        {
            $pilihan_d      = $_POST['up_pilihan_a_'.$nomor_soal.''];
        }
        else 
        {
            $pilihan_d      = '';
        }

        $pilihan_e      = '';
        if(isset($_POST['up_pilihan_e_'.$nomor_soal.'']))
        {
            $pilihan_e      = $_POST['up_pilihan_e_'.$nomor_soal.''];
        }
        else 
        {
            $pilihan_e      = '';
        }

        
        $pilihan        = $pilihan_a.';'.$pilihan_b.';'.$pilihan_c.';'.$pilihan_d.';'.$pilihan_e.';';


        echo $pilihan;
        if(isset($_POST['up_kunci_jawaban']))
        {
            $kunci_jawaban  = $_POST['up_kunci_jawaban'];
            $array_kolom    = array('pilihan', 'kunci_jawaban', 'id');
            $array_data     = array($pilihan, $_POST['up_kunci_jawaban'], $_POST['up_id']); 

            $soal->UpdateSoalModul($_POST['up_soal_id'], 'modul_10_wa', $array_kolom, $array_data, $pindah_html, 9, 10);
        
        }
        else 
        {
            $kunci_jawaban  = $_POST['up_kunci_jawaban'];
            $array_kolom    = array('pilihan', 'id');
            $array_data     = array($pilihan, $_POST['up_id']); 

            $soal->UpdateSoalModul($_POST['up_soal_id'], 'modul_10_wa', $array_kolom, $array_data, $pindah_html, 9, 10);
         
        }
    }

    if(isset($_POST['update_modul']))
    {
        $pindah_html = '../soal/modul_10_wa';
        $array_kolom    = array('deskripsi_soal', 'durasi', 'id');
        $array_data     = array(htmlspecialchars($_POST['update_deskripsi_soal']), $_POST['update_durasi_soal'], $_POST['update_id']);
        $soal->UpdateSoalModul($_POST['update_id'], 'soal', $array_kolom, $array_data, $pindah_html, 11, 12);
    }

    if(isset($_POST['delete_soal']))
    {
        $pindah_html = '../soal/modul_10_wa';
        $soal->HapusSoalModul($_POST['update_id'], $_POST['update_soal_id'] ,'modul_10_wa', $pindah_html, 13, 14);
    }
?>