<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::landingpage');
$routes->post('/facility/save', 'Facility::save'); // Menyimpan data fasilitas kesehatan

$routes->get('/lihat', 'Home::lihat');

// login register
$routes->get('/login', 'LoginRegister::login');
$routes->post('/login/process', 'LoginRegister::process');
$routes->get('/register', 'LoginRegister::register');

$routes->get('/admin/dashboard', 'Admin::index');
$routes->get('/admin/tabel-facilities', 'Facility::index');
$routes->post('/update-status', 'Facility::updateStatus');

// crud image gallery
$routes->get('admin/ImagesBesar', 'ImagesBesar::index');
$routes->post('admin/ImagesBesar/save', 'ImagesBesar::save');
$routes->get('admin/ImagesBesar/edit/(:num)', 'ImagesBesar::edit/$1');
$routes->get('admin/ImagesBesar/delete/(:num)', 'ImagesBesar::delete/$1');

// crud image gallery
$routes->get('admin/ImagesGallery', 'ImageController::index');
$routes->post('admin/ImagesGallery/save', 'ImageController::save');
$routes->get('admin/ImagesGallery/edit/(:num)', 'ImageController::edit/$1');
$routes->get('admin/ImagesGallery/delete/(:num)', 'ImageController::delete/$1');

// crud image gallery
$routes->get('admin/ImagesApotik', 'ImagesApotik::index');
$routes->post('admin/ImagesApotik/save', 'ImagesApotik::save');
$routes->get('admin/ImagesApotik/edit/(:num)', 'ImagesApotik::edit/$1');
$routes->get('admin/ImagesApotik/delete/(:num)', 'ImagesApotik::delete/$1');

// crud image chat
$routes->get('/admin/ImagesChat', 'ImagesChat::index');
$routes->post('/admin/ImagesChat/save', 'ImagesChat::save');
$routes->get('/admin/ImagesChat/edit/(:num)', 'ImagesChat::edit/$1');
$routes->get('/admin/ImagesChat/delete/(:num)', 'ImagesChat::delete/$1');

// crud image fasilitas kesehatan
$routes->get('/admin/ImagesFasilitas', 'ImagesFasilitas::index');
$routes->get('/admin/ImagesFasilitas/create', 'ImagesFasilitas::create');
$routes->post('/admin/ImagesFasilitas/save', 'ImagesFasilitas::save');
$routes->get('/admin/ImagesFasilitas/edit/(:num)', 'ImagesFasilitas::edit/$1');
$routes->get('admin/ImagesFasilitas/delete/(:num)', 'ImagesFasilitas::delete/$1');

// crud image Partner dan Media
$routes->get('/admin/ImagesPartner', 'ImagesPartner::index');
$routes->get('/admin/ImagesPartner/create', 'ImagesPartner::create');
$routes->post('/admin/ImagesPartner/save', 'ImagesPartner::save');
$routes->get('/admin/ImagesPartner/edit/(:num)', 'ImagesPartner::edit/$1');
$routes->get('admin/ImagesPartner/delete/(:num)', 'ImagesPartner::delete/$1');

// crud image Testimoni
$routes->get('/admin/ImagesTestimoni', 'ImagesTestimoni::index');
$routes->get('/admin/ImagesTestimoni/create', 'ImagesTestimoni::create');
$routes->post('/admin/ImagesTestimoni/save', 'ImagesTestimoni::save');
$routes->get('/admin/ImagesTestimoni/edit/(:num)', 'ImagesTestimoni::edit/$1');
$routes->get('admin/ImagesTestimoni/delete/(:num)', 'ImagesTestimoni::delete/$1');

// crud image acara
$routes->get('/admin/ImagesAcara', 'ImagesAcara::index');
$routes->get('/admin/ImagesAcara/create', 'ImagesAcara::create');
$routes->post('/admin/ImagesAcara/save', 'ImagesAcara::save');
$routes->get('/admin/ImagesAcara/edit/(:num)', 'ImagesAcara::edit/$1');
$routes->get('admin/ImagesAcara/delete/(:num)', 'ImagesAcara::delete/$1');


$routes->get('/user', 'User::index');

// logout
$routes->get('/logout', 'LoginRegister::logout');

$routes->get('/admin/gallery', 'ImageController::iframe');
