<?php


Route::get('/', 'WebMasterController@home')->name('home.index');
Route::get('/certificacion', 'WebMasterController@certificacion')->name('certificacion');
Route::get('/contactenos', 'WebMasterController@contactenos')->name('contactenos');
Route::post('/sendmail', 'WebMasterController@SendMail')->name('send.mail');
Route::post('/sendmailsolicitud', 'WebMasterController@SendMailSolicitud')->name('send.mailsolicitud');

Route::get('/GetRut/{id}', 'WebMasterController@getRut')->name('get.rut');
Route::get('/GetNombre/{nombre}', 'WebMasterController@getNombre')->name('get.nombre');
Route::get('/GetCodigo/{codigo}', 'WebMasterController@getCodigo')->name('get.codigo');

Route::get('/CertificateValidate/{id}', 'WebMasterController@CertficateValidate')->name('validate.certificado')->middleware('signed');

/********************************************************************/

Route::get('/administracion', 'WebBackendController@home')->name('homebackend');
Route::post('/changePassword', 'WebBackendController@changePassword')->name('password');
Route::get('/miperfil', 'WebBackendController@MiPerfil')->name('miperfil')->middleware('role:useralumno');
Route::get('/miscertificados', 'WebBackendController@MiCertificado')->name('micertifiado')->middleware('role:useralumno');

Route::resource('/alumno', 'AlumnoController')->middleware('can:alumno.index');
Route::get('/certificadoViewAlumno/{id}', 'AlumnoController@CertificadoViewAlumno')->name('view.certificadosalumno')->middleware('can:alumno.index');
Route::get('/CheckCertificadosAlumnos/{id}', 'AlumnoController@CheckCertificadosAlumnos')->name('check.certificadosAlumno')->middleware('can:alumno.index');
Route::delete('/alumnoForce/{id}', 'AlumnoController@destroyForce')->name('alumno.deleteForce')->middleware('can:alumno.index');
Route::put('/UpdateAlumnoUser/{id}', 'AlumnoController@UpdateAlumnoUser')->name('check.certificadosAlumno')->middleware('can:perfil.index');
Route::get('/alumnoComprobarEliminado/{rut}', 'AlumnoController@alumnoComprobarEliminado')->name('alumno.eliminadoget')->middleware('can:alumno.index');
Route::put('/alumnoActivar/{id}', 'AlumnoController@AlumnoController')->middleware('can:alumno.index');

Route::resource('/capacitacion', 'CapacitacionController')->middleware('can:capacitacion.index');
Route::get('/certificadoView/{id}', 'CapacitacionController@CertificadoView')->name('view.certificados')->middleware('can:capacitacion.index');
Route::get('/CheckCertificados/{id}', 'CapacitacionController@CheckCertificados')->name('check.certificados')->middleware('can:capacitacion.index');
Route::delete('/capacitacionForce/{id}', 'CapacitacionController@destroyForce')->name('capacitacion.deleteForce')->middleware('can:capacitacion.index');
Route::get('/capacitacionDeleteGet', 'CapacitacionController@getDelete')->name('get.deletecapacitacion')->middleware('can:capacitacion.index');
Route::get('/capacitacionReactivar/{id}', 'CapacitacionController@capacitacionReactivar')->middleware('can:capacitacion.index');

Route::resource('/certificado', 'CertificadoController')->except(['create'])->middleware('can:certificado.index');
Route::get('/getCertificado/{id}', 'CertificadoController@getCertificado')->name('get.certificado')->middleware('can:dowloader.certificado');
Route::post('/SendMailAlumno', 'MailController@SendMailAlumno')->name('mail.alumno')->middleware('role:useralumno');

Route::resource('/solicitudCertificado', 'SolicitudEmpresaController')->only(['index', 'show', 'destroy'])->middleware('can:solicitud.index');
Route::get('/solicitudCertificadoSend/{id}', 'SolicitudEmpresaController@SendCertificado')->name('send.certificadoempresa')->middleware('can:solicitud.index');
 

Auth::routes();

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});