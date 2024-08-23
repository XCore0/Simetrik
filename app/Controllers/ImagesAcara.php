<?php

namespace App\Controllers;

use App\Models\ImageAcaraModel;

class ImagesAcara extends BaseController
{
    protected $imageAcaraModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->imageAcaraModel = new ImageAcaraModel();
    }

    public function index()
    {
        // Mengambil semua data gambar dari tabel 'image_acara'
        $data['imagesacara'] = $this->imageAcaraModel->findAll();

        // Mengembalikan view dengan data gambar
        return view('admin/ImagesAcara', $data);
    }

    public function create()
    {
        // Menampilkan form untuk menambah gambar baru
        return view('admin/ImagesAcara', [
            'image' => null,
            'imagesacara' => $this->imageAcaraModel->findAll()
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
            $existingImage = $this->imageAcaraModel->find($id);
            if ($existingImage && $imageName === '') {
                $data['image'] = $existingImage['image'];
            }
            $this->imageAcaraModel->update($id, $data);
        } else {
            // Add new image
            $this->imageAcaraModel->insert($data);
        }

        return redirect()->to('/admin/ImagesAcara');
    }

    public function edit($id)
    {
        $data['image'] = $this->imageAcaraModel->find($id);

        if (empty($data['image'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        $data['imagesacara'] = $this->imageAcaraModel->findAll(); // To include the list of images in the view

        return view('admin/ImagesAcara', $data);
    }

    public function delete($id)
    {
        $image = $this->imageAcaraModel->find($id);
        if ($image) {
            $imagePath = ROOTPATH . 'public/images/' . $image['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $this->imageAcaraModel->delete($id);
        }

        return redirect()->to('/admin/ImagesAcara');
    }
}
