<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// akbr helper

function test_email()
{

  $ci = get_instance();
  //  codeigniter 3 send email controller
  $ci->load->library('email');

  $config['protocol'] = 'smtp';
  $config['smtp_host'] = 'muhakbar.com';
  $config['smtp_user'] = 'gpp_system@muhakbar.com';
  $config['smtp_pass'] = 'nokiax202';
  $config['smtp_timeout'] = 60;
  $config['smtp_port'] = '465';
  $config['mailtype'] = 'html';
  $config['smtp_crypto'] = 'ssl';
  $config['smtp_keepalive'] = 'true';
  $config['charset'] = 'utf-8';
  $config['newline'] = "\r\n";

  $ci->email->initialize($config);

  $ci->email->from('gpp_system@muhakbar.com', 'GPP System');
  $ci->email->to("muhammad.akbar5999@gmail.com");
  $ci->email->subject("tes");
  $ci->email->message("tes kirim email");

  if ($ci->email->send()) {
    return true;
  } else {
    show_error($ci->email->print_debugger());
    return false;
  }
}


function send_email($to, $subject, $name)
{

  $logo = 'https://i.imgur.com/mCdnh1M.png';

  $html_content = '
    <html lang="en">
  <head>
    <style>
      .container {
        max-width: 500px;
        margin: 0 auto;
        border: rgb(182, 182, 182) solid 1px;
        border-radius: 20px;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        overflow: hidden;
      }
      .header {
        background-color: #5b99e7;
        color: #fafafa;
        text-align: center;
        margin-top: 0;
        padding: 20px;
        font-size: 20px;
      }
      .content {
        padding: 20px;
        margin-top: 0;
      }
    </style>
  </head>
  <body>
    <div class="container">
    <div class="header">
    GPP System : ' . $subject . '
    </div>
      <div class="content">
        <p>Hi, ' . $name . '</p>
        Your logtime is less than 35 hours.<br>
        Please check your logtime. <br>
        Thank
        You.<br><br>
        <hr>
        <center>
          <img src="' . $logo . '" width="50px" alt="logo gpp system"/>
        </center>
      </div>
    </div>
  </body>
</html>';

  $ci = get_instance();
  //  codeigniter 3 send email controller
  $ci->load->library('email');

  $config['protocol'] = 'smtp';
  $config['smtp_host'] = 'muhakbar.com';
  $config['smtp_user'] = 'gpp_system@muhakbar.com';
  $config['smtp_pass'] = 'nokiax202';
  $config['smtp_timeout'] = 60;
  $config['smtp_port'] = '465';
  $config['mailtype'] = 'html';
  $config['smtp_crypto'] = 'ssl';
  $config['smtp_keepalive'] = 'true';
  $config['charset'] = 'utf-8';
  $config['newline'] = "\r\n";

  $ci->email->initialize($config);

  $ci->email->from('gpp_system@muhakbar.com', 'GPP System');
  $ci->email->to($to);
  $ci->email->subject($subject);
  $ci->email->message($html_content);

  if ($ci->email->send()) {

    return true;
  } else {
    return false;
  }
}

function time_to_hour($time)
{
  if (isset($time)) {
    $time = explode(':', $time);
    $hour = $time[0];
    $minute = $time[1];
    $second = $time[2];
    $hour = $hour + ($minute / 60) + ($second / 3600);
    $hour = round($hour, 2);
    return $hour;
  }
}

// konversi ke rupiah dari decimal atau integer
// Rp. 12.000.000
if (!function_exists('rupiah')) {
  function rupiah($nilaiku)
  {
    return "Rp. " . number_format($nilaiku, 0, ",", ".");
  }
}

// menghilangkan karater titik pada sebuah kalimat atau angka
// digunakna jika user input nilai uang dengan titik sebagai penyebut ribu
if (!function_exists('hilangkantitik')) {
  function hilangkantitik($nilaiku)
  {
    return str_replace(".", "", $nilaiku);
  }
}

// memberikan nilai sebuah kalimat dari nominal angka yang diberikan
// Contoh: Seratus Ribu Rupiah
function penyebut($nilai)
{
  $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " " . $huruf[$nilai];
  } else if ($nilai < 20) {
    $temp = penyebut($nilai - 10) . " belas";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " seratus" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " seribu" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
  }
  return $temp;
}

