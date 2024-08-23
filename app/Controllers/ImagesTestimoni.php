<?php

namespace App\Controllers;

use App\Models\ImageTestimoniModel;

class ImagesTestimoni extends BaseController
{
    protected $ImagesTestimoni;

    public function __construct()
    {
        // Inisialisasi model
        $this->ImagesTestimoni = new ImageTestimoniModel();
    }

    public function index()
    {
        // Mengambil semua data gambar dari tabel 'image_testimoni'
        $data['imagestes'] = $this->ImagesTestimoni->findAll();

        // Mengembalikan view dengan data gambar
        return view('admin/ImagesTestimoni', $data);
    }

    public function create()
    {
        // Menampilkan form untuk menambah gambar baru
        return view('admin/ImagesTestimoni', [
            'image' => null,
            'imagestes' => $this->ImagesTestimoni->findAll()
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
            $existingImage = $this->ImagesTestimoni->find($id);
            if ($existingImage && $imageName === '') {
                $data['image'] = $existingImage['image'];
            }
            $this->ImagesTestimoni->update($id, $data);
        } else {
            // Add new image
            $this->ImagesTestimoni->insert($data);
        }

        return redirect()->to('/admin/ImagesTestimoni');
    }

    public function edit($id)
    {
        $data['image'] = $this->ImagesTestimoni->find($id);

        if (empty($data['image'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        $data['imagestes'] = $this->ImagesTestimoni->findAll(); // To include the list of images in the view

        return view('admin/ImagesTestimoni', $data);
    }

    public function delete($id)
    {
        $image = $this->ImagesTestimoni->find($id);
        if ($image) {
            $imagePath = ROOTPATH . 'public/images/' . $image['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $this->ImagesTestimoni->delete($id);
        }

        return redirect()->to('/admin/ImagesTestimoni');
    }
}
