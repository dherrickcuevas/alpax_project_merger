<?php
/*
/
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
/
*/



Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('post.login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

	////////////////////////////////////////////ADMIN////////////////////////////////////////////////////////////////
	///
	//View authentications and AuthenticationItems
	Route::get('/auth/', 'authController@index')->name('index.authentications'); 
	//Saving New authentications and AuthenticationItems
	Route::post('/auth/create', 'authController@store')->name('store.authentications');
	//Delete authentications
	Route::get('/auth/delete/{authId}', 'authController@delete')->name('delete.authentications'); 

	//View Roles
	Route::get('/role/', 'roleController@index')->name('index.role'); 
	//Saving And Editting New role 
	Route::post('/role/create', 'roleController@store')->name('store.role');
	//Delete role
	Route::get('/role/delete/{roleId}', 'roleController@delete')->name('delete.role'); 

	//View company
	Route::get('/company', 'companyController@index')->name('index.company'); 
	//Saving and Editting company 
	Route::post('/company/create/', 'companyController@store')->name('store.company');
	//Delete company
	Route::post('/company/delete', 'companyController@delete')->name('delete.company'); 


	////////////////////////////////////////////HRIS///////////////////////////////////////////////////////////////////

	//View Branch
	Route::get('/branch/', 'branchController@index')->name('index.branch'); 
	//Save and Edit Branch
	Route::post('/branch/create', 'branchController@store')->name('store.branch'); 
	//Delete Branch

	Route::post('/branch/delete', 'branchController@delete')->name('delete.branch');


	//View Departments
	Route::get('/department', 'departmentController@index')->name('index.department');
	//Save and Edit Departments
	Route::post('/department/create', 'departmentController@store')->name('store.department'); 
	//Delete Departments
	Route::post('/department/delete', 'departmentController@delete')->name('delete.department');

	//View Employement Status
	Route::get('/empstatus', 'empstatusController@index')->name('index.empstatus');
	//Save and Edit Employement Status
	Route::post('/empstatus/create', 'empstatusController@store')->name('store.empstatus'); 
	//Delete Employement Status
	Route::post('/empstatus/delete', 'empstatusController@delete')->name('delete.empstatus');

	//View Employement Status
	Route::get('/violations', 'violationsController@index')->name('index.violations');
	//Save and Edit Employement Status
	Route::post('/violations/create', 'violationsController@store')->name('store.violations'); 
	//Delete Employement Status
	Route::post('/violations/delete', 'violationsController@delete')->name('delete.violations');


	//View Batch
	Route::get('/batch', 'batchController@index')->name('index.batch'); 
	//Save and Edit Batch
	Route::post('/batch/create', 'batchController@store')->name('store.batch'); 
	//Delete Batch
	Route::post('/batch/delete', 'batchController@delete')->name('delete.batch');

	//View Position
	Route::get('/position', 'positionController@index')->name('index.position');
	//Save and Edit Position
	Route::post('/position/create', 'positionController@store')->name('store.position'); 
	//Delete Position
	Route::post('/position/delete', 'positionController@delete')->name('delete.position');



	//Document Number Setup
	Route::get('settings/ezpp/hris/document_number_setup', function(){
		return view('settings.ezpp.hris.document_number_setup');
	});

	//Profit Center
	Route::get('settings/ezpp/hris/profit_center', function(){
		return view('settings.ezpp.hris.profit_center');
	});

	//View Employee
	Route::get('/employee', 'employeeController@index')->name('index.employee');
	//Save and Edit Employee
	Route::post('/employee/create', 'employeeController@store')->name('store.employee'); 
	//Delete Employee
	Route::post('/employee/delete', 'employeeController@delete')->name('delete.employee');



	//Profit Center
	Route::get('pages/login', function(){
		return view('pages.login');
	});

	//SSS Table
	Route::get('settings/ezpp/tables/sss_table', function(){
		return view('settings.ezpp.tables.sss_table');
	});

	//Pagibig Table
	Route::get('settings/ezpp/tables/pagibig_table', function(){
		return view('settings.ezpp.tables.pagibig_table');
	});

	//PhilHealth Table
	Route::get('settings/ezpp/tables/philhealth_table', function(){
		return view('settings.ezpp.tables.philhealth_table');
	});


	//Settings -> EZPP -> Payroll

		//Time interpretation
	Route::get('/time_interpretation', 'TimeInterpretationController@index')->name('index.time_interpretations');
	Route::post('/time_interpretation', 'TimeInterpretationController@store')->name('store.time_interpretations');
	Route::get('/time_interpretation/delete/{interpretation_id}', 'TimeInterpretationController@delete')->name('delete.time_interpretations');
	//Payroll Config
	Route::get('payroll_period', 'PayrollPeriodController@index')->name('index.payroll_period');
	Route::post('payroll_period', 'PayrollPeriodController@store')->name('store.payroll_period');
	Route::get('payroll_period/delete/{period_id}', 'PayrollPeriodController@delete')->name('delete.payroll_period');

		//GL Accounts
	Route::get('settings/financials/gl_determination', function(){
		return view('settings.financials.gl_determination');
	});
});


























//Create Database Table
Route::get('/table/create/', 'tableController@create')->name('create.table'); 
Route::post('/table/create/', 'tableController@store')->name('store.table'); 