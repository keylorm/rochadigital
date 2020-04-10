<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
#$route['default_controller'] = 'welcome';
$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'admin/login';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/logout'] = 'admin/logout';
$route['admin/taxonomia/institucion'] = 'institucion/index';
$route['admin/taxonomia/institucion/crear'] = 'institucion/registrar_institucion_form';
$route['admin/taxonomia/institucion/editar/(:num)'] = 'institucion/editar_institucion_form';
$route['admin/taxonomia/institucion/eliminar/(:num)'] = 'institucion/eliminar_taxonomia';
$route['admin/taxonomia/estado'] = 'estado/index';
$route['admin/taxonomia/estado/crear'] = 'estado/registrar_estado_form';
$route['admin/taxonomia/estado/editar/(:num)'] = 'estado/editar_estado_form';
$route['admin/taxonomia/estado/eliminar/(:num)'] = 'estado/eliminar_taxonomia';
$route['admin/taxonomia/categoria'] = 'categoria/index';
$route['admin/taxonomia/categoria/crear'] = 'categoria/registrar_categoria_form';
$route['admin/taxonomia/categoria/editar/(:num)'] = 'categoria/editar_categoria_form';
$route['admin/taxonomia/categoria/eliminar/(:num)'] = 'categoria/eliminar_taxonomia';
$route['admin/taxonomia/ano'] = 'ano/index';
$route['admin/taxonomia/ano/crear'] = 'ano/registrar_ano_form';
$route['admin/taxonomia/ano/editar/(:num)'] = 'ano/editar_ano_form';
$route['admin/taxonomia/ano/eliminar/(:num)'] = 'ano/eliminar_taxonomia';
$route['admin/taxonomia/tamanos-fotos'] = 'tamano_foto/index';
$route['admin/taxonomia/tamanos-fotos/crear'] = 'tamano_foto/registrar_tamanos_fotos_form';
$route['admin/taxonomia/tamanos-fotos/editar/(:num)'] = 'tamano_foto/editar_tamanos_fotos_form';
$route['admin/taxonomia/tamanos-fotos/eliminar/(:num)'] = 'tamano_foto/eliminar_taxonomia';
$route['admin/taxonomia/estado-solicitud'] = 'estado_solicitud/index';
$route['admin/taxonomia/estado-solicitud/crear'] = 'estado_solicitud/registrar_estado_form';
$route['admin/taxonomia/estado-solicitud/editar/(:num)'] = 'estado_solicitud/editar_estado_form';
$route['admin/taxonomia/estado-solicitud/eliminar/(:num)'] = 'estado_solicitud/eliminar_taxonomia';
$route['admin/contenido/actividad'] = 'actividad/index';
$route['admin/contenido/actividad/crear'] = 'actividad/actividad_form';
$route['admin/contenido/actividad/editar/(:num)'] = 'actividad/editar_actividad_form';
$route['admin/contenido/actividad/eliminar/(:num)'] = 'actividad/eliminar_actividad';
$route['admin/solicitud/listado-solicitudes'] = 'solicitud_fotografias/solicitud_admin_index';
$route['admin/solicitud/detalle/(:num)'] = 'solicitud_fotografias/solicitud_admin_detalle';
$route['fotografias/buscar-actividad-codigo'] = 'solicitud_fotografias/index';
$route['fotografias/listado-fotografias'] = 'solicitud_fotografias/listado_fotografias';
$route['fotografias/obtener-detalle-fotografia'] = 'solicitud_fotografias/obtener_detalle_fotografia';
$route['fotografias/add-photo-order'] = 'solicitud_fotografias/add_photo_order';
$route['fotografias/delete-photo-order'] = 'solicitud_fotografias/delete_photo_order';
$route['fotografias/formulario'] = 'solicitud_fotografias/formulario';
$route['contactenos'] = 'contacto/index';