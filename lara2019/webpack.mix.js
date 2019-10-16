let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// MIX ADMIN PANEL
mix.styles([
	'resources/assets/admin/plugins/bootstrap/css/bootstrap.min.css',
	'resources/assets/admin/font-awesome/4.5.0/css/font-awesome.min.css',
	'resources/assets/admin/ionicons/2.0.1/css/ionicons.min.css',
	'resources/assets/admin/plugins/iCheck/minimal/_all.css',
	'resources/assets/admin/plugins/datepicker/datepicker3.css',
	'resources/assets/admin/plugins/select2/select2.min.css',
	'resources/assets/admin/plugins/datatables/dataTables.bootstrap.css',
	'resources/assets/admin/dist/css/AdminLTE.min.css',
	'resources/assets/admin/dist/css/skins/_all-skins.min.css'
], 'public/css/admin.css');


mix.scripts([
	'resources/assets/admin/plugins/jQuery/jquery-2.2.3.min.js',
	'resources/assets/admin/plugins/bootstrap/js/bootstrap.min.js',
	'resources/assets/admin/plugins/select2/select2.full.min.js',
	'resources/assets/admin/plugins/datepicker/bootstrap-datepicker.js',
	'resources/assets/admin/plugins/datatables/jquery.dataTables.min.js',
	'resources/assets/admin/plugins/datatables/dataTables.bootstrap.min.js',
	'resources/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js',
	'resources/assets/admin/plugins/fastclick/fastclick.js',
	'resources/assets/admin/plugins/iCheck/icheck.min.js',
	'resources/assets/admin/dist/js/app.min.js',
	'resources/assets/admin/dist/js/demo.js',
	'resources/assets/admin/dist/js/scripts.js'
], 'public/js/admin.js');



//MIX ADMIN AUTH
mix.styles([
	'resources/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css',
	'resources/assets/admin/bower_components/font-awesome/css/font-awesome.min.css',
	'resources/assets/admin/bower_components/Ionicons/css/ionicons.min.css',
	'resources/assets/admin/dist/css/AdminLTE.min.css',
	'resources/assets/admin/plugins/iCheck/square/blue.css'
], 'public/css/admin_auth.css');


mix.scripts([
	'resources/assets/admin/bower_components/jquery/dist/jquery.min.js',
	'resources/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js',
	'resources/assets/admin/plugins/iCheck/icheck.min.js',
	'resources/js/forms.js'
], 'public/js/admin_auth.js');





// MIX FRONT
mix.styles([
	'resources/assets/front/css/bootstrap.css',
	'resources/assets/front/css/shop-homepage.css'
], 'public/css/front.css');


mix.scripts([
	'resources/assets/front/js/jquery/jquery.min.js',
	'resources/assets/front/js/bootstrap/bootstrap.bundle.js'
], 'public/js/front.js');
