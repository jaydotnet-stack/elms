<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->setDefaultController('HomeController');
$routes->setTranslateURIDashes(false);
$routes->set404Override(static function (){
    return view('partials/404');
}); 

// Student
$routes->get('/', 'HomeController::home');
$routes->get('home', 'HomeController::home');
$routes->get('course', 'HomeController::course');
$routes->get('aboutus', 'HomeController::aboutus');
$routes->get('contact', 'HomeController::contact');
$routes->get('coursedetails', 'HomeController::coursedetails');
$routes->get('lecturersignup', 'HomeController::lecturersignup');
$routes->get('studentsignup', 'HomeController::studentsignup');
$routes->get('signin', 'HomeController::signin');
$routes->post('processsignup', 'HomeController::processsignup');
$routes->post('processsignin', 'HomeController::processsignin');
$routes->get('home/activate/(:any)', 'HomeController::activate/$1');

// Kemisola
$routes->get('studentdashboard', 'HomeController::studdashb');
$routes->get('studentquiz', 'HomeController::studqui');
$routes->get('editprofile', 'HomeController::edprof');

// Lecturer
$routes->get('admin/dashboard', 'AdminController::lecturedashb');
$routes->get('admin/profile', 'AdminController::prof');
$routes->get('admin/question', 'AdminController::quest');
$routes->get('admin/result', 'AdminController::res');
$routes->get('admin/analytics', 'AdminController::anal');
$routes->get('admin/changepassword', 'AdminController::cp');
$routes->get('admin/resetpassword', 'AdminController::rp');

$routes->get('signout', 'HomeController::signout');
