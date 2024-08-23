<?php

namespace App\Controllers;

use App\Models\ImageModel;
use App\Models\ImageFasilitasModel;
use App\Models\ImagePartnerModel;
use App\Models\ImageTestimoniModel;
use App\Models\ImageChatModel;
use App\Models\ImageAcaraModel;
use App\Models\ImageApotikModel;
use App\Models\ImageBesarModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function landingpage()
    {
        $model = new ImageBesarModel();
        $data['imagesbesar'] = $model->findAll();

        $model = new ImageModel();
        $data['images'] = $model->findAll(); // Fetch all images

        $model = new ImageApotikModel();
        $data['imagesap'] = $model->findAll();

        $model = new ImageFasilitasModel();
        $data['imagesfa'] = $model->findAll();

        $model = new ImagePartnerModel();
        $data['imagespar'] = $model->findAll();

        $model = new ImageTestimoniModel();
        $data['imagestes'] = $model->findAll();

        $model = new ImageChatModel();
        $data['imagesch'] = $model->findAll();

        $model = new ImageAcaraModel();
        $data['imagesacara'] = $model->findAll();

        return view('index', $data);  // Pass data to the view
    }

    public function lihat()
    {
        return view('lihat');
    }
}
