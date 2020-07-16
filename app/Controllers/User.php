<?php
namespace App\Controllers;
use App\Models\M_update; //tambahan kode

class User extends BaseController
{
	public function index()
	{
		if (session()->get('id_nama') == '') {
			session()->setFlashdata('gagal', 'Anda belum login');
			return redirect()->to(base_url('login'));
		}
		$model = new M_update();
		$data['user'] = $model->get_user();
		return view('user_dashboard', $data);
	}
	public function tambahdata()
	{
		echo view('tambah');
	}
	public function save()
	{
		$model = new M_update();
		$data = [
			'nama' => $this->request->getPost('nama'),
			'email' => $this->request->getPost('email')
		];
		$model->saveUser($data);
		return redirect()->to('/user');
	}
	public function delete($id)
	{
		$model = new M_update();
		$model->deleteUser($id);
		return redirect()->to('/user');
	}
	public function edit($id)
	{
		$model = new M_update();
		$data['user'] = $model->get_user($id)->getRow();
		return view('editdata', $data);
	}
	public function updateData()
	{
		$model = new M_update();
		$id = $this->request->getPost('id_user');
		$data = [
			'nama' => $this->request->getPost('nama'),
			'email' => $this->request->getPost('email')
		];
		$model->updateUser($data, $id);
		return redirect()->to('/user');
	}
}