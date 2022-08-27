<!DOCTYPE html>
<html>

<head>
  <title>Tittle</title>
  <style type="text/css" media="print">
    @page {
      margin: 0;
      /* this affects the margin in the printer settings */
    }

    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
    }

    table th {
      -webkit-print-color-adjust: exact;
      border: 1px solid;

      padding-top: 11px;
      padding-bottom: 11px;
      background-color: #a29bfe;
    }

    table td {
      border: 1px solid;

    }
  </style>
</head>

<body>
  <h3 align="center">DATA Jobdesk</h3>
  <h4>Tanggal Cetak : <?= date("d/M/Y"); ?> </h4>
  <table class="word-table" style="margin-bottom: 10px">
    <tr>
      <th>No</th>
      <th>Nama Jobdesk</th>
      <th>Status</th>
      <th>Tanggal Dibuat</th>
      <th>Tanggal Selesai</th>
      <th>Pegawai</th>
      <th>Masa Tenggat</th>

    </tr><?php
          foreach ($jobdesk_data as $jobdesk) {
          ?>
      <tr>
        <td><?php echo ++$start ?></td>
        <td><?php echo $jobdesk->nama_jobdesk ?></td>
        <td><?php echo $jobdesk->status ?></td>
        <td><?php echo $jobdesk->tanggal_dibuat ?></td>
        <td><?php echo $jobdesk->tanggal_selesai ?></td>
        <td>
          <?php
            $pegawai = $this->db->query("SELECT id_user from jobdesk_pegawai where id_jobdesk =  $jobdesk->id_jobdesk")->result();
            foreach ($pegawai as $pegawai) {
              $nama = $this->db->query("SELECT first_name,last_name from users where id=$pegawai->id_user")->row();
              echo "<li>" . $nama->first_name . " " . $nama->last_name . "</li>";
            }
          ?>
        </td>
        <td><?php echo $jobdesk->masa_tenggat ?></td>
      </tr>
    <?php
          }
    ?>
  </table>
</body>
<script type="text/javascript">
  window.print()
</script>

</html>