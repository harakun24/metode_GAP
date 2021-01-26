<?php

namespace App\Controllers;

class Sistem extends BaseController
{
    public function __construct()
    {
        $this->siswa = new \App\Models\siswaModel();
        $this->kriteria = new \App\Models\kriteriaModel();
        $this->sub = new \App\Models\subkriteriaModel();
        $this->nilai = new \App\Models\nilaiModel();
        $this->ranking = new \App\Models\rankingModel();
    }
    public function index()
    {
        $data = [
            'kriteria' => $this->kriteria->countAll(),
            'sub' => $this->sub->countAll(),
            'siswa' => $this->siswa->countAll(),
            'nilai' => $this->nilai->countAll(),
        ];
        if ($this->isLogged()) {
            return view('sistem/home', $data);
        } else {
            return redirect()->to('/Admin');
        }

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
        if ($this->isLogged()) {
            echo "logged in";
        } else {
            echo "logged out";
        }

    }
    public function signOut()
    {
        $this->session->set('logged', false);
        return redirect()->to('/Admin');
    }
    //crud Alternatif
    public function alternatif()
    {
        if ($this->isLogged()) {
            $data['siswa'] = $this->siswa->findAll();
            return view('sistem/alternatif', $data);
        } else {
            return redirect()->to('/Admin');
        }

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
        if ($this->isLogged()) {
            $data['kriteria'] = $this->kriteria->findAll();
            return view('sistem/kriteria', $data);
        } else {
            return redirect()->to('/Admin');
        }

    }
    public function tambah_kriteria()
    {
        // dd($this->request->getVar());
        $data = $this->request->getVar();
        $this->kriteria->save([
            'nama_kriteria' => $data['nama'],
            'bobot_kriteria' => $data['bobot'],
            'bobot_core' => $data['core'],
            'jenis' => $data['jenis'],
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
            'jenis' => $data['jenis'],
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
        if ($this->isLogged()) {
            $data['subkriteria'] = $this->sub->findAll();
            $data['kriteria'] = $this->kriteria->findAll();
            $i = 0;
            foreach ($data['subkriteria'] as $d) {
                $d['kriteria'] = $this->kriteria->find($d['id_kriteria'])['nama_kriteria'];
                $d['bobot'] = $d['tipe'] == 'core' ? $this->kriteria->find($d['id_kriteria'])['bobot_core'] : $this->kriteria->find($d['id_kriteria'])['bobot_secondary'];
                $data['subkriteria'][$i++] = $d;
            }
            return view('sistem/subkriteria', $data);
        } else {
            return redirect()->to('/Admin');
        }

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
        if ($this->isLogged()) {
            $data = json_decode($this->refresh2(), true);
            return view('sistem/penilaian', $data);
        } else {
            return redirect()->to('/Admin');
        }

    }
    public function refresh()
    {
        $data = [
            'siswa' => $this->siswa->findAll(),
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
                $k = $this->kriteria->find($sk['id_kriteria']);
                $def = $k['jenis'] == "angka" ? 0 : "E";

                if ($nilai == null) {
                    $this->nilai->save([
                        'id_alternatif' => $s['id_alternatif'],
                        'id_subkriteria' => $sk['id_subkriteria'],
                        'nilai' => $def,
                    ]);
                    array_push($res[$s['nama_siswa']], [
                        'sub' => $sk['nama_subkriteria'],
                        'target' => $sk['nilai_target'],
                        'idsub' => $sk['id_subkriteria'],
                        'idsiswa' => $s['id_alternatif'],
                        'nilai' => $def,
                        'kriteria' => $k['jenis'],
                    ]);
                } else {
                    array_push($res[$s['nama_siswa']], [
                        'sub' => $sk['nama_subkriteria'],
                        'target' => $sk['nilai_target'],
                        'idsub' => $sk['id_subkriteria'],
                        'idk' => $sk['id_kriteria'],
                        'idsiswa' => $s['id_alternatif'],
                        'nilai' => $nilai['nilai'],
                        'kriteria' => $k['jenis'],
                    ]);
                }
            }
        }
        $data['prep'] = [
            'siswa' => $siswa,
            'res' => $res,
            'kriteria' => $this->kriteria->findAll(),
            'subkriteria' => $this->sub->findAll(),
        ];
        return json_encode($data);
    }
    public function refresh2()
    {
        $data = [
            'list' => [],
            'siswa' => $this->siswa->findAll(),
        ];
        foreach ($data['siswa'] as $s) {
            $kriteria = $this->kriteria->findAll();
            $tmp = [
                'siswa' => $s['nama_siswa'],
                'id' => $s['id_alternatif'],
                'data' => [],
            ];
            foreach ($kriteria as $k) {
                $sub = $this->sub->findAll();
                foreach ($sub as $sk) {
                    if ($k['id_kriteria'] == $sk['id_kriteria']) {
                        $nilai = $this->nilai->where([
                            'id_alternatif' => $s['id_alternatif'],
                            'id_subkriteria' => $sk['id_subkriteria'],
                        ])->first();
                        $def = 'E';
                        if ($k['jenis'] == "angka") {
                            $def = "0";
                        } else if ($k['jenis'] == "huruf") {
                            $def = 'E';
                        }

                        if ($nilai == null) {
                            $this->nilai->save([
                                'id_alternatif' => $s['id_alternatif'],
                                'id_subkriteria' => $sk['id_subkriteria'],
                                'nilai' => $def,
                            ]);
                            $nilai = $this->nilai->where([
                                'id_alternatif' => $s['id_alternatif'],
                                'id_subkriteria' => $sk['id_subkriteria'],
                            ])->first();
                        }
                        array_push($tmp['data'], [
                            'k' => $k['id_kriteria'],
                            'sk' => $sk['id_subkriteria'],
                            'nama' => $sk['nama_subkriteria'],
                            'tipe' => $sk['tipe'],
                            'siswa' => $s['id_alternatif'],
                            'profil' => $sk['nilai_target'],
                            'nilai' => $nilai['nilai'],
                        ]);
                    }
                }
            }
            array_push($data['list'], $tmp);
        }
        // dd($data);
        $data['kriteria'] = $this->kriteria->findAll();
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
            'nilai' => $nilai,
        ]);
        $n2 = $this->nilai->where([
            'id_subkriteria' => $sub,
            'id_alternatif' => $siswa,
        ])->first();
        echo json_encode($n2);
    }

    public function gap()
    {
        if ($this->isLogged()) {
            $siswa = $this->siswa->findAll();
            $kriteria = $this->kriteria->findAll();
            $sub = $this->sub->findAll();
            $hasil = [];
            foreach ($siswa as $s) {
                $tmp = [
                    'siswa' => $s['nama_siswa'],
                    'id' => $s['id_alternatif'],
                    'total' => 0,
                    'kriteria' => [],
                ];
                foreach ($kriteria as $k) {
                    $tmp2 = [
                        'nama' => $k['nama_kriteria'],
                        'bobot' => $k['bobot_kriteria'],
                        'total' => 0,
                        'tipe' => [
                            'core' => [
                                'faktor' => 0,
                                'bobot' => $k['bobot_core'],
                                'list' => [],
                            ],
                            'secondary' => [
                                'faktor' => 0,
                                'bobot' => $k['bobot_secondary'],
                                'list' => [],
                            ],
                        ],
                    ];
                    $faktor = 0;
                    foreach ($sub as $sk) {
                        if ($sk['id_kriteria'] == $k['id_kriteria']) {
                            $nilai = $this->nilai->where([
                                'id_alternatif' => $s['id_alternatif'],
                                'id_subkriteria' => $sk['id_subkriteria'],
                            ])->first();
                            $hitung = [
                                'nilai' => $nilai['nilai'],
                                'target' => $sk['nilai_target'],
                                'sub' => $sk['id_subkriteria'],
                                'selisih' => $nilai['nilai'] - $sk['nilai_target'],
                                'bobot' => 0,
                            ];
                            $bobot = 0;
                            switch ($hitung['selisih']) {
                                case 0:
                                    $bobot = 5;
                                    break;
                                case 1:
                                    $bobot = 4.5;
                                    break;
                                case -1:
                                    $bobot = 4;
                                    break;
                                case 2:
                                    $bobot = 3.5;
                                    break;
                                case -2:
                                    $bobot = 3;
                                    break;
                                case 3:
                                    $bobot = 2.5;
                                    break;
                                case -3:
                                    $bobot = 2;
                                    break;
                                case 4:
                                    $bobot = 1.5;
                                    break;
                                case -4:
                                    $bobot = 1;
                                    break;
                            }
                            $faktor += $bobot;
                            $hitung['bobot'] = $bobot;
                            array_push($tmp2['tipe'][$sk['tipe']]['list'], $hitung);
                        }
                    }
                    if (count($tmp2['tipe'][$sk['tipe']]['list']) > 0) {
                        $tmp2['tipe'][$sk['tipe']]['faktor'] = $faktor / count($tmp2['tipe'][$sk['tipe']]['list']);
                    }

                    $tmp2['total'] = $tmp2['tipe']['core']['faktor'] * ($tmp2['tipe']['core']['bobot'] / 100) + $tmp2['tipe']['secondary']['faktor'] * ($tmp2['tipe']['secondary']['bobot'] / 100);
                    array_push($tmp['kriteria'], $tmp2);

                    $tmp['total'] += ($tmp2['bobot'] / 100) * $tmp2['total'];
                }
                array_push($hasil, $tmp);
            }
            $this->ranking->emptyTable();
            $tmp = [];
            $data = [];
            foreach ($hasil as $h) {
                array_push($tmp, $h['total']);
            }
            rsort($tmp);
            foreach ($tmp as $t) {
                foreach ($hasil as $h) {
                    if ($t == $h['total']) {
                        array_push($data, $h);
                        $this->ranking->save([
                            'id_alternatif' => $h['id'],
                            'total' => $h['total'],
                        ]);
                    }
                }
            }
            return view('sistem/ranking', [
                'data' => $data,
                'hasil' => $hasil,
            ]);
        } else {
            return redirect()->to('/Admin');
        }

    }
    public function gap2()
    {
        if ($this->isLogged()) {

            $raw = json_decode($this->refresh2(), true);
            $hasil = [];
            $aspek = $raw['kriteria'];
            $j = 0;
            foreach ($raw['list'] as $r) {
                $r['aspek'] = [];
                $r['total'] = 0;
                foreach ($aspek as $a) {
                    $ask = [
                        'nama' => $a['nama_kriteria'],
                        'ncf' => [
                            'track' => [],
                            'bobot' => $a['bobot_core'],
                            'total' => 0,
                        ],
                        'nsf' => [
                            'track' => [],
                            'bobot' => $a['bobot_secondary'],
                            'total' => 0,
                        ],
                        'bobot' => $a['bobot_kriteria'],
                        'total' => 0,
                        'faktor' => [],
                    ];
                    $i = 0;
                    foreach ($r['data'] as $data) {
                        $bobot = 0;

                        if ($data['k'] == $a['id_kriteria']) {
                            $tmp = 0;
                            if ($a['jenis'] == "angka") {
                                //bobot angka
                                $tmp = (int) $data['profil'];

                                if ($data['nilai'] > 89) {
                                    $bobot = 10;
                                } else if ($data['nilai'] > 79) {
                                    $bobot = 9;
                                } else if ($data['nilai'] > 69) {
                                    $bobot = 8;
                                } else if ($data['nilai'] > 59) {
                                    $bobot = 7;
                                } else if ($data['nilai'] > 49) {
                                    $bobot = 6;
                                } else if ($data['nilai'] > 39) {
                                    $bobot = 5;
                                } else if ($data['nilai'] > 29) {
                                    $bobot = 4;
                                } else if ($data['nilai'] > 19) {
                                    $bobot = 3;
                                } else if ($data['nilai'] > 9) {
                                    $bobot = 2;
                                } else {
                                    $bobot = 1;
                                }

                            } else {
                                if ($data['nilai'] == "A") {
                                    $bobot = 10;
                                } else if ($data['nilai'] == "B") {
                                    $bobot = 9;
                                } else if ($data['nilai'] == "C") {
                                    $bobot = 8;
                                } else if ($data['nilai'] == "D") {
                                    $bobot = 7;
                                } else {
                                    $bobot = 6;
                                }

                                if ($data['profil'] == "A") {
                                    $tmp = 10;
                                } else if ($data['profil'] == "B") {
                                    $tmp = 9;
                                } else if ($data['profil'] == "C") {
                                    $tmp = 8;
                                } else if ($data['profil'] == "D") {
                                    $tmp = 7;
                                } else {
                                    $tmp = 6;
                                }

                            }
                            $gap = $bobot - $tmp;
                            $bobotGAP = 0;

                            switch ($gap) {
                                case 0:
                                    $bobotGAP = 6;
                                    break;
                                case 1:
                                    $bobotGAP = 5.5;
                                    break;
                                case -1:
                                    $bobotGAP = 5;
                                    break;
                                case 2:
                                    $bobotGAP = 4.5;
                                    break;
                                case -2:
                                    $bobotGAP = 4;
                                    break;
                                case 3:
                                    $bobotGAP = 3.5;
                                    break;
                                case -3:
                                    $bobotGAP = 3;
                                    break;
                                case 4:
                                    $bobotGAP = 2.5;
                                    break;
                                case -4:
                                    $bobotGAP = 2;
                                    break;
                                case 5:
                                    $bobotGAP = 1.5;
                                    break;
                                case -5:
                                    $bobotGAP = 1;
                                    break;
                            }

                            $data['bobot'] = $bobot;
                            $data['gap'] = $gap;
                            $data['bg'] = $bobotGAP;

                            if ($data['tipe'] == 'core') {
                                $ask['ncf']['total'] += $bobotGAP;
                                array_push($ask['ncf']['track'], $bobotGAP);
                            } else {
                                $ask['nsf']['total'] += $bobotGAP;
                                array_push($ask['nsf']['track'], $bobotGAP);
                            }
                            // $r['data'][$i] = $data;
                            array_push($ask['faktor'], $data);
                        }
                        $i++;
                    }
                    $ask['total'] =
                        ($ask['ncf']['bobot'] / 100) * ($ask['ncf']['total'] / count($ask['ncf']['track'])) +
                        ($ask['nsf']['bobot'] / 100) * ($ask['nsf']['total'] / count($ask['nsf']['track']));
                    $r['total'] += $ask['total'] * ($ask['bobot'] / 100);
                    array_push($r['aspek'], $ask);
                }
                unset($r['data']);
                $raw['list'][$j] = $r;
                $j++;
            }

            $hasil = $raw['list'];
            usort($hasil, function ($a, $b) {
                return $a['total'] < $b['total'];
            });

            $this->ranking->emptyTable();
            foreach ($hasil as $h) {
                $this->ranking->save([
                    'id_alternatif' => $h['id'],
                    'total' => $h['total'],
                ]);
            }
            // dd($hasil);
            return view('sistem/ranking', [
                'hasil' => $raw['list'],
                'ranking' => $hasil,
            ]);
        } else {
            return redirect()->to('/Admin');
        }

    }
}