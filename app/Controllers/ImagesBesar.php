<?php

namespace App\Controllers;

use App\Models\ImageBesarModel;

class ImagesBesar extends BaseController
{
    protected $imageBesarModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->imageBesarModel = new ImageBesarModel();
    }

    public function index()
    {
        // Mengambil semua data gambar dari tabel 'image_besar'
        $data['imagesbesar'] = $this->imageBesarModel->findAll();

        // Mengembalikan view dengan data gambar
        return view('admin/ImagesBesar', $data);
    }

    public function create()
    {
        // Menampilkan form untuk menambah gambar baru
        return view('admin/ImagesBesar', [
            'image' => null,
            'ImagesBesar' => $this->imageBesarModel->findAll()
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
            $existingImage = $this->imageBesarModel->find($id);
            if ($existingImage && $imageName === '') {
                $data['image'] = $existingImage['image'];
            }
            $this->imageBesarModel->update($id, $data);
        } else {
            // Add new image
            $this->imageBesarModel->insert($data);
        }

        return redirect()->to('/admin/ImagesBesar');
    }

    public function edit($id)
    {
        $data['image'] = $this->imageBesarModel->find($id);

        if (empty($data['image'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        $data['ImagesBesar'] = $this->imageBesarModel->findAll(); // Untuk menyertakan daftar gambar dalam view

        return view('admin/ImagesBesar', $data);
    }

    public function delete($id)
    {
        $image = $this->imageBesarModel->find($id);
        if ($image) {
            $imagePath = ROOTPATH . 'public/images/' . $image['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $this->imageBesarModel->delete($id);
        }

        return redirect()->to('/admin/ImagesBesar');
    }
}
