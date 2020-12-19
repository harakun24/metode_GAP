<?php

namespace App\Controllers;

class Sistem extends BaseController
{
	function __construct()
	{
		$this->siswa = new \App\Models\siswaModel();
		$this->kriteria = new \App\Models\kriteriaModel();
		$this->sub = new \App\Models\subkriteriaModel();
		$this->nilai = new \App\Models\nilaiModel();
	}
	public function index()
	{
		$data = [
			'kriteria' => $this->kriteria->countAll(),
			'sub' => $this->sub->countAll(),
			'siswa' => $this->siswa->countAll(),
			'nilai' => $this->nilai->countAll(),
		];
		if ($this->isLogged())
			return view('sistem/home', $data);
		else
			return redirect()->to('/Admin');
	}
	public function isLogged()
	{
		$min = new Admin();
		return ($min::$session->get('logged'));
	}
	public function setSuccess()
	{
		$this->session->set('logged', true);
	}
	public function satu()
	{
		if ($this->isLogged())
			echo "logged in";
		else
			echo "logged out";
	}
	public function signOut()
	{
		$this->session->set('logged', false);
		return redirect()->to('/Admin');
	}
	//crud Alternatif
	public function alternatif()
	{
		$data['siswa'] = $this->siswa->findAll();
		return view('sistem/alternatif', $data);
	}
	public function tambah_siswa()
	{
		// dd($this->request->getVar());
		$data = $this->request->getVar();
		// dd($this->siswa);
		$this->siswa->save([
			'nama_siswa' => $data['nama'],
			'jenis_kelamin' => $data['jk'],
			'nisn' => $data['nis'],
		]);
		session()->setFlashData('insert', true);
		return redirect()->to('/Sistem/alternatif');
	}
	public function ubah_siswa($id)
	{
		// dd($this->request->getVar());
		$data = $this->request->getVar();
		// dd($this->siswa);
		$this->siswa->save([
			'id_alternatif' => $id,
			'nama_siswa' => $data['nama'],
			'jenis_kelamin' => $data['jk'],
			'nisn' => $data['nis'],
		]);
		session()->setFlashData('update', true);
		return redirect()->to('/Sistem/alternatif');
	}
	public function hapus_siswa($id)
	{
		$this->siswa->delete($id);
		session()->setFlashData('delete', true);
		return redirect()->to('/Sistem/alternatif');
	}
	public function get_siswa($id)
	{
		echo json_encode($this->siswa->find($id));
	}
	public function batch_siswa()
	{
		$this->siswa->emptyTable();
		session()->setFlashData('delete', true);
		return redirect()->to('/Sistem/alternatif');
	}
	//--------------------------------------------------------------------
	public function kriteria()
	{
		$data['kriteria'] = $this->kriteria->findAll();
		return view('sistem/kriteria', $data);
	}
	public function tambah_kriteria()
	{
		// dd($this->request->getVar());
		$data = $this->request->getVar();
		$this->kriteria->save([
			'nama_kriteria' => $data['nama'],
			'bobot_kriteria' => $data['bobot'],
			'bobot_core' => $data['core'],
			'bobot_secondary' => $data['secodnary'],
		]);
		session()->setFlashData('insert', true);
		return redirect()->to('/Sistem/kriteria');
	}
	public function ubah_kriteria($id)
	{
		// dd($this->request->getVar());
		$data = $this->request->getVar();
		// dd($this->siswa);
		$this->kriteria->save([
			'id_kriteria' => $id,
			'nama_kriteria' => $data['nama'],
			'bobot_kriteria' => $data['bobot'],
			'bobot_core' => $data['core'],
			'bobot_secondary' => $data['secodnary'],
		]);
		session()->setFlashData('update', true);
		return redirect()->to('/Sistem/kriteria');
	}
	public function hapus_kriteria($id)
	{
		$this->kriteria->delete($id);
		session()->setFlashData('delete', true);
		return redirect()->to('/Sistem/kriteria');
	}
	public function get_kriteria($id)
	{
		echo json_encode($this->kriteria->find($id));
	}
	public function batch_kriteria()
	{
		$this->kriteria->emptyTable();
		session()->setFlashData('delete', true);
		return redirect()->to('/Sistem/kriteria');
	}
	//--------------------------------------------------------------------
	public function subkriteria()
	{
		$data['subkriteria'] = $this->sub->findAll();
		$data['kriteria'] = $this->kriteria->findAll();
		$i = 0;
		foreach ($data['subkriteria'] as $d) {
			$d['kriteria'] = $this->kriteria->find($d['id_kriteria'])['nama_kriteria'];
			$d['bobot'] = $d['tipe'] == 'core' ? $this->kriteria->find($d['id_kriteria'])['bobot_core'] : $this->kriteria->find($d['id_kriteria'])['bobot_secondary'];
			$data['subkriteria'][$i++] = $d;
		}
		return view('sistem/subkriteria', $data);
	}
	public function tambah_subkriteria()
	{
		// dd($this->request->getVar());
		$data = $this->request->getVar();
		// dd($data);
		$this->sub->save([
			'id_kriteria' => $data['kriteria'],
			'nama_subkriteria' => $data['sub'],
			'nilai_target' => $data['bobot'],
			'tipe' => $data['tipe'],
		]);
		session()->setFlashData('insert', true);
		return redirect()->to('/Sistem/subkriteria');
	}
	public function ubah_subkriteria($id)
	{
		// dd($this->request->getVar());
		$data = $this->request->getVar();
		// dd($this->siswa);
		$this->sub->save([
			'id_subkriteria' => $id,
			'id_kriteria' => $data['kriteria'],
			'nama_subkriteria' => $data['sub'],
			'nilai_target' => $data['bobot'],
			'tipe' => $data['tipe'],
		]);
		session()->setFlashData('update', true);
		return redirect()->to('/Sistem/subkriteria');
	}
	public function hapus_subkriteria($id)
	{
		$this->sub->delete($id);
		session()->setFlashData('delete', true);
		return redirect()->to('/Sistem/subkriteria');
	}
	public function get_subkriteria($id)
	{
		echo json_encode($this->sub->find($id));
	}
	public function batch_subkriteria()
	{
		$this->sub->emptyTable();
		session()->setFlashData('delete', true);
		return redirect()->to('/Sistem/subkriteria');
	}
	//--------------------------------------------------------------------

