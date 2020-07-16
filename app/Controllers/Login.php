<?php namespace App\Controllers;

use App\Models\M_user;

class Login extends BaseController
{
	public function index()
	{
		return view('user_form');
    }
    public function login_action()
    {
        $masuk = new M_user();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $masuk->get_data($username, $password);

        if (($cek['id_username'] == $username) && ($cek['id_password'] == $password))
        {
            session()->set('id_username', $cek['id_username']);
            session()->set('id_nama', $cek['id_nama']);
            session()->set('id_user', $cek['id_user']);
            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('gagal', 'Email / Password salah'); //tambahan kode
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}