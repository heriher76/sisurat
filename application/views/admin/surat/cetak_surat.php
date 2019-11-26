<?php
$this->load->library('pdf');
$pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetTitle('Cetak - '.$surat->nama_pegawai);
        $pdf->SetMargins(10, 10 , 10, 10);
        $pdf->SetFont('Arial','B',18);
                $pdf->Image('assets\image\logo.png',8,8,31);
        $pdf->Cell(220,6,'KEMENTRIAN AGRARIA DAN TATA RUANG',0,1,'C');

        $pdf->ln(2);
        $pdf->Cell(220,6,'BADAN PERTANAHAN NASIONAL',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->ln(2);
        $pdf->Cell(220,3,'KANTOR PERTANAHAN KABUPATEN SUMEDANG PROVINSI JAWA BARAT',0,1,'C');
        $pdf->ln(2);
        $pdf->SetFont('Times','',11);
        $pdf->Cell(220,6,'Jalan Pangeran Kornel No. 264 Tlp./Fax. (0261) 201474 - Kode Pos 45311',0,1,'C');
        
        $pdf->SetLineWidth(1.0);
        $pdf->Line(10, 40, 210-10, 40);
        $pdf->SetLineWidth(0);
        $pdf->ln(2);
        $pdf->ln(2);

        $pdf->ln();
        $pdf->Cell(200,5,'SURAT TUGAS',0,1,'C');
        

        $pdf->ln(2);
        $pdf->SetFont('Times','',11);
        $pdf->setX(68);
        $pdf->Cell(20,1,"Nomor :",0,0,'C');
        $pdf->Cell(55,1,$surat->no_surat,0,0,'C');

        
        // $pdf->ln(7);
        // $pdf->setX(40);
        // $pdf->SetFont('Times','',11);
        // $pdf->Cell(2,5,'Menimbang',0,0);
        // $pdf->Cell(10,5,' : ',0,0);
        $pdf->ln(10);
        $pdf->setX(25);
        $pdf->Cell(103,5,"Menimbang   :",0,0);
        $pdf->setX(48);   
        $pdf->Cell(10,5,"  a.",0,0);
        $pdf->setX(52);   
        $pdf->MultiCell(130, 5, "  Bahwa dalam rangka ".$surat->alasan);
        $pdf->ln(0);
        $pdf->setX(48);   
        $pdf->Cell(10,5,"  b.",0,0);
        $pdf->setX(52);   
        $pdf->MultiCell(130, 5, "  Bahwa sehubungan dengan hal tersebut sebagaimana butir a, perlu menugaskan pegawai untuk melaksanakan kegiatan seperti dimaksud diatas.");

        $pdf->ln(4);
        $pdf->setX(25);
        $pdf->Cell(103,5,"Dasar             :",0,0);
        $pdf->setX(48);   
        
        if($surat->dasar_kedua == NULL && $surat->dasar_ketiga == NULL && $surat->dasar_keempat == NULL) {
                $pdf->MultiCell(130,5," Surat Pengesahan Daftar Isian Pelaksanaan Anggaran (DIPA) Nomor: SP DIPA-056.01.2.429728/2019 Tanggal 05 Desember 2019.");
        }else{
                $pdf->Cell(10,5,"  1.",0,0);
                $pdf->setX(52);   
                $pdf->MultiCell(130, 5, " Surat Pengesahan Daftar Isian Pelaksanaan Anggaran (DIPA) Nomor: SP DIPA-056.01.2.429728/2019 Tanggal 05 Desember 2018.");
        }

        if($surat->dasar_kedua != NULL) {
                $pdf->ln(0);
                $pdf->setX(48);   
                $pdf->Cell(10,5,"  2.",0,0);
                $pdf->setX(52);   
                $pdf->MultiCell(130, 5, "  ".$surat->dasar_kedua);
        }

        if($surat->dasar_ketiga != NULL) {
                $pdf->ln(0);
                $pdf->setX(48);   
                $pdf->Cell(10,5,"  3.",0,0);
                $pdf->setX(52);   
                $pdf->MultiCell(130, 5, "  ".$surat->dasar_ketiga);
        }

        if($surat->dasar_keempat != NULL) {
                $pdf->ln(0);
                $pdf->setX(48);   
                $pdf->Cell(10,5,"  4.",0,0);
                $pdf->setX(52);   
                $pdf->MultiCell(130, 5, "  ".$surat->dasar_keempat);
        }

        $pdf->ln(3);
        $pdf->Cell(200,5,'MEMBERI TUGAS',0,1,'C');
        $pdf->ln(3);
        $pdf->setX(25);
        $pdf->Cell(103,5,"Kepada          :",0,0);

        $counter = 1;

        if($surat->kode_dosen != NULL) {
                $pdf->setX(48);   
                $pdf->Cell(10,5,"  ".$counter,0,0);
                $pdf->setX(52);   
                $pdf->MultiCell(130, 5, ". ".$surat->nama_pegawai.", NIP.".$surat->kode_dosen.", Jabatan ".$surat->jabatan_pegawai_pertama.", Pangkat/Gol ".$surat->golongan_pegawai_pertama);
                $counter++;
        }
        
        if($surat->pegawai_kedua != NULL) {
                $pdf->ln(0);
                $pdf->setX(48);   
                $pdf->Cell(10,5,"  ".$counter,0,0);
                $pdf->setX(52);   
                $pdf->MultiCell(130, 5, ". ".$surat->nama_pegawai_kedua.", NIP.".$surat->pegawai_kedua.", Jabatan ".$surat->jabatan_pegawai_kedua.", Pangkat/Gol ".$surat->golongan_pegawai_kedua);
                $counter++;
        }

        if($surat->ppnpn_pertama != NULL) {
                $pdf->ln(0);
                $pdf->setX(48);   
                $pdf->Cell(10,5,"  ".$counter,0,0);
                $pdf->setX(52);   
                $pdf->MultiCell(130, 5, ". ".$surat->nama_ppnpn.", Jabatan ".$surat->jabatan_ppnpn_pertama);
                $counter++;
        }

        if($surat->ppnpn_kedua != NULL) {
                $pdf->ln(0);
                $pdf->setX(48);   
                $pdf->Cell(10,5,"  ".$counter,0,0);
                $pdf->setX(52);   
                $pdf->MultiCell(130, 5, ". ".$surat->nama_ppnpn_kedua.", Jabatan ".$surat->jabatan_ppnpn_kedua);
                $counter++;
        }

        $datediff = strtotime($surat->tanggal_selesai) - strtotime($surat->tanggal_mulai);
        $jumlahHari = round($datediff / (60 * 60 * 24));

        $pdf->ln(4);
        $pdf->setX(25);
        $pdf->Cell(103,5,"Untuk            :",0,0);
        $pdf->setX(48);   
        $pdf->MultiCell(140,5,"  Melaksanakan Pengumpulan Data Yuridis pada Kegiatan Pendaftaran Tanah Sistematis Lengkap (PTSL) Tahun Anggaran 2019 bertempat di Desa ".$surat->desa." Kecamatan ".$surat->kecamatan." Kabupaten Sumedang "." selama ".$jumlahHari." hari dari tanggal ".$surat->tanggal_mulai." s.d ".$surat->tanggal_selesai);
        // $pdf->Cell(10,5,"",0,0);

        $pdf->ln(32);
        $pdf->setX(140);
        $pdf->Cell(18,5,"Sumedang,",0,0,'L');
        $pdf->Cell(20,5,strftime('%d %B %Y', strtotime($surat->tanggal_surat)),0,0,'L');

        $pdf->ln();
        $pdf->ln();
        $pdf->setX(140);
        $pdf->Cell(20,5,"a.n Kepala Kantor Pertanahan",0,0,'L');
        $pdf->ln();

        $pdf->setX(145);
        $pdf->Cell(20,5,"Kabupaten Sumedang",0,0,'L');
        $pdf->ln();

        $pdf->setX(156);
        $pdf->Cell(20,5,$surat->jabatan,0,0,'C');

        $pdf->ln(25);
        $pdf->SetFont('Times','B',10);
        $pdf->setX(154);
        $pdf->Cell(20,5,$surat->nama_pejabat,0,0,'C');

        $pdf->SetFont('Times','',10);
        $pdf->ln();
        $pdf->setX(154);
        $pdf->Cell(20,5,'NIP. '.$surat->nip_pejabat,0,0,'C');

        //==================================================================
        // function MultiCellRow($cells, $width, $height, $data, $pdf)
        // {
        //     $x = $pdf->GetX();
        //     $y = $pdf->GetY();
        //     $maxheight = 0;

        //     for ($i = 0; $i < $cells; $i++) {
        //         if($i === 0) $lebar = 10;
        //         else if($i === 1) $lebar = $width;
        //         else if($i === 2) $lebar = $width;

        //         $pdf->MultiCell($lebar, $height, $data[$i]); 
                           
        //         if ($pdf->GetY() - $y > $maxheight) $maxheight = $pdf->GetY() - $y;

        //         $pdf->SetXY($x + ($lebar * ($i + 1)), $y);
        //     }

        //     for ($i = 0; $i < $cells + 1; $i++) {
        //         if($i === 1) $lebar = 10;
        //         else if($i === 2) $lebar = $width-40;
        //         else if($i === 3)$lebar = $width-20;
        //         else $lebar = $width-60;

        //         $pdf->Line($x + $lebar * $i, $y, $x + $lebar * $i, $y + $maxheight);
        //         $pdf->Line($x, $y, $x + $lebar * $cells, $y);
        //         $pdf->Line($x, $y + $maxheight, $x + $lebar * $cells, $y + $maxheight);
        //     }

        // }

        // function MultiCellRow($cells, $width, $height, $data, $pdf)
        // {
        //     $x = $pdf->GetX();
        //     $y = $pdf->GetY();
        //     $maxheight = 70;

        //     for ($i = 0; $i < $cells; $i++) {
        //         $height = (ceil(($pdf->GetStringWidth($data[$i]) / $width)) * $height);
        //         $pdf->MultiCell($width, $height, $data[$i]);
        //         if ($pdf->GetY() - $y > $maxheight) $maxheight = $pdf->GetY() - $y;
        //         $pdf->SetXY($x + ($width * ($i + 1)), $y);
        //     }

        //     for ($i = 0; $i < $cells + 1; $i++) {
        //         $pdf->Line($x + $width * $i, $y, $x + $width * $i, $y + $maxheight);
        //     }

        //     $pdf->Line($x, $y, $x + $width * $cells, $y);
        //     $pdf->Line($x, $y + $maxheight, $x + $width * $cells, $y + $maxheight);
        // }

        $pdf->addPage();
        $pdf->SetMargins(10, 10 , 10, 10);
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(220,3,'BADAN PERTANAHAN NASIONAL REPUBLIK INDONESIA');
        $pdf->setY(10);
        $pdf->setX(110);
        $pdf->MultiCell(220,3,"Lembar ke       : ".$surat->lembar_ke);
        $pdf->SetFont('Arial','',10);
        $pdf->ln(2);
        $pdf->Cell(220,3,'KANTOR PERTANAHAN KABUPATEN SUMEDANG',0,1,'L');
        $pdf->setY(15);
        $pdf->setX(110);
        $pdf->MultiCell(220,3,"Kode No          : ".$surat->kode_no);
        $pdf->ln(2);
        $pdf->Cell(220,3,'PROVINSI JAWA BARAT',0,1,'L');
        $pdf->setY(20);
        $pdf->setX(110);
        $pdf->MultiCell(220,3,"Nomor             : ".$surat->nomor);
        $pdf->ln(2);
        $pdf->ln(2);
        #tampilkan judul laporan
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,20, 'SURAT PERJALANAN DINAS ( SPD )', 0, 1, 'C');

        $pdf->SetFont('Arial','','10');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.3);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="1";
        $pdf->MultiCell(10, 5, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="Pejabat Pembuat Komitmen";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $col3=$surat->nama_pejabat;
        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="2";
        $pdf->MultiCell(10, 10, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="Nama/NIP pegawai yang melaksanakan\r\nperjalanan dinas";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $col3=$surat->nama_pegawai."\r\nNIP. ".$surat->kode_dosen;
        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="3";
        $pdf->MultiCell(10, 20, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="a. Pangkat dan Golongan\r\nb. Jabatan / Instansi\r\n\r\nc. Tingkat Biaya Perjalanan Dinas";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $col3="a. ".$surat->golongan_pegawai_pertama."\r\nb. ".$surat->jabatan_pegawai_pertama."\r\n\r\nc. "."C";
        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col3=$surat->alasan;

        $ketinggian = ceil(($pdf->GetStringWidth($col3) / 100)) * 5;

        $col1="4";
        $pdf->MultiCell(10, $ketinggian, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="Maksud Perjalanan Dinas";
        $pdf->MultiCell(80, $ketinggian, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="5";
        $pdf->MultiCell(10, 5, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="Alat angkut yang dipergunakan";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $col3=$surat->kendaraan;
        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="6";
        $pdf->MultiCell(10, 10, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="a. Tempat Berangkat\r\nb. Tempat Tujuan";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $col3="a. ".$surat->berangkat."\r\nb. ".$surat->tujuan;
        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="7";
        $pdf->MultiCell(10, 20, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="a. Lamanya perjalanan dinas\r\nb. Tanggal berangkat\r\nc. Tanggal harus kembali/tiba di\r\n    tempat baru";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $col3="a. ".$jumlahHari." hari\r\nb. ".strftime('%d %B %Y', strtotime($surat->tanggal_mulai))."\r\nc. ".strftime('%d %B %Y', strtotime($surat->tanggal_selesai))."\r\n  ";
        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="8";
        $pdf->MultiCell(10, 5, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="Pengikut :                   Nama\r\n1.\r\n2.\r\n3.\r\n4.\r\n5.";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="Tanggal Lahir";
        $pdf->MultiCell(50, 5, $col2, 1, "C");
        $pdf->SetXY($x + 50, $y);

        $col3="Keterangan";
        $pdf->MultiCell(50, 5, $col3, 1, "C");
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1=" ";
        $pdf->MultiCell(10, 25, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $pengikut1 = ['','',''];
        $pengikut2 = ['','',''];
        $pengikut3 = ['','',''];
        $pengikut4 = ['','',''];
        $pengikut5 = ['','',''];
        if ($surat->pengikut1 != NULL) {
                $pengikut1 = explode(",",$surat->pengikut1);
        }
        if ($surat->pengikut2 != NULL) {
                $pengikut2 = explode(",",$surat->pengikut2);
        }
        if ($surat->pengikut3 != NULL) {
                $pengikut3 = explode(",",$surat->pengikut3);
        }
        if ($surat->pengikut4 != NULL) {
                $pengikut4 = explode(",",$surat->pengikut4);
        }
        if ($surat->pengikut5 != NULL) {
                $pengikut5 = explode(",",$surat->pengikut5);
        }

        $col2="1. ".$pengikut1[0]."\r\n2. ".$pengikut2[0]."\r\n3. ".$pengikut3[0]."\r\n4. ".$pengikut4[0]."\r\n5. ".$pengikut5[0];
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="1. ".$pengikut1[1]."\r\n2. ".$pengikut2[1]."\r\n3. ".$pengikut3[1]."\r\n4. ".$pengikut4[1]."\r\n5. ".$pengikut5[1];
        $pdf->MultiCell(50, 5, $col2, 1);
        $pdf->SetXY($x + 50, $y);

        $col3="1. ".$pengikut1[2]."\r\n2. ".$pengikut2[2]."\r\n3. ".$pengikut3[2]."\r\n4. ".$pengikut4[2]."\r\n5. ".$pengikut5[2];
        $pdf->MultiCell(50, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="9";
        $pdf->MultiCell(10, 15, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="Pembebanan Anggaran\r\na. Instansi\r\nb. Akun";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $col3="\r\na. ".$surat->instansi."\r\nb. ".$surat->akun;
        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(0);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col1="10";
        $pdf->MultiCell(10, 5, $col1, 1, 1);
        $pdf->SetXY($x + 10, $y);

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $col2="Keterangan lain-lain";
        $pdf->MultiCell(80, 5, $col2, 1);
        $pdf->SetXY($x + 80, $y);

        $col3=$surat->keterangan;
        $pdf->MultiCell(100, 5, $col3, 1);
        $pdf->Ln(2);

        $pdf->Cell(50,5,'* coret yang tidak perlu',0,0,'C');

        $pdf->ln(10);
        $pdf->setX(130);
        $pdf->Cell(20,5,"Dikeluarkan di         : Sumedang",0,0,'L');

        $pdf->ln();
        $pdf->setX(130);
        $pdf->Cell(20,5,"Tanggal                   : ".strftime('%d %B %Y', strtotime($surat->tanggal_surat)),0,0,'L');

        $pdf->ln(12);
        $pdf->setX(154);
        $pdf->Cell(20,5,"Pejabat Pembuat Komitmen",0,0,'C');

        $pdf->ln(32);
        $pdf->SetFont('Times','B',10);
        $pdf->setX(154);
        $pdf->Cell(20,5,$surat->nama_pejabat,0,0,'C');

        $pdf->SetFont('Times','',10);
        $pdf->ln();
        $pdf->setX(154);
        $pdf->Cell(20,5,'NIP. '.$surat->nip_pejabat,0,0,'C');

        $pdf->Output();
?>

<body>
<div id="sidebar">
<div id="outline">
</div>
</div>
<div id="page-container">
<div id="pf1" class="pf w0 h0" data-page-no="1"><div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" alt="" src="bg1.png"/><div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">Form Bukti Kehadiran Pelaksanaan Perjalanan Dinas Jabatan</div><div class="t m0 x2 h2 y2 ff1 fs0 fc0 sc0 ls0 ws0">Dalam Kota Sampai Dengan 8 (Delapan) Jam</div><div class="c x3 y3 w2 h3"><div class="t m0 x4 h4 y4 ff2 fs1 fc0 sc0 ls0 ws0">Pejabat / Petugas yang mengesahkan</div></div><div class="c x0 y5 w3 h5"><div class="t m0 x5 h4 y6 ff2 fs1 fc0 sc0 ls0 ws0">No</div></div><div class="c x6 y5 w4 h5"><div class="t m0 x7 h4 y6 ff2 fs1 fc0 sc0 ls0 ws0">Pelaksana SPD</div></div><div class="c x8 y5 w5 h5"><div class="t m0 x9 h4 y6 ff2 fs1 fc0 sc0 ls0 ws0">Hari</div></div><div class="c xa y5 w6 h5"><div class="t m0 x5 h4 y6 ff2 fs1 fc0 sc0 ls0 ws0">Tanggal</div></div><div class="c x3 y5 w7 h6"><div class="t m0 xb h4 y7 ff2 fs1 fc0 sc0 ls0 ws0">Nama</div></div><div class="c xc y5 w8 h6"><div class="t m0 x9 h4 y7 ff2 fs1 fc0 sc0 ls0 ws0">Jabatan</div></div><div class="c xd y5 w9 h6"><div class="t m0 xe h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">Tanda </div><div class="t m0 xf h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">Tangan</div></div><div class="c x0 ya w3 h7"><div class="t m0 x5 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">(1)</div></div><div class="c x6 ya w4 h7"><div class="t m0 x10 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">(2)</div></div><div class="c x8 ya w5 h7"><div class="t m0 x11 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">(3)</div></div><div class="c xa ya w6 h7"><div class="t m0 xf h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">(4)</div></div><div class="c x3 ya w7 h7"><div class="t m0 x12 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">(5)</div></div><div class="c xc ya w8 h7"><div class="t m0 x13 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">(6)</div></div><div class="c xd ya w9 h7"><div class="t m0 x0 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">(7)</div></div><div class="c x0 yb w3 h8"><div class="t m0 x4 h4 yc ff2 fs1 fc0 sc0 ls0 ws0">1</div><div class="t m0 x4 h4 yd ff2 fs1 fc0 sc0 ls0 ws0">2</div><div class="t m0 x4 h4 ye ff2 fs1 fc0 sc0 ls0 ws0">3</div><div class="t m0 x4 h4 yf ff2 fs1 fc0 sc0 ls0 ws0">4</div></div><div class="c x6 yb w4 h8"><div class="t m0 x14 h4 y10 ff2 fs1 fc0 sc0 ls0 ws0">Nama yang berangkat, </div><div class="t m0 x14 h4 y11 ff2 fs1 fc0 sc0 ls0 ws0">ditulis dengan huruf awal </div><div class="t m0 x14 h4 y12 ff2 fs1 fc0 sc0 ls0 ws0">kapital</div></div><div class="c x8 yb w5 h8"><div class="t m0 x5 h4 y13 ff2 fs1 fc0 sc0 ls0 ws0">Jum’at</div></div><div class="c xa yb w6 h8"><div class="t m0 xf h4 y10 ff2 fs1 fc0 sc0 ls0 ws0">22 </div><div class="t m0 x15 h4 y13 ff2 fs1 fc0 sc0 ls0 ws0">Maret </div><div class="t m0 x9 h4 y14 ff2 fs1 fc0 sc0 ls0 ws0">2019</div></div><div class="t m0 x16 h4 y15 ff2 fs1 fc0 sc0 ls0 ws0">Pejabat Pembuat Komitmen</div><div class="t m0 x17 h4 y16 ff2 fs1 fc0 sc0 ls0 ws0">Roni Basuni Kusmayadi, S.H</div><div class="t m0 x18 h4 y17 ff2 fs1 fc0 sc0 ls0 ws0">NIP. 19811230 200804 1 001</div></div><div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div></div>
<div id="pf2" class="pf w0 h0" data-page-no="2"><div class="pc pc2 w0 h0"><img class="bi x19 y18 wa h9" alt="" src="bg2.png"/><div class="c x1a y19 wb ha"><div class="t m0 x13 hb y1a ff3 fs2 fc0 sc0 ls0 ws0">KEMENTERIAN AGRARIA DAN TATA RUANG / </div><div class="t m0 x1b hb y1b ff3 fs2 fc0 sc0 ls0 ws0">BADAN PERTANAHAN NASIONAL </div><div class="t m0 x11 hc y1c ff4 fs3 fc0 sc0 ls0 ws0">KANTOR PERTANAHAN KABUPATEN SUMEDANG PROVINSI JAWA BARAT  </div><div class="t m0 x0 hd y1d ff3 fs1 fc0 sc0 ls0 ws0">Jalan Pangeran Kornel No. 264 Tlp./Fax. ( 0261 )  201474 – Kode Pos 45311</div></div><div class="t m0 x1c h4 y1e ff2 fs1 fc0 sc0 ls0 ws0">SURAT  TUGAS</div><div class="t m0 x1d h4 y1f ff2 fs1 fc0 sc0 ls0 ws0">Nomor :   …../ST- ................../....../2019</div><div class="c x1e y20 wc he"><div class="t m0 x14 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">Menimbang</div></div><div class="c x1f y20 wd he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">:</div></div><div class="c x20 y20 we he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">a.</div></div><div class="c x21 y20 wf he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">Bahwa <span class="_ _0"> </span>dalam <span class="_ _0"> </span>rangka <span class="_ _0"> </span>Pelaksanaan <span class="_ _0"> </span>Pengumpulan <span class="_ _0"> </span>Data </div><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">Yuridis <span class="_ _1"> </span>pada <span class="_ _1"> </span>Kegiatan <span class="_ _1"> </span>Pendaftaran <span class="_ _1"> </span>Tanah <span class="_ _1"> </span>Sistematis </div><div class="t m0 x5 h4 y22 ff2 fs1 fc0 sc0 ls0 ws0">Lengkap (PTSL) Tahun Anggaran 2019;</div></div><div class="c x20 y23 we he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">b.</div></div><div class="c x21 y23 wf he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">Bahwa <span class="_ _2"></span>sehubungan <span class="_ _2"></span>dengan <span class="_ _2"></span>hal <span class="_ _2"></span>tersebut <span class="_ _2"></span>sebagaimana <span class="_ _2"></span>butir </div><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">a, <span class="_ _3"> </span>perlu <span class="_ _3"> </span>menugaskan <span class="_ _3"> </span>pegawai <span class="_ _3"> </span>untuk <span class="_ _3"> </span>melaksanakan </div><div class="t m0 x5 h4 y22 ff2 fs1 fc0 sc0 ls0 ws0">kegiatan seperti dimaksud diatas.</div></div><div class="c x1e y24 w10 he"><div class="t m0 x14 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">Dasar</div></div><div class="c x22 y24 w11 he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">:</div></div><div class="c x23 y24 we he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">1.</div></div><div class="c x24 y24 w12 he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">Surat <span class="_ _2"></span>Pengesahan <span class="_ _2"></span>Daftar <span class="_ _4"></span>Isian <span class="_ _4"></span>Pelaksanaan Anggaran <span class="_ _4"></span>(DIPA) </div><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">Nomor: <span class="_ _5"> </span>SP <span class="_ _5"> </span>DIPA-056.01.2.429728/2019 <span class="_ _5"> </span>Tanggal <span class="_ _5"> </span>05 </div><div class="t m0 x5 h4 y22 ff2 fs1 fc0 sc0 ls0 ws0">Desember 2018.</div></div><div class="c x23 y25 we h6"><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">2.</div></div><div class="c x24 y25 w12 h6"><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">Bila ada dasar lain, ex : surat masuk dari instansi lain..</div><div class="t m0 x5 hf y9 ff1 fs1 fc0 sc0 ls0 ws0">Kalo ga ada, dihapus saja tanpa ada nomor urut, 1,2 dst.</div></div><div class="t m0 x25 h4 y26 ff2 fs1 fc0 sc0 ls0 ws0">MEMBERI TUGAS</div><div class="c x1e y27 w10 h6"><div class="t m0 x14 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">Kepada</div></div><div class="c x22 y27 w13 h6"><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">:</div></div><div class="c x23 y27 we h6"><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">1.</div></div><div class="c x1d y27 w14 h6"><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">(Nama <span class="_ _6"></span>ditulis <span class="_ _6"></span>dengan <span class="_ _6"></span>huruf <span class="_ _6"></span>awal <span class="_ _6"></span>kapital), <span class="_ _6"></span>NIP. <span class="_ _6"></span>....., <span class="_ _6"></span>Jabatan </div><div class="t m0 x5 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">...., Pangkat/Gol untuk PNS</div></div><div class="c x23 y28 we he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">2.</div></div><div class="c x1d y28 w14 he"><div class="t m0 x5 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0">Nama <span class="_ _7"> </span>(ditulis <span class="_ _7"> </span>dengan <span class="_ _7"> </span>huruf <span class="_ _7"> </span>awal <span class="_ _7"> </span>kapital), <span class="_ _7"> </span>Jabatan <span class="_ _7"> </span>.... <span class="_ _7"> </span>ex <span class="_ _7"> </span>: </div><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">Asisten <span class="_ _8"> </span>Pengadministrasi <span class="_ _8"> </span>Umum <span class="_ _8"> </span>pada <span class="_ _8"> </span>Sub <span class="_ _8"> </span>Seksi <span class="_ _8"> </span>.... <span class="_ _8"> </span>untuk </div><div class="t m0 x5 h4 y22 ff2 fs1 fc0 sc0 ls0 ws0">PPNPN</div></div><div class="c x23 y29 we h7"><div class="t m0 x5 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">3.</div></div><div class="c x1d y29 w14 h7"><div class="t m0 x5 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">Dst...</div></div><div class="c x23 y2a we h7"><div class="t m0 x5 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">4.</div></div><div class="c x1d y2a w14 h7"><div class="t m0 x5 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">Dst...</div></div><div class="c x1e y2b w15 h10"><div class="t m0 x5 h4 ye ff2 fs1 fc0 sc0 ls0 ws0">Untuk</div></div><div class="c x26 y2b w13 h10"><div class="t m0 x5 h4 ye ff2 fs1 fc0 sc0 ls0 ws0">:</div></div><div class="c x27 y2b w16 h10"><div class="t m0 x5 h4 ye ff2 fs1 fc0 sc0 ls0 ws0">Melaksanakan <span class="_ _9"> </span>Pengumpulan <span class="_ _9"> </span>Data <span class="_ _9"> </span>Yuridis <span class="_ _9"> </span>pada <span class="_ _9"> </span>Kegiatan </div><div class="t m0 x5 h4 yf ff2 fs1 fc0 sc0 ls0 ws0">Pendaftaran <span class="_ _8"> </span>Tanah <span class="_ _8"> </span>Sistematis <span class="_ _8"> </span>Lengkap <span class="_ _8"> </span>(PTSL) <span class="_ _8"> </span>Tahun <span class="_ _8"> </span>Anggaran </div><div class="t m0 x5 h4 y8 ff2 fs1 fc0 sc0 ls0 ws0">2019 <span class="_ _a"> </span>bertempat <span class="_ _a"> </span>di <span class="_ _a"> </span>Desa <span class="_ _a"> </span>...... <span class="_ _a"> </span>Kecamatan <span class="_ _a"> </span>...... <span class="_ _a"> </span>Kabupaten </div><div class="t m0 x5 h4 y2c ff2 fs1 fc0 sc0 ls0 ws0">Sumedang <span class="_ _4"></span>selama <span class="_ _b"></span> <span class="_ _b"></span>... <span class="_ _4"></span>(...........) <span class="_ _b"></span>hari <span class="_ _4"></span>tanggal <span class="_ _b"></span>.... <span class="_ _4"></span>s.d. <span class="_ _b"></span>.... <span class="_ _4"></span>Maret <span class="_ _b"></span>2019.</div></div><div class="c x1c y2d w17 h7"><div class="t m0 x28 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">Sumedang, ....................... 2019</div></div><div class="c x1c y2e w17 h7"><div class="t m0 x29 h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">a.n. Kepala Kantor Pertanahan</div></div><div class="c x1c y2f w17 h7"><div class="t m0 x1e h4 y9 ff2 fs1 fc0 sc0 ls0 ws0">Kabupaten Sumedang</div></div><div class="c x1c y30 w17 h11"><div class="t m0 x29 h4 y31 ff2 fs1 fc0 sc0 ls0 ws0">Kepala Sub Bagian Tata Usaha</div><div class="t m0 x2a h4 y32 ff2 fs1 fc0 sc0 ls0 ws0">Adang H. Darmawan, S.IP</div><div class="t m0 x2b h4 y33 ff2 fs1 fc0 sc0 ls0 ws0">NIP. 19700125 199103 1 002</div></div></div><div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div></div>
<div id="pf3" class="pf w0 h0" data-page-no="3"><div class="pc pc3 w0 h0"><div class="t m0 x2c hf y34 ff1 fs1 fc0 sc0 ls0 ws0">Note : ditulis dengan huruf Bookman Old Style, Size 12 / menyesuaikan.</div><div class="t m0 x2c hf y35 ff1 fs1 fc0 sc0 ls0 ws0">Di print di kertas A4.</div></div><div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div></div>
</div>
<div class="loading-indicator">

</div>
</body>
