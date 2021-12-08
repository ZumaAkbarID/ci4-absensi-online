<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->pengajarModel = new \App\Models\PengajarModel();
        $this->siswaModel = new \App\Models\SiswaModel();
        $this->roleModel = new \App\Models\RoleModel();
    }

    public function login()
    {
        $this->data['title'] = 'Login';

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            $errors = $this->validation->getErrors();

            if ($errors) {
                return view('auth/login', $this->data);
            }

            $nis_nip = $this->request->getPost('nis_nip');
            $password = $this->request->getPost('password');

            $pengajar = $this->pengajarModel->where('nip', $nis_nip)->first();

            // dd(password_hash($pengajar->salt . $password, PASSWORD_BCRYPT));

            if ($pengajar) {
                if (!password_verify($pengajar->salt . $password, $pengajar->password)) {
                    $this->session->setFlashdata('errors', 'Password salah!');
                } else {
                    $roles = $this->roleModel->where('id', $pengajar->id_role)->first();
                    $role = $roles->role;

                    $dataSession = [
                        'id' => $pengajar->id,
                        'nama' => $pengajar->nama,
                        'isLoggedIn' => TRUE,
                        'role' => $role,
                        'avatar' => $pengajar->avatar
                    ];

                    $this->session->set($dataSession);

                    if ($role == 'Administrator') {
                        return redirect()->to('admin');
                    } else if ($role == 'Pengajar') {
                        return redirect()->to('pengajar');
                    } else if ($role == 'Siswa') {
                        return redirect()->to('siswa');
                    }
                }
            }
        }

        return view('auth/login', $this->data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}