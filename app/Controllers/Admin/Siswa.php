<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        if ($this->session->get('role') !== 'Administrator') {
            redirect()->to('auth/logout');
        }
        $this->data['session'] = $this->session;
        $this->siswaModel = new \App\Models\SiswaModel();
        $this->mapelModel = new \App\Models\MapelModel();
        $this->absensiModel = new \App\Models\AbsensiModel();
        $this->pengajarModel = new \App\Models\PengajarModel();
        $this->kelasModel = new \App\Models\KelasModel();
    }

    public function index()
    {
        $this->data['title'] = 'Siswa | Admin Dashboard';
        $this->data['page'] = 'users';
        $this->data['subpage'] = 'siswa';
        $this->data['siswa'] = $this->siswaModel;
        $this->data['mapel'] = $this->mapelModel;
        $this->data['pengajar'] = $this->pengajarModel;
        $this->data['absensi'] = $this->absensiModel;
        $this->data['kelas'] = $this->kelasModel;

        return view('Admin/siswa', $this->data);
    }

    public function detail($id)
    {
        if ($id == null) {
            echo '404';
        }

        $siswa = $this->siswaModel->where('id', $id)->first();

        if ($siswa->updated_at == null) {
            $updated_at = 'Belum ada perubahan';
        }

        $data = [
            'id' => $siswa->id,
            'nis' => $siswa->nis,
            'nama' => $siswa->nama,
            'id_kelas' => $siswa->id_kelas,
            'ttl' => $siswa->ttl,
            'agama' => $siswa->agama,
            'telp_siswa' => $siswa->telp_siswa,
            'telp_ortu' => $siswa->telp_ortu,
            'alamat_siswa' => $siswa->alamat_siswa,
            'alamat_ortu' => $siswa->alamat_ortu,
            'nama_ayah' => $siswa->nama_ayah,
            'nama_ibu' => $siswa->nama_ibu,
            'status' => $siswa->status,
            'avatar' => $siswa->avatar,
            'created_at' => $siswa->created_at,
            'updated_at' => $updated_at
        ];

        echo json_encode($data);
    }
}