<?php

namespace App\Controllers;

use App\Models\FacilityModel;
use CodeIgniter\Controller;
use Pusher\Pusher;

class Facility extends Controller
{
    public function index()
    {
        $facilityModel = new FacilityModel();
        $data['facilities'] = $facilityModel->findAll(); // Mengambil semua data fasilitas

        return view('/admin/TabelFacilities', $data);
    }

    public function updateStatus()
    {
        $model = new FacilityModel();
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        // Validasi input
        if (!$id || !in_array($status, ['checked', 'unchecked'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input']);
        }

        // Update status
        if ($model->update($id, ['status' => $status])) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Update failed']);
        }
    }

    public function save()
    {
        $validation =  \Config\Services::validation();

        // Validasi data
        $validation->setRules([
            'health_facility_name' => 'required|min_length[3]',
            'name' => 'required|regex_match[/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/]|min_length[3]',
            'whatsapp' => 'required|numeric',
            'email' => 'required|valid_email',
            'city' => 'required|min_length[2]',
            'product_variant' => 'required',
            'terms_accepted' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            $errors = $validation->getErrors();
            log_message('error', print_r($errors, true)); // Log errors for debugging
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal validasi data', 'errors' => $errors]);
        }

        $facilityModel = new FacilityModel();

        $data = [
            'health_facility_name' => $this->request->getPost('health_facility_name'),
            'name' => $this->request->getPost('name'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'email' => $this->request->getPost('email'),
            'city' => $this->request->getPost('city'),
            'product_variant' => $this->request->getPost('product_variant'),
            'terms_accepted' => $this->request->getPost('terms_accepted') ? 1 : 0,
            'promotion_info' => $this->request->getPost('promotion_info') ? 1 : 0
        ];

        if ($facilityModel->insert($data)) {
            // Konfigurasi Pusher
            $options = [
                'cluster' => config('Pusher')->cluster,
                'useTLS' => true
            ];

            $pusher = new Pusher(
                config('Pusher')->app_key,
                config('Pusher')->app_secret,
                config('Pusher')->app_id,
                $options
            );

            // Data yang akan dikirimkan sebagai notifikasi
            $notifData = [
                'message' => 'Data fasilitas kesehatan baru telah ditambahkan!',
                'facility' => $data['health_facility_name']
            ];

            // Kirim notifikasi
            $pusher->trigger('facility-channel', 'facility-event', $notifData);

            // Jika berhasil, tampilkan pop-up dengan pesan
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data anda berhasil didaftarkan, mohon tunggu sebentar']);
        } else {
            log_message('error', 'Gagal menyimpan data: ' . print_r($data, true)); // Log error untuk debugging
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menyimpan data']);
        }
    }
}
