<?php

namespace App\Controllers;

use App\Models\ImagePartnerModel;

class ImagesPartner extends BaseController
{
    protected $ImagePartnerModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->ImagePartnerModel = new ImagePartnerModel();
    }

    public function index()
    {
        // Mengambil semua data gambar dari tabel 'image_partner'
        $data['imagespar'] = $this->ImagePartnerModel->findAll();

        // Mengembalikan view dengan data gambar
        return view('admin/ImagesPartner', $data);
    }

    public function create()
    {
        return view('admin/ImagesPartner', [
            'image' => null,
            'images' => $this->ImagePartnerModel->findAll()
        ]);
    }

    public function save()
    {
        $id = $this->request->getPost('id');
        $imageFile = $this->request->getFile('image');
        $imageName = '';

        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/images', $imageName);
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'image' => $imageName ?: $this->ImagePartnerModel->find($id)['image'],
            'deskripsi' => $this->request->getPost('deskripsi'), // Tambahkan deskripsi
        ];

        if ($id) {
            // Update existing image
            $this->ImagePartnerModel->update($id, $data);
        } else {
            // Add new image
            $this->ImagePartnerModel->insert($data);
        }

        return redirect()->to('/admin/ImagesPartner');
    }


    public function edit($id)
    {
        $data['image'] = $this->ImagePartnerModel->find($id);

        if (empty($data['image'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        $data['images'] = $this->ImagePartnerModel->findAll(); // Untuk menampilkan daftar gambar pada view

        return view('admin/ImagesPartner', $data);
    }

    public function delete($id)
    {
        $image = $this->ImagePartnerModel->find($id);
        if ($image) {
            unlink(ROOTPATH . 'public/images/' . $image['image']);
            $this->ImagePartnerModel->delete($id);
        }

        return redirect()->to('/admin/ImagesPartner');
    }
}