	public function penilaian()
	{

		$data = json_decode($this->refresh(), true);
		return view('sistem/penilaian', $data);
	}
	public function refresh()
	{
		$data = [
			'siswa' => $this->siswa->findAll()
		];
		$res = [];
		$siswa = [];
		foreach ($data['siswa'] as $s) {
			// d($s['nama_siswa']);
			array_push($siswa, $s['nama_siswa']);
			$res[$s['nama_siswa']] = [];
			$sub = $this->sub->findAll();
			foreach ($sub as $sk) {
				// d($sk);
				$nilai = $this->nilai->where([
					'id_alternatif' => $s['id_alternatif'],
					'id_subkriteria' => $sk['id_subkriteria'],
				])->first();
				if ($nilai == null) {
					$this->nilai->save([
						'id_alternatif' => $s['id_alternatif'],
						'id_subkriteria' => $sk['id_subkriteria'],
						'nilai' => 0
					]);
					array_push($res[$s['nama_siswa']], [
						'sub' => $sk['nama_subkriteria'],
						'idsub' => $sk['id_subkriteria'],
						'idsiswa' => $s['id_alternatif'],
						'nilai' => 0
					]);
				} else {
					array_push($res[$s['nama_siswa']], [
						'sub' => $sk['nama_subkriteria'],
						'idsub' => $sk['id_subkriteria'],
						'idk' => $sk['id_kriteria'],
						'idsiswa' => $s['id_alternatif'],
						'nilai' => $nilai['nilai']
					]);
				}
			}
		}
		$data['prep'] = [
			'siswa' => $siswa,
			'res' => $res,
			'kriteria' => $this->kriteria->findAll(),
			'subkriteria' => $this->sub->findAll()
		];
		return json_encode($data);
	}

	public function nilai($sub, $siswa, $nilai)
	{
		$n = $this->nilai->where([
			'id_subkriteria' => $sub,
			'id_alternatif' => $siswa,
		])->first();
		// dd($n['id_penilaian']);
		$this->nilai->save([
			'id_penilaian' => $n['id_penilaian'],
			'nilai' => $nilai
		]);
		$n2 = $this->nilai->where([
			'id_subkriteria' => $sub,
			'id_alternatif' => $siswa,
		])->first();
		echo json_encode($n2);
	}
}