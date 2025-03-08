<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  ROute Pnegguna

// Route Admin -> filter 


$routes->post('Kuesioner/jawab', 'Kuesioner_p::simpanJawaban');





$routes->post('tambah', 'Kuesioner::tambah');

$routes->setTranslateURIDashes(true);
$routes->setAutoRoute(true);
$routes->get('register', 'Login::register');
$routes->post('register', 'Login::register');

$routes->get('kelas/(:segment)', 'Kelas::detail/$1');
$routes->get('kebijakan/(:segment)', 'Kebijakan::detail/$1');
$routes->get('Register', 'Akun::register');
$routes->post('Register', 'Akun::register');
$routes->group('admin', ['filter' => 'adminFilter'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('dashboard', 'Admin::dashboard');

    $routes->group('story', ['filter' => 'adminfilter'], function ($routes) {
        $routes->get('edit/(:num)', 'Story::edit/$1');
        $routes->get('hapus/(:num)', 'Story::hapus/$1');
        $routes->post('update/(:num)', 'Story::update/$1');

        // $routes->get('User', 'KelolaUser::index');
        $routes->get('/kelola-user/index', 'KelolaUser::index');
        $routes->get('/kelola-user/tambah', 'KelolaUser::tambah');
        $routes->get('pdf/(:any)', 'PdfController::show/$1');
        $routes->get('v_user/(:num)', 'UserController::detail/$1');

        // $routes->get('user_detail/(:num)', 'UserController::detail/$1');

        // $routes->post('user/recordActivity', 'UserController::recordActivity');
        $routes->get('user_detail/(:num)', 'UserController::detail/$1');
        $routes->post('/markAsRead', 'StoryController::markAsRead');


        $routes->post('Akun/resetPassword', 'Akun::resetPassword');


        $routes->get('kelola-user/tambah', 'KelolaUserController::tambah');
        $routes->post('kelola-user/proses_tambah_user', 'KelolaUserController::proses_tambah_user');

    });
});


$routes->post('/story/selesai_baca/(:num)', 'Story::selesaiBaca/$1');
$routes->post('/kelas/selesai_baca/(:num)', 'Kelas_pengguna::selesaiBaca/$1');

$routes->group('pengguna', ['filter' => 'penggunaFilter'], function ($routes) {
    $routes->get('/', 'Pengguna::index');
    $routes->get('v_data_kelas', 'Pengguna::v_data_kelas');


    // Tambahkan rute Pengguna lainnya
    $routes->get('/kelas', 'KelasController::index');
    $routes->get('/kelas/view/(:segment)', 'KelasController::view/$1');
    $routes->get('/kelas/preview/(:any)', 'KelasController::previewPdf/$1');


    //approve
    $routes->post('KelolaUser/setujuUser/(:num)', 'KelolaUser::setujuUser/$1');
    $routes->post('KelolaUser/tolakUser/(:num)', 'KelolaUser::tolakUser/$1');

});

