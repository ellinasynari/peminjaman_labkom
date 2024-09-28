<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#data_peminjaman" id="data_peminjaman-tab" role="tab" data-toggle="tab" aria-expanded="true">Data Peminjaman</a>
    </li>
  </ul>
  <!-- Data Peminjaman -->
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade in fa-hover active" id="data_peminjaman" aria-labelledby="data_peminjaman-tab">
      <table class="table table-border" id="datatable-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th>Hari</th>
            <th>Tanggal Peminjaman</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Keperluan</th>
            <th>Kelas/ yang diajar</th>
            <th>Nama Peminjam</th>
            <th>Status</th>
            <th>Tempat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($pinjam->result() as $row): ?>
            <tr>
              <td><?php echo $i; $i=$i+1?> </td>
              <td>
                <?php 
                  $date = date_create($row->tgl_pinjam);
                  $hari = date_format($date, 'D');
                  switch($hari){
                    case 'Sun': $hari_ini = "Minggu"; break;
                    case 'Mon': $hari_ini = "Senin"; break;
                    case 'Tue': $hari_ini = "Selasa"; break;
                    case 'Wed': $hari_ini = "Rabu"; break;
                    case 'Thu': $hari_ini = "Kamis"; break;
                    case 'Fri': $hari_ini = "Jumat"; break;
                    case 'Sat': $hari_ini = "Sabtu"; break;
                    default: $hari_ini = "Tidak di ketahui"; break;
                  }
                  echo $hari_ini;
                ?>
              </td>
              <td><?php echo date($row->tgl_pinjam) ?></td>
              <td class="time"><?php echo $row->jam_mulai ; ?></td>
              <td class="time"><?php echo $row->jam_selesai ; ?></td>
              <td class="time"><?php echo $row->keperluan ; ?></td>
              <td class="time"><?php echo $row->lembaga ; ?></td>
              <td class="time"><?php echo $row->nama_user ; ?></td>
              <td class="time">
                <?php 
                  if ($row->st==0) {
                    echo '<span class="label label-danger">Reject</span>';
                  }elseif ($row->st==1) {
                    echo '<span class="label label-info">Pending</span>';
                  }elseif ($row->st == 2){
                    echo '<span class="label label-success">Accept</span>';
                  } else {
                    echo '<span class="label label-primary">Completed</span>';
                  }
                ?>
              </td>
              <td class="time"><?php echo $row->nama_ruang ; ?></td>
              <td class="fa-hover">
                <?php if ($row->st == 1){ ?>
                  <a href="<?php echo base_url('admin/accept_peminjaman/'.$row->id_pinjam) ?>" class="btn btn-sm btn-success"><i class='fa fa-check'></i></a>
                  <a href="<?php echo base_url('admin/reject_peminjaman/'.$row->id_pinjam) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Reject?')"><i class='fa fa-times'></i></a>
                <?php } else {
                  echo "<i class='fa fa-check'></i>";
                } ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Tambahkan CSS untuk row-red -->
<style>
  .row-red {
    background-color: red !important;
    color: white !important; /* Mengubah warna teks menjadi putih */
  }
</style>


<!-- Tambahkan jQuery dan skrip untuk mewarnai baris yang mirip -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    console.log("jQuery is running!");

    var rows = $('#datatable-responsive tbody tr');

    rows.each(function () {
      var currentRow = $(this);
      var currentStatus = currentRow.find('td').eq(8).text().trim();
      var currentHari = currentRow.find('td').eq(1).text().trim();
      var currentJamMulai = currentRow.find('td').eq(3).text().trim();
      var currentJamSelesai = currentRow.find('td').eq(4).text().trim();
      var currentTempat = currentRow.find('td').eq(9).text().trim();

      // Hanya bekerja jika status "Pending"
      if (currentStatus === "Pending") {
        rows.not(currentRow).each(function () {
          var otherRow = $(this);
          var otherStatus = otherRow.find('td').eq(8).text().trim();
          var otherHari = otherRow.find('td').eq(1).text().trim();
          var otherJamMulai = otherRow.find('td').eq(3).text().trim();
          var otherJamSelesai = otherRow.find('td').eq(4).text().trim();
          var otherTempat = otherRow.find('td').eq(9).text().trim();

          if (currentHari === otherHari && currentTempat === otherTempat &&
              (currentJamMulai === otherJamMulai || currentJamSelesai === otherJamSelesai)) {
            console.log("Match found! Changing color to red.");
            currentRow.addClass('row-red');
          }
        });
      }
    });
  });
</script>
