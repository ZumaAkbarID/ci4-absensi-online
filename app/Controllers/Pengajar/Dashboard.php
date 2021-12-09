<?php

namespace App\Controllers\Pengajar;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        if ($this->session->get('role') !== 'Pengajar') {
            redirect()->to('auth/logout');
        }
        $this->data['session'] = $this->session;
        $this->siswaModel = new \App\Models\SiswaModel();
        $this->mapelModel = new \App\Models\MapelModel();
        $this->absensiModel = new \App\Models\AbsensiModel();
    }

    public function dashboard()
    {
        $this->data['title'] = 'Pengajar Dashboard';
        $this->data['page'] = 'dashboard';
        $this->data['subpage'] = 'dashboard';
        $this->data['siswa'] = $this->siswaModel;
        $this->data['mapel'] = $this->mapelModel;
        $this->data['absensi'] = $this->absensiModel;

        return view('Pengajar/dashboard', $this->data);
    }
}