<?php

namespace App\Controllers;

use App\Models\ImageChatModel;

class ImagesChat extends BaseController
{
    protected $ImagesChat;

    public function __construct()
    {
        // Inisialisasi model
        $this->ImagesChat = new ImageChatModel();
    }

    public function index()
    {
        // Mengambil semua data gambar dari tabel 'image_testimoni'
        $data['imagesch'] = $this->ImagesChat->findAll();

        // Mengembalikan view dengan data gambar
        return view('admin/ImagesChat', $data);
    }

    public function create()
    {
        // Menampilkan form untuk menambah gambar baru
        return view('admin/ImagesChat', [
            'image' => null,
            'imagestes' => $this->ImagesChat->findAll()
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
            $existingImage = $this->ImagesChat->find($id);
            if ($existingImage && $imageName === '') {
                $data['image'] = $existingImage['image'];
            }
            $this->ImagesChat->update($id, $data);
        } else {
            // Add new image
            $this->ImagesChat->insert($data);
        }

        return redirect()->to('/admin/ImagesChat');
    }

    public function edit($id)
    {
        $data['image'] = $this->ImagesChat->find($id);

        if (empty($data['image'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        $data['imagestes'] = $this->ImagesChat->findAll(); // To include the list of images in the view

        return view('admin/ImagesChat', $data);
    }

    public function delete($id)
    {
        $image = $this->ImagesChat->find($id);
        if ($image) {
            $imagePath = ROOTPATH . 'public/images/' . $image['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $this->ImagesChat->delete($id);
        }

        return redirect()->to('/admin/ImagesChat');
    }
}
