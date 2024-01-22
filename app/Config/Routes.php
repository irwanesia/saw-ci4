<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

$routes->get('/users', 'Users::index');

$routes->get('/kriteria', 'Kriteria::index');

$routes->get('/alternatif', 'Alternatif::index');

$routes->get('/penilaian-alternatif', 'Penilaian::index');

$routes->get('/hitung-saw', 'HitungMetode::index');

$routes->get('/hasil', 'Hasil::index');
