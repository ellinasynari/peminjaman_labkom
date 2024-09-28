<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_ruang');
        $this->load->model('Model_user');
        $this->load->library('session');  // Memastikan session library di-load
        // Jika Anda menggunakan library template, pastikan untuk memuatnya
        // $this->load->library('template');
        ceklogin();
    }

    function index() {
        $data['jam'] = $this->Model_ruang->getJam();
        $data['pinjam'] = $this->Model_ruang->getDaftarPinjam()->result();
        $data['ruang'] = $this->Model_ruang->getAll();
        $data['user'] = $this->session->userdata('id');

        // Load view ke dalam variabel $contents
        $data['contents'] = $this->load->view('user/Daftar_pinjam', $data, TRUE);

        // Load Template.php dan kirim $data
        $this->load->view('Template', $data);
    }

    function pinjam() {
        if(isset($_POST['submit'])){
            // Panggil model untuk menyimpan data peminjaman
            $this->Model_ruang->pinjam();
            // Redirect ke halaman user setelah berhasil menambah peminjaman
            redirect(base_url('user'));
        } else {
            // Jika form tidak di-submit, tampilkan halaman form dengan data yang diperlukan
            $data['jam'] = $this->Model_ruang->getJam();
            $data['pinjam'] = $this->Model_ruang->getDaftarPinjam()->result();
            $data['ruang'] = $this->Model_ruang->getAll();
            $data['user'] = $this->session->userdata('id');

            // Load view untuk menampilkan form tambah peminjaman
            $data['contents'] = $this->load->view('user/Daftar_pinjam', $data, TRUE);
            $this->load->view('Template', $data);
        }
    }

    function Peminjaman() {
        $id = $this->session->userdata('id');
        $data['peminjaman'] = $this->Model_ruang->getDaftarPinjamSaya($id)->result();
        $data['ruang'] = $this->Model_ruang->getAll();
        $data['user'] = $this->session->userdata('id');
        $this->load->view('Template', $data);
        $this->load->view('user/Daftar_pinjam_Saya', $data);
    }

	public function Profile() {
		if ($this->input->post('last_pass') == $this->session->userdata('password')) {
			if ($this->input->post('pass') == $this->input->post('confirm_pass')) {
				$this->Model_user->UpdateProfile();
				echo '<script>alert("Data has been changed");</script>';
				$this->session->sess_destroy();
				redirect('auth/form_login');  // Redirect setelah session dihancurkan
			} else {
				echo '<script>alert("Confirm Password is not the same");</script>';
				$this->index();  // Kembali ke halaman utama
			}
		} else {
			echo '<script>alert("Your password is invalid");</script>';
			$this->index();  // Kembali ke halaman utama
		}
	}

    function Cetak() {
        $id = $this->uri->segment(3);
        $data['peminjaman'] = $this->Model_ruang->getPinjam($id)->result();
        $pinjam = $data['peminjaman'];
        $tgl = $pinjam[0]->tgl_pinjam;
        $hari = date("D", strtotime($tgl));
        $jam = strtotime($pinjam[0]->jam_mulai);

        if ($hari == "Sat" || $hari == "Sun" || $jam > strtotime('17:20:00')) {
            $this->load->view('user/Cetak_dokumen_khusus', $data);
        } else {
            $this->load->view('user/Cetak_dokumen', $data);
        }
    }
}

?>
