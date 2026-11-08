
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama
$routes->get('/', 'AuthController::login');

// Login dan Logout (tidak memerlukan AdminFilter)
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authLogin');
$routes->get('logout', 'AuthController::logout');

// Semua halaman khusus admin
$routes->group('', ['filter' => 'admin'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'AuthController::dashboard');

    // Kategori Barang
    $routes->get('kategori', 'KategoriController::index');
    $routes->get('kategori/create', 'KategoriController::create');
    $routes->post('kategori/store', 'KategoriController::store');
    $routes->get('kategori/edit/(:num)', 'KategoriController::edit/$1');
    $routes->post('kategori/update/(:num)', 'KategoriController::update/$1');
    $routes->post('kategori/delete/(:num)', 'KategoriController::delete/$1');

    // Data Barang
    $routes->get('barang', 'BarangController::index');
    $routes->get('barang/create', 'BarangController::create');
    $routes->post('barang/store', 'BarangController::store');
    $routes->get('barang/edit/(:num)', 'BarangController::edit/$1');
    $routes->post('barang/update/(:num)', 'BarangController::update/$1');
    $routes->post('barang/delete/(:num)', 'BarangController::delete/$1');

    // Profil
    $routes->get('profil', 'ProfilController::index');
    $routes->post('profil/update', 'ProfilController::update');
});