if (!function_exists('dateIna')) {
  function dateIna($data, $simple = false, $getMonth = false)
  {
    // day
    $hari = date("D", strtotime($data));
    $haris = array(
      'Mon' => 'Monday',
      'Tue' => 'Tuesday',
      'Wed' => 'Wednesday',
      'Thu' => 'Thursday',
      'Fri' => 'Friday',
      'Sat' => 'Saturday',
      'Sun' => 'Sunday',
    );

    $bulan = substr($data, 5, 2);
    $bulans = array(
      '01' => 'January',
      '02' => 'February',
      '03' => 'March',
      '04' => 'April',
      '05' => 'May',
      '06' => 'June',
      '07' => 'July',
      '08' => 'August',
      '09' => 'September',
      '10' => 'October',
      '11' => 'November',
      '12' => 'December',
    );
    if ($simple) {
      return substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
    } elseif ($getMonth) {
      return substr($bulans[$bulan], 0, 3);
    } else {
      //return "-";
      if ($data == "0000-00-00 00:00:00") {
        echo "-";
      } else {
        return $haris[$hari] . ", " . substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4) . ", Jam " . substr($data, 11, 5);
      }
    }
  }

  function date_surat($data, $simple = false, $getMonth = false)
  {



    $bulan = substr($data, 5, 2);
    $bulans = array(
      '01' => 'January',
      '02' => 'February',
      '03' => 'March',
      '04' => 'April',
      '05' => 'May',
      '06' => 'June',
      '07' => 'July',
      '08' => 'August',
      '09' => 'September',
      '10' => 'October',
      '11' => 'November',
      '12' => 'December',
    );
    if ($simple) {
      return substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
    } elseif ($getMonth) {
      return substr($bulans[$bulan], 0, 3);
    } else {
      //return "-";
      if ($data == "0000-00-00 00:00:00") {
        echo "-";
      } else {
        return substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
      }
    }
  }

  function cari_bulan($data)
  {
    $bulans = array(
      '1' => 'January',
      '2' => 'February',
      '3' => 'March',
      '4' => 'April',
      '5' => 'May',
      '6' => 'June',
      '7' => 'July',
      '8' => 'August',
      '9' => 'September',
      '10' => 'October',
      '11' => 'November',
      '12' => 'December',
    );
    return $bulans[$data];
  }

  function tanggal_surat($data, $simple = false, $getMonth = false)
  {
    // day
    $hari = date("D", strtotime($data));
    $haris = array(
      'Mon' => 'Monday',
      'Tue' => 'Tuesday',
      'Wed' => 'Wednesday',
      'Thu' => 'Thursday',
      'Fri' => 'Friday',
      'Sat' => 'Saturday',
      'Sun' => 'Sunday',
    );

    $bulan = substr($data, 5, 2);
    $bulans = array(
      '01' => 'January',
      '02' => 'February',
      '03' => 'March',
      '04' => 'April',
      '05' => 'May',
      '06' => 'June',
      '07' => 'July',
      '08' => 'August',
      '09' => 'September',
      '10' => 'October',
      '11' => 'November',
      '12' => 'December',
    );
    if ($simple) {
      return substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
    } elseif ($getMonth) {
      return substr($bulans[$bulan], 0, 3);
    } else {
      //return "-";
      if ($data == "0000-00-00 00:00:00") {
        echo "-";
      } else {
        return $haris[$hari] . ", " . substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
      }
    }
  }

  function bulan_surat($data, $simple = false, $getMonth = false)
  {


    $bulan = substr($data, 5, 2);
    $bulans = array(
      '01' => 'January',
      '02' => 'February',
      '03' => 'March',
      '04' => 'April',
      '05' => 'May',
      '06' => 'June',
      '07' => 'July',
      '08' => 'August',
      '09' => 'September',
      '10' => 'October',
      '11' => 'November',
      '12' => 'December',
    );
    if ($simple) {
      return substr($data, 8, 2) . " " . $bulans[$bulan] . " " . substr($data, 0, 4);
    } elseif ($getMonth) {
      return substr($bulans[$bulan], 0, 3);
    } else {
      //return "-";
      if ($data == "0000-00-00 00:00:00") {
        echo "-";
      } else {
        return $bulans[$bulan] . " " . substr($data, 0, 4);
      }
    }
  }

  function cektb5($index, $data, $output)
  {
    if (array_key_exists($index, $data)) {
      if ($output === "project_code") {
        return "'" . $data[$index]->project_code . "'";
      } else {
        return $data[$index]->amount;
      }
    } else {
      if ($output == "project_code") {
        return "'-'";
      } else {
        return 0;
      }
    }
  }

  function cek_nama($id)
  {
    $CI = &get_instance();
    $nama = $CI->db->query("SELECT concat(first_name,' ',last_name) as nama from users where id='$id'")->row()->nama;
    return $nama;
  }

  function cek_status($id)
  {
    switch ($id) {
      case '1':
        return  "Selesai";
        break;

      default:
        return "Belum Selesai";
        break;
    }
  }
}
