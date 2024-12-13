<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('webmodel');
    }

	public function index()
	{
		if(!$this->session->userdata('role')){
			$this->load->view('auth/login');
		}
		elseif($this->session->userdata('role')==='admin'){
			$data['user'] = $this->db->get_where('user',['id'=>$this->session->userdata('id')])->row_array();
			$this->load->view('admin/index',$data);
		}
		elseif($this->session->userdata('role')==='pasien'){
			$data['user'] = $this->db->get_where('user',['id'=>$this->session->userdata('id')])->row_array();
			$this->load->view('pasien/index',$data);
		}
		else{
			$data['user'] = $this->db->get_where('user',['id'=>$this->session->userdata('id')])->row_array();
			$this->load->view('dokter/index',$data);
		}
	}
	
	public function daftar(){
		if($this->session->userdata('id')){
			redirect('home');
		}
		else{
			$this->load->view('auth/daftar');
		}
	}
	
	public function data_dokter(){
		if($this->session->userdata('role')!=='admin'){
			redirect('home');
		}
		else{
			$data['user'] = $this->db->get_where('user',['id'=>$this->session->userdata('id')])->row_array();
			$data['poli'] = $this->db->get('poli')->result_array();
			$data['dokter'] = $this->db->query("SELECT dokter.*, poli.id AS idpoli, poli.nama_poli
								FROM dokter
								JOIN poli ON dokter.id_poli = poli.id")->result_array();
			$this->load->view('admin/data_dokter',$data);
		}
	}
	
	public function data_pasien(){
		if($this->session->userdata('role')!=='admin'){
			redirect('home');
		}
		else{
			$data['user'] = $this->db->get_where('user',['id'=>$this->session->userdata('id')])->row_array();
			$data['pasien'] = $this->db->get('pasien')->result_array();
			$this->load->view('admin/data_pasien',$data);
		}
	}
	
	public function data_obat(){
		if($this->session->userdata('role')!=='admin'){
			redirect('home');
		}
		else{
			$data['user'] = $this->db->get_where('user',['id'=>$this->session->userdata('id')])->row_array();
			$data['obat'] = $this->db->get('obat')->result_array();
			$this->load->view('admin/data_obat',$data);
		}
	}
	
	public function data_poli(){
		if($this->session->userdata('role')!=='admin'){
			redirect('home');
		}
		else{
			$data['user'] = $this->db->get_where('user',['id'=>$this->session->userdata('id')])->row_array();
			$data['poli'] = $this->db->get('poli')->result_array();
			$this->load->view('admin/data_poli',$data);
		}
	}

	public function proses_daftar(){
		$nama = $this->input->post('namaPasien');
		$alamat = $this->input->post('alamatPasien');
		$ktp = $this->input->post('ktpPasien');
		$hp = $this->input->post('hpPasien');
		$cekKTP = $this->db->get_where('pasien',['no_ktp'=>$ktp])->row_array();
		if($cekKTP){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed', 'message' => '']);
		}
		else{
			$dataUser = [
				'username' => $nama,
				'password' => password_hash($alamat, PASSWORD_BCRYPT),
				'role' => 'pasien'
			];
			$this->db->insert('user', $dataUser);

			$iduser = $this->db->insert_id();
			$dataPasien = [
				'nama' => $nama,
				'alamat' => $alamat,
				'no_ktp' => $ktp,
				'no_hp' => $hp,
				'no_rm' => $this->webmodel->nomor_rm(),
				'id_user' => $iduser
			];
			$this->db->insert('pasien', $dataPasien);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke', 'message' => '']);
		}
	}

	public function proses_login(){		
		$nama = $this->input->post('namaPasien');
		$alamat = $this->input->post('alamatPasien');

		$cekUser = $this->db->get_where('user',['username'=>$nama])->row_array();
		if($cekUser){
			$pass = password_verify($alamat, $cekUser['password']);
			if($pass){
				$dataSession = [
					'id' => $cekUser['id'],
					'role' => $cekUser['role']
				];
				$this->session->set_userdata($dataSession);
				header('Content-Type: application/json');
				echo json_encode(['status' => 'oke']);
			}else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'pass']);
			}
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	// ADMIN >>> POLI
	public function tambah_poli(){
		$nama_poli = $this->input->post('namaPoli');
		$keterangan = $this->input->post('keteranganPoli');

		$datas = [
			'nama_poli' => $nama_poli,
			'keterangan' => $keterangan
		];

		if($this->db->insert('poli',$datas)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function update_poli(){
		$id_poli = $this->input->post('idPoli');
		$nama_poli = $this->input->post('namaPoli');
		$keterangan = $this->input->post('keteranganPoli');

		$datas = [
			'nama_poli' => $nama_poli,
			'keterangan' => $keterangan
		];

		$where = ['id'=>$id_poli];

		if($this->db->update('poli',$datas,$where)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function delete_poli(){
		$id_poli = $this->input->post('id');
		$where = ['id'=>$id_poli];

		if($this->db->delete('poli',$where)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function ambil_data_poli_by_id(){
		$idpoli = $this->input->post('id');
		$data = $this->db->get_where('poli',['id'=>$idpoli])->row_array();
		if($data){
			echo json_encode($data);
		}
	}

	// ADMIN >>> OBAT
	public function tambah_obat(){
		$nama_obat = $this->input->post('namaObat');
		$kemasan = $this->input->post('kemasanObat');
		$harga = $this->input->post('hargaObat');

		$datas = [
			'nama_obat' => $nama_obat,
			'kemasan' => $kemasan,
			'harga' => $harga
		];

		if($this->db->insert('obat',$datas)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function ambil_data_obat_by_id(){
		$idobat = $this->input->post('id');
		$data = $this->db->get_where('obat',['id'=>$idobat])->row_array();
		if($data){
			echo json_encode($data);
		}
	}

	public function update_obat(){
		$id_obat = $this->input->post('idObat');
		$nama_obat = $this->input->post('namaObat');
		$kemasan = $this->input->post('kemasanObat');
		$harga = $this->input->post('hargaObat');

		$datas = [
			'nama_obat' => $nama_obat,
			'kemasan' => $kemasan,
			'harga' => $harga
		];

		$where = ['id'=>$id_obat];

		if($this->db->update('obat',$datas,$where)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function delete_obat(){
		$id_obat = $this->input->post('id');
		$where = ['id'=>$id_obat];

		if($this->db->delete('obat',$where)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	// ADMIN >>> DOKTER
	public function tambah_dokter(){
		$nama_dokter = $this->input->post('namaDokter');
		$alamat = $this->input->post('alamatDokter');
		$nohp = $this->input->post('nohpDokter');
		$poli = $this->input->post('poliDokter');

		$dataUser = [
			'username' => $nama_dokter,
			'password' => password_hash($alamat, PASSWORD_BCRYPT),
			'role' => 'dokter'
		];

		if($this->db->insert('user',$dataUser)){
			$iduser = $this->db->insert_id();
			$datas = [
				'nama' => $nama_dokter,
				'alamat' => $alamat,
				'no_hp' => $nohp,
				'id_poli' => $poli,
				'id_user' => $iduser
			];
			if($this->db->insert('dokter',$datas)){
				header('Content-Type: application/json');
				echo json_encode(['status' => 'oke']);
			}
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function ambil_data_dokter_by_id(){
		$iddokter = $this->input->post('id');
		$data = $this->db->get_where('dokter',['id'=>$iddokter])->row_array();
		if($data){
			echo json_encode($data);
		}
	}

	public function update_dokter(){
		$id_dokter = $this->input->post('idDokter');
		$id_user = $this->input->post('idUser');
		$nama_dokter = $this->input->post('namaDokter');
		$alamat = $this->input->post('alamatDokter');
		$nohp = $this->input->post('nohpDokter');
		$idpoli = $this->input->post('idPoli');

		$dataUser = [
			'username' => $nama_dokter,
			'password' => password_hash($alamat,PASSWORD_BCRYPT)
		];

		$where = ['id'=>$id_user];
		if($this->db->update('user',$dataUser,$where)){
			$datas = [
				'nama' => $nama_dokter,
				'alamat' => $alamat,
				'no_hp' => $nohp,
				'id_poli' => $idpoli
			];
	
			$where = ['id'=>$id_dokter];
			if($this->db->update('dokter',$datas,$where)){
				header('Content-Type: application/json');
				echo json_encode(['status' => 'oke']);
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'failed']);
			}
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function delete_dokter(){
		$id_dokter = $this->input->post('id');
		$id_user = $this->input->post('iduser');
		$where = ['id'=>$id_user];

		if($this->db->delete('user',$where)){
			$where = ['id'=>$id_dokter];
			if($this->db->delete('dokter',$where)){
				header('Content-Type: application/json');
				echo json_encode(['status' => 'oke']);
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'failed']);
			}
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	// ADMIN >>> PASIEN
	public function tambah_pasien(){
		$nama_pasien = $this->input->post('namaPasien');
		$alamat = $this->input->post('alamatPasien');
		$nohp = $this->input->post('nohpPasien');
		$noktp = $this->input->post('noktpPasien');

		$cekKTP = $this->db->get_where('pasien',['no_ktp'=>$noktp])->row_array();
		if($cekKTP){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'duplicate']);
		}
		else{
			$dataUser = [
				'username' => $nama_pasien,
				'password' => password_hash($alamat, PASSWORD_BCRYPT),
				'role' => 'pasien'
			];
	
			if($this->db->insert('user',$dataUser)){
				$iduser = $this->db->insert_id();
				$datas = [
					'nama' => $nama_pasien,
					'alamat' => $alamat,
					'no_ktp' => $noktp,
					'no_hp' => $nohp,
					'no_rm' => $this->webmodel->nomor_rm(),
					'id_user' => $iduser
				];
				if($this->db->insert('pasien',$datas)){
					header('Content-Type: application/json');
					echo json_encode(['status' => 'oke']);
				}
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'failed']);
			}
		}
	}

	public function ambil_data_pasien_by_id(){
		$idpasien = $this->input->post('id');
		$data = $this->db->get_where('pasien',['id'=>$idpasien])->row_array();
		if($data){
			echo json_encode($data);
		}
	}

	public function update_pasien(){
		$id_pasien = $this->input->post('idPasien');
		$id_user = $this->input->post('idUser');
		$nama_pasien = $this->input->post('namaPasien');
		$alamat = $this->input->post('alamatPasien');
		$noktp = $this->input->post('noktpPasien');
		$nohp = $this->input->post('nohpPasien');

		$cekKTP = $this->db->get_where('pasien',['no_ktp'=>$noktp])->row_array();
		if($cekKTP && $cekKTP['id']===$id_pasien){
			$dataUser = [
				'username' => $nama_pasien,
				'password' => password_hash($alamat, PASSWORD_BCRYPT)
			];

			$whereUser = ['id'=>$id_user];
			if($this->db->update('user',$dataUser,$whereUser)){
				$datas = [
					'nama' => $nama_pasien,
					'alamat' => $alamat,
					'no_ktp' => $noktp,
					'no_hp' => $nohp,
				];
		
				$where = ['id'=>$id_pasien];
				if($this->db->update('pasien',$datas,$where)){
					header('Content-Type: application/json');
					echo json_encode(['status' => 'oke']);
				}
				else{
					header('Content-Type: application/json');
					echo json_encode(['status' => 'failed']);
				}
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'failed']);
			}
		}
		elseif($cekKTP){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'duplicate']);
		}
		else{
			$dataUser = [
				'username' => $nama_pasien,
				'password' => password_hash($alamat, PASSWORD_BCRYPT)
			];

			$whereUser = ['id'=>$id_user];
			if($this->db->update('user',$dataUser,$whereUser)){
				$datas = [
					'nama' => $nama_pasien,
					'alamat' => $alamat,
					'no_ktp' => $noktp,
					'no_hp' => $nohp,
				];
		
				$where = ['id'=>$id_pasien];
				if($this->db->update('pasien',$datas,$where)){
					header('Content-Type: application/json');
					echo json_encode(['status' => 'oke']);
				}
				else{
					header('Content-Type: application/json');
					echo json_encode(['status' => 'failed']);
				}
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'failed']);
			}
		}
	}

	public function delete_pasien(){
		$id_pasien = $this->input->post('id');
		$id_user = $this->input->post('iduser');
		$where = ['id'=>$id_user];

		if($this->db->delete('user',$where)){
			$where = ['id'=>$id_pasien];
			if($this->db->delete('pasien',$where)){
				header('Content-Type: application/json');
				echo json_encode(['status' => 'oke']);
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'failed']);
			}
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
		
	}

	public function logout(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('role');
        redirect('home');
    }
}