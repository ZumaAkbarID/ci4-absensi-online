<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pengajar extends BaseController
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
    }

    public function index()
    {
        $this->data['title'] = 'Pengajar | Admin Dashboard';
        $this->data['page'] = 'users';
        $this->data['subpage'] = 'pengajar';
        $this->data['siswa'] = $this->siswaModel;
        $this->data['mapel'] = $this->mapelModel;
        $this->data['pengajar'] = $this->pengajarModel;
        $this->data['absensi'] = $this->absensiModel;

        return view('Admin/pengajar', $this->data);
    }

    public function detail($id)
    {
        if ($id == null) {
            echo '404';
        }

        $pengajar = $this->pengajarModel->where('id', $id)->first();

        $data = [
            'id' => $pengajar->id,
            'nip' => $pengajar->nip,
            'nama' => $pengajar->nama,
            'email' => $pengajar->email,
            'ttl' => $pengajar->ttl,
            'agama' => $pengajar->agama,
            'tlp' => $pengajar->tlp,
            'status' => $pengajar->status,
            'avatar' => $pengajar->avatar,
            'created_at' => $pengajar->created_at,
            'updated_at' => $pengajar->updated_at
        ];

        echo json_encode($data);
    }

    public function ubah($id)
    {
        if ($id == null) {
            return redirect()->to('admin/pengajar');
        }

        $this->data['title'] = 'Ubah Pengajar | Admin Dashboard';
        $this->data['page'] = 'users';
        $this->data['subpage'] = 'pengajar';
        $this->data['dataPengajar'] = $this->pengajarModel->where('id', $id)->first();

        return view('admin/pengajarUbah', $this->data);
    }
}