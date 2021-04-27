<?php

/**
 * Web routes
 */

Route::name('web.')
    ->namespace('Web')
    ->group(function () {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login_form');
        Route::post('login', 'Auth\LoginController@login')->name('login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        Route::middleware(['auth.web'])
            ->group(function () {
                // Projects
                Route::get('projects', 'ProjectController@index')->name('projects');
                // Route::get('projects/create', 'ProjectController@create')->name('projects.create');
                // Route::post('projects', 'ProjectController@store')->name('projects.store');
                // Route::get('projects/{project}', 'ProjectController@show')->name('projects.show');
                // Route::get('projects/{project}/edit', 'ProjectController@edit')->name('projects.edit');
                // Route::put('projects/{project}', 'ProjectController@update')->name('projects.update');
                // Route::delete('projects/{project}', 'ProjectController@destroy')->name('projects.destroy');
            });
    });


/**
 * --------------------------------------------------------------------------
 * Backend routes
 * --------------------------------------------------------------------------
 */

Route::name('backend.')
    ->prefix('backend')
    ->namespace('Backend')
    ->group(function () {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login_form');
        Route::post('login', 'Auth\LoginController@login')->name('login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        Route::middleware(['auth.backend'])
            ->group(function () {
                // Projects
                Route::get('projects', 'ProjectController@index')->name('projects');
                Route::get('projects/create/{client}', 'ProjectController@create')->name('projects.create');
                Route::post('projects', 'ProjectController@store')->name('projects.store');
                Route::get('projects/{project}', 'ProjectController@show')->name('projects.show');
                Route::put('projects/{project}', 'ProjectController@update')->name('projects.update');
                Route::delete('projects/{project}', 'ProjectController@destroy')->name('projects.destroy');

                // Clients
                Route::get('clients', 'ClientController@index')->name('clients.index');
                Route::get('clients/create', 'ClientController@create')->name('clients.create');
                Route::post('clients', 'ClientController@store')->name('clients.store');
                Route::get('clients/{client}', 'ClientController@show')->name('clients.show');
                Route::put('clients/{client}', 'ClientController@update')->name('clients.update');

                // Employees
                Route::get('employees', 'EmployeeController@index')->name('employees.index');
                Route::get('employees/create', 'EmployeeController@create')->name('employees.create');
                Route::post('employees', 'EmployeeController@store')->name('employees.store');
                Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.show');
                Route::put('employees/{employee}', 'EmployeeController@update')->name('employees.update');
                Route::delete('employees/{employee}', 'EmployeeController@destroy')->name('employees.destroy');

                // Services
                // Route::get('services', 'ServiceController@index')->name('services.index');
                // Route::get('services/create', 'ServiceController@create')->name('services.create');
                // Route::post('services', 'ServiceController@store')->name('services.store');
                // Route::get('services/{service}', 'ServiceController@show')->name('services.show');
                // Route::put('services/{service}', 'ServiceController@update')->name('services.update');
                // Route::delete('services/{service}', 'ServiceController@destroy')->name('services.destroy');

                // PDF
                Route::get('pdf', 'PdfController@settings')->name('pdf.settings');
                Route::post('pdf', 'PdfController@handle')->name('pdf.handle');
                Route::get('pdf/project', 'PdfController@previewProject')->name('pdf.preview-project');
                Route::get('pdf/employee', 'PdfController@previewEmployee')->name('pdf.preview-employee');

            });
    });

