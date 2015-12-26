<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "con_login";
$route['404_override'] = '';
$route['login'] = "con_login";
$route['login/register'] = "con_login/register";
$route['datapribadi'] = "con_datapribadi";
$route['master/kriteria'] = "con_kriteria";
$route['master/beasiswa'] = "con_beasiswa";
$route['formpengajuan'] = "con_formpengajuanbeasiswa";
$route['uploadsyarat'] = "con_formpengajuanbeasiswa/uploadsyarat";
$route['datapengajuan'] = "con_datapengajuanbeasiswa";
$route['master/dokumensyarat'] = "con_dokumensyarat";
$route['master/jurusan'] = "con_jurusan";
$route['master/prodi'] = "con_prodi";
$route['datamahasiswa'] = "con_datamahasiswa";
$route['verifberkas'] = "con_verifberkas";
$route['penerimabeasiswa'] = "con_penerimabeasiswa";
$route['laporanbeasiswa'] = "con_laporanbeasiswa";
$route['master/detailkriteria'] = "con_detailkriteria";
$route['pengumuman'] = "con_pengumuman";
$route['home'] = "welcome/main";


/* End of file routes.php */
/* Location: ./application/config/routes.php */