<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 //$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/login', 'Home::login');
// $routes->get('/profile', 'Home::profile');
// $routes->get('/loginWithGoogle', 'Home::loginWithGoogle');
// $routes->get("/logout", "Home::logout"); 

$routes->get('/', 'LoginController::index', ['as' => 'login.login']);

$routes->group('login', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('login', 'LoginController::index', ['as' => 'login.login']);
    $routes->get('profile', 'LoginController::profile', ['as' => 'login.profile']);
    $routes->get('loginWithGoogle', 'LoginController::loginWithGoogle', ['as' => 'login.login_with_google']);
    $routes->get('logout', 'LoginController::logout', ['as' => 'login.logout']);
});

//UserController
$routes->group("user",function($routes){
   // $routes->get('home','UserController::index',['as'=>'user.home']);
    $routes->get('profile','UserController::profile',['as'=>'user.profile']);
});


//User

$routes->group("user", ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('home', 'User::index',['as'=>'user.home']);
    $routes->post('getAll', 'User::getAll');
    $routes->post('getOne', 'User::getOne');
    $routes->post('add', 'User::add');
    $routes->post('edit', 'User::edit');
    $routes->post('remove', 'User::remove');
});

//Anoletivo

$routes->group("anoletivo", ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('home', 'Anoletivo::index',['as'=>'anoletivo.home']);
    $routes->post('getAll', 'Anoletivo::getAll');
    $routes->post('getOne', 'Anoletivo::getOne');
    $routes->post('add', 'Anoletivo::add');
    $routes->post('edit', 'Anoletivo::edit');
    $routes->post('remove', 'Anoletivo::remove');
});

$routes->get('obter-dados-anoletivo', 'Anoletivo::getAllAL',['as'=>'anoletivo.anoletivo']);






//Disciplinas
$routes->group("disciplinas", ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('home', 'Disciplinas::index',['as'=>'disciplinas.home']);
    $routes->get('homeregular', 'Disciplinas::indexregular',['as'=>'disciplinas.homeregular']);
    $routes->get('homeprofissional', 'Disciplinas::indexprofissional',['as'=>'disciplinas.homeprofissional']);
    $routes->post('getAll', 'Disciplinas::getAll');
    $routes->post('getOne', 'Disciplinas::getOne');
    $routes->post('add', 'Disciplinas::add');
    $routes->post('edit', 'Disciplinas::edit');
    $routes->post('remove', 'Disciplinas::remove');
    //////////////////////////////////////////
    $routes->post('getAllregular', 'Disciplinas::getAllregular');
    $routes->post('getAllprofissional', 'Disciplinas::getAllprofissional');
    $routes->post('getAllDisciplinas/(:num)/(:num)', 'Disciplinas::getAllDisciplinas/$1/$2');

});
//Tipologia
$routes->group("tipologia", ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('home', 'Tipologia::index',['as'=>'tipologia.home']);
    $routes->post('getAll', 'Tipologia::getAll');
    $routes->post('getOne', 'Tipologia::getOne');
    $routes->post('add', 'Tipologia::add');
    $routes->post('edit', 'Tipologia::edit');
    $routes->post('remove', 'Tipologia::remove');
});
$routes->get('obter-dados-tipologia', 'Tipologia::getAlltipologia',['as'=>'tipologia.todas']);

//Modulos
$routes->group("modulo", ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('home', 'Modulo::index',['as'=>'modulos.home']);
    $routes->get('indexpordisciplina/(:num)', 'Modulo::indexpordisciplina/$1');
    $routes->post('getAllpordisciplina/(:num)', 'Modulo::getAllpordisciplina/$1');
    $routes->post('getAll', 'Modulo::getAll');
    $routes->post('getOne', 'Modulo::getOne');
    $routes->post('add', 'Modulo::add');
    $routes->post('edit', 'Modulo::edit');
    $routes->post('remove', 'Modulo::remove');
});


//Turmas 
$routes->group("turmas", ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('home', 'Turmas::index',['as'=>'turmas.home']);
    $routes->get('homeregular', 'Turmas::indexregular',['as'=>'turmas.homeregular']);
    $routes->get('homeprofissional', 'Turmas::indexprofissional',['as'=>'turmas.homeprofissional']);

    $routes->post('getAll', 'Turmas::getAll');
    $routes->post('getAllporAnoletivo/(:num)/(:num)', 'Turmas::getAllporAnoletivo/$1/$2');
    $routes->post('getOne', 'Turmas::getOne');
    $routes->post('add', 'Turmas::add');
    $routes->post('edit', 'Turmas::edit');
    $routes->post('remove', 'Turmas::remove');
    ///////////////////////////////////////////////////
    $routes->post('getAllregular', 'Turmas::getAllregular');
    $routes->post('getAllprofissional', 'Turmas::getAllprofissional');
});

//TurmasDisciplinas
$routes->group("turmadisciplina", ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('home', 'Turmadisciplina::index',['as'=>'turmadisciplina.home']);
    $routes->get('indexporturma/(:num)', 'Turmadisciplina::indexporturma/$1');
    $routes->get('turmadetalhes/(:num)', 'Turmadisciplina::turmadetalhes/$1');
    $routes->post('getAllTurmadisciplina/(:num)', 'Turmadisciplina::getAllTurmadisciplina/$1');
    $routes->post('getTurmasDetalhes/(:num)', 'Turmadisciplina::getTurmasDetalhes/$1');
    $routes->post('getAll', 'Turmadisciplina::getAll');
    $routes->post('getOne', 'Turmadisciplina::getOne');
    $routes->post('add', 'Turmadisciplina::add');
    $routes->post('edit', 'Turmadisciplina::edit');
    $routes->post('remove', 'Turmadisciplina::remove');
});
//TurmasDetalhesreg


//Alunos

$routes->group("aluno", ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('listagem', 'Aluno::index',['as'=>'aluno.listagem']);
    $routes->get('profilealuno/(:num)', 'Aluno::profilealuno/$1');
   // $routes->post('getAllpordisciplina/(:num)', 'Modulo::getAllpordisciplina/$1');
    $routes->post('getAll', 'Aluno::getAll');
    $routes->post('getOne', 'Aluno::getOne');
    $routes->post('add', 'Aluno::add');
    $routes->post('edit', 'Aluno::edit');
    $routes->post('remove', 'Aluno::remove');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
