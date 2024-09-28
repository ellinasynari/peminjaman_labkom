<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#data_ruang" role="tab" id="data_ruang-tab" data-toggle="tab" aria-expanded="false">Data Ruang</a>
    </li>
  </ul>
  <!-- Data Peminjaman -->
  <div id="myTabContent" class="tab-content">
    <!-- Data User -->
    <div role="tabpanel" class="tab-pane fade in fa-hover active" id="data_user" aria-labelledby="data_user-tab">
      <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#modalUser">Tambah User</button>
      <form name="formgroup" method="post" action="<?php echo base_url('admin') ?>">
        <table id="datatable-fixed-header" class="table table-striped table-bordered bulk_action dataTable no-footer">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>NIS/NIP</th>
              <th>Status</th>
              <th>Status Akun User</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $j = 1;
            foreach ($user->result() as $catUser): ?>
              <tr>
                <td><?php echo $j; $j=$j+1?></td>
                <td><?php echo $catUser->nama_user ?></td>
                <td><?php echo $catUser->NIM_NIP ?></td>
                <td><?php if ($catUser->status == 1){
                  echo "Mahasiswa";
                } elseif ($catUser->status == 2) {
                  echo "Dosen";
                } elseif ($catUser->status == 3){
                  echo "Karyawan";
                } else {
                  echo "Staf";
                } ?></td>
                <td>
                  <?php if (!empty($catUser->pass)){ ?>
                    <span class="label label-success">Active</span>
                  <?php } else { ?>
                    <span class="label label-danger">Not Active</span>
                  <?php } ?>
                </td>
                <td>
                  <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/edit_user/'.$catUser->NIM_NIP) ?>">Edit</a>
                  <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editUser">Edit</button> -->
                  <input type="hidden" name="nim_nip" value="<?php echo $catUser->NIM_NIP ?>">
                  <input type="submit" name="deleteUser" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure?')">
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </form>
    </div>
    <div id="modalUser" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah User</h4>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url('admin/user') ?>">
                    <div>
                      <input type="text" name="nama_user" class="form-control" required="" placeholder="Nama User" required="">
                    </div>
                    <div>
                      <input type="text" name="nim_nip" class="form-control" required="" placeholder="NIS/NIP User" required="">
                    </div>
                    <div>
                      <select class="form-control" name="status" required="">
                        <option>Pilih Status</option>
                        <option value="1">Murid</option>
                        <option value="2">Guru/Staff</option>
                      </select>
                    </div>
                    <!--<div>
                      <select class="form-control" name="prodi" required="">
                        <option>Pilih Kelas</option>
                        <option value="10 ASIAH">10 ASIAH</option>
                      </select>
                    </div>-->
                    <br>
                    <input type="submit" name="tambahUser" value="Tambah" class="btn btn-sm btn-success">
                  </form>
                </div>
              </div>
          </div>
      </div>
    <!-- Data Ruang -->
  </div>
</div>