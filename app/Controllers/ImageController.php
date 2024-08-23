<?php

namespace App\Controllers;

use App\Models\ImageModel;

class ImageController extends BaseController
{
    protected $imageModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->imageModel = new ImageModel();
    }

    public function index()
    {
        // Mengambil semua data gambar dari tabel 'images'
        $data['images'] = $this->imageModel->findAll();

        // Mengembalikan view dengan data gambar
        return view('admin/ImagesGallery', $data);
    }

    public function create()
    {
        // Menampilkan form untuk menambah gambar baru
        return view('admin/ImagesGallery', [
            'image' => null,
            'images' => $this->imageModel->findAll()
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
            'name' => $this->request->getPost('name'),
            'image' => $imageName
        ];

        if ($id) {
            // Update existing image
            $existingImage = $this->imageModel->find($id);
            if ($existingImage && $imageName === '') {
                $data['image'] = $existingImage['image'];
            }
            $this->imageModel->update($id, $data);
        } else {
            // Add new image
            $this->imageModel->insert($data);
        }

        return redirect()->to('/admin/ImagesGallery');
    }

    public function edit($id)
    {
        $data['image'] = $this->imageModel->find($id);

        if (empty($data['image'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        $data['images'] = $this->imageModel->findAll(); // To include the list of images in the view

        return view('admin/ImagesGallery', $data);
    }

    public function delete($id)
    {
        $image = $this->imageModel->find($id);
        if ($image) {
            $imagePath = ROOTPATH . 'public/images/' . $image['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $this->imageModel->delete($id);
        }

        return redirect()->to('/admin/ImagesGallery');
    }

    public function iframe()
    {
        $data['images'] = $this->imageModel->findAll(); // Or however you fetch your images
        return view('admin/gallery', $data);
    }
}
