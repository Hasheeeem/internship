<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ✅ Load the main Address Book page
$routes->get('/', 'ContactController::index');

// ✅ Form to create a new contact
$routes->get('contacts/create', 'ContactController::create');

// ✅ Store the contact (submitted via POST)
$routes->post('contacts/store', 'ContactController::store');

// ✅ Form to edit an existing contact
$routes->get('contacts/edit/(:num)', 'ContactController::edit/$1');

// ✅ Update the contact (submitted via POST)
$routes->post('contacts/update/(:num)', 'ContactController::update/$1');

// ✅ Delete the contact
$routes->get('contacts/delete/(:num)', 'ContactController::delete/$1');

// ✅ Export contact list to CSV (Bonus)
$routes->get('contacts/export', 'ContactController::exportCSV');