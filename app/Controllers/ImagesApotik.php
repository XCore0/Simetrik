<?php

namespace App\Controllers;

use App\Models\ImageApotikModel;

class ImagesApotik extends BaseController
{
    protected $imageApotikModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->imageApotikModel = new ImageApotikModel();
    }

    public function index()
    {
        // Mengambil semua data gambar dari tabel 'image_apotik'
        $data['imagesap'] = $this->imageApotikModel->findAll();

        // Mengembalikan view dengan data gambar
        return view('admin/ImagesApotik', $data);
    }

    public function create()
    {
        // Menampilkan form untuk menambah gambar baru
        return view('admin/ImagesApotik', [
            'image' => null,
            'ImagesApotik' => $this->imageApotikModel->findAll()
        ]);
    }

    public function save()
    {
        $id = $this->request->getPost('id');
        $imageFile = $this->request->getFile('image');
        $imageName = '';

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/images', $imageName);
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'image' => $imageName
        ];

        if ($id) {
            // Update existing image
            $existingImage = $this->imageApotikModel->find($id);
            if ($existingImage && $imageName === '') {
                $data['image'] = $existingImage['image'];
            }
            $this->imageApotikModel->update($id, $data);
        } else {
            // Add new image
            $this->imageApotikModel->insert($data);
        }

        return redirect()->to('/admin/ImagesApotik');
    }

    public function edit($id)
    {
        $data['image'] = $this->imageApotikModel->find($id);

        if (empty($data['image'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        $data['ImagesApotik'] = $this->imageApotikModel->findAll(); // Untuk menyertakan daftar gambar dalam view

        return view('admin/ImagesApotik', $data);
    }

    public function delete($id)
    {
        $image = $this->imageApotikModel->find($id);
        if ($image) {
            $imagePath = ROOTPATH . 'public/images/' . $image['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $this->imageApotikModel->delete($id);
        }

        return redirect()->to('/admin/ImagesApotik');
    }
}
