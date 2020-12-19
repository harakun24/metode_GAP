<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public static $session;
	function __construct()
	{
		self::$session = session();
		$this->admin = new \App\Models\adminModel();
	}
	public function index()
	{
		return redirect()->to('Admin');
	}
	public function isLogged()
	{
		return self::$session->get('logged');
	}
	public function login()
	{
		if ($this->isLogged())
			return redirect()->to('/Sistem');
		else
			return view('login');
	}
	public function proses()
	{
		// dd($this->request->getVar());
		$data = ['username' => $this->request->getVar('username'), 'password' => $this->request->getVar('pass')];
		$admin = $this->admin->where($data)->first();
		if ($admin != null) {
			self::$session->set('logged', true);
			self::$session->set('user', $admin['nama_admin']);
		}
		return redirect()->to('/admin');
	}
	public function logout()
	{
		self::$session->set('logged', false);
		return redirect()->to('/admin');
	}
	//--------------------------------------------------------------------

}