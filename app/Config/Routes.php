<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/Dashboard', 'Dashboard::index');
$routes->get('/', 'Dashboard::home');

// routes data users
$routes->get('/users', 'Users::index');
$routes->get('/users/tambah', 'Users::tambah');
$routes->post('/users/simpan', 'Users::simpan');
$routes->get('/users/edit/(:num)', 'Users::edit/$1');
$routes->post('/users/update/(:num)', 'Users::update/$1');
$routes->delete('/users/hapus/(:num)', 'Users::delete/$1');

// routes data kriteria
$routes->get('/kriteria', 'Kriteria::index');
$routes->get('/kriteria/kode', 'Kriteria::autoKode');
$routes->get('/kriteria/tambah', 'Kriteria::tambah');
$routes->post('/kriteria/simpan', 'Kriteria::simpan');
$routes->get('/kriteria/edit/(:num)', 'Kriteria::edit/$1');
$routes->post('/kriteria/update/(:num)', 'Kriteria::update/$1');
$routes->delete('/kriteria/hapus/(:num)', 'Kriteria::delete/$1');

// routes data sub kriteria
$routes->get('/sub-kriteria', 'Kriteria::indexSubKriteria');
$routes->get('/sub-kriteria/tambah/(:num)', 'Kriteria::tambahSubKriteria/$1');
$routes->post('/sub-kriteria/simpan/(:num)', 'Kriteria::simpanSubKriteria/$1');
$routes->get('/sub-kriteria/edit/(:num)', 'Kriteria::editSubKriteria/$1');
$routes->post('/sub-kriteria/update/(:num)', 'Kriteria::updateSubKriteria/$1');
$routes->delete('/sub-kriteria/hapus/(:num)', 'Kriteria::deleteSubKriteria/$1');

// routes data alternatif
$routes->get('/alternatif', 'Alternatif::index');
$routes->get('/alternatif/tambah', 'Alternatif::tambah');
$routes->get('/alternatif/kode', 'Alternatif::autoKode');
$routes->post('/alternatif/simpan', 'Alternatif::simpan');
$routes->get('/alternatif/edit/(:num)', 'Alternatif::edit/$1');
$routes->post('/alternatif/update/(:num)', 'Alternatif::update/$1');
$routes->delete('/alternatif/hapus/(:num)', 'Alternatif::delete/$1');

// route data penilaian
$routes->get('/list-penilaian', 'Penilaian::index');
$routes->get('/penilaian/tambah/(:num)', 'Penilaian::tambah/$1');
$routes->post('/penilaian/simpan/(:num)', 'Penilaian::simpan/$1');
$routes->get('/penilaian/edit/(:num)', 'Penilaian::edit/$1');
$routes->post('/penilaian/update/(:num)', 'Penilaian::update/$1');
$routes->delete('/alternatif/hapus/(:num)', 'Alternatif::delete/$1');

$routes->get('/hitung-saw', 'HitungMetode::index');

$routes->get('/hasil', 'Hasil::index');
