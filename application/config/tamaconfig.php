<?php
defined('BASEPATH') or exit('No direct script access allowed');


$config['sitename'] = '<i class="far fa-newspaper"></i> ';
$config['sitename_mini'] = '<i class="far fa-newspaper"></i>';

// Data eselon: eselon 1 sd eselon 4
$config['list_eselon'] = array(1, 2, 3, 4);

// status jabawan: Kasubag, kabag, dll
$config['list_status_jabatan'] = array(
  1 => "Kepala Bagian",
  2 => "Kapala Sub Bagian",
  5 => "Ketua DPRD",
  6 => "Wakil Ketua DPRD",
  7 => "Anggota DPRD",
  8 => "Staff",
  9 => "TKK"
);

// menjabat sebagai fungsional
$config['list_fungsi_jabatan'] = array(
  1 => "KPA",
  2 => "PPTK",
  3 => "Bendahara Pengeluaran Pembantu",
  4 => "Sekretaris",
  5 => "Sekretaris Daerah"
);

// komisi Anggota Dewan
$config['list_komisi'] = array(
  1 => "Komisi A",
  2 => "Komisi B",
  3 => "Komisi C",
  4 => "Komisi D"
);
