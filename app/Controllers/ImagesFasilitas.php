<?php

namespace App\Controllers;

use App\Models\ImageFasilitasModel;

class ImagesFasilitas extends BaseController
{
    protected $imageFasilitasModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->imageFasilitasModel = new ImageFasilitasModel();
    }

    public function index()
    {
        // Mengambil semua data gambar dari tabel 'image_fasilitas'
        $data['imagesfa'] = $this->imageFasilitasModel->findAll();

        // Mengembalikan view dengan data gambar
        return view('admin/ImagesFasilitas', $data);
    }

    public function create()
    {
        return view('admin/ImagesFasilitas', [
            'image' => null,
            'images' => $this->imageFasilitasModel->findAll()
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

        if ($id) {
            // Update existing image
            $this->imageFasilitasModel->update($id, [
                'nama' => $this->request->getPost('nama'),
                'image' => $imageName ?: $this->imageFasilitasModel->find($id)['image']
            ]);
        } else {
            // Add new image
            $this->imageFasilitasModel->insert([
                'nama' => $this->request->getPost('nama'),
                'image' => $imageName
            ]);
        }

        return redirect()->to('/admin/ImagesFasilitas');
    }

    public function edit($id)
    {
        $data['image'] = $this->imageFasilitasModel->find($id);

        if (empty($data['image'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        $data['images'] = $this->imageFasilitasModel->findAll(); // Untuk menampilkan daftar gambar pada view

        return view('admin/ImagesFasilitas', $data);
    }

    public function delete($id)
    {
        $image = $this->imageFasilitasModel->find($id);
        if ($image) {
            unlink(ROOTPATH . 'public/images/' . $image['image']);
            $this->imageFasilitasModel->delete($id);
        }

        return redirect()->to('/admin/ImagesFasilitas');
    }
}
