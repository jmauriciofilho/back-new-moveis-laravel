var gulp = require('gulp');
var elixir = require('laravel-elixir');
var clean = require('gulp-clean');

elixir.extend('delete', function(args) {
    new elixir.Task('delete', function() {
        return gulp.src(args).pipe(clean());
    });
});

elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var adminResources      = '../admin';

var adminPublic         = 'public/assets/admin';
var adminPublicCss      = adminPublic + '/css/admin.css';
var adminPublicJs       = adminPublic + '/js/admin.js';
var adminCustomCss      = adminPublic + '/css/custom.css';

var folderNodeModules   = '../../../node_modules';

elixir(function(mix) {

    mix.delete('public/assets/admin');

    mix.less([
        folderNodeModules   + '/bootstrap-less/bootstrap/bootstrap.less',
        folderNodeModules   + '/font-awesome/less/font-awesome.less',
        adminResources      + '/adminlte/less/AdminLTE.less',
        adminResources      + '/adminlte/less/skins/_all-skins.less',
        folderNodeModules   + '/toastr/toastr.less',
        folderNodeModules   + '/icheck/skins/flat/blue.css'
    ], adminPublicCss);

    mix.less([
        adminResources + '/less/admin.less'
    ], adminCustomCss);

    mix.copy('node_modules/bootstrap/fonts', adminPublic + '/fonts');
    mix.copy('node_modules/font-awesome/fonts', adminPublic + '/fonts');
    mix.copy('node_modules/ionicons/dist/fonts', adminPublic + '/fonts');
    mix.copy('node_modules/icheck/skins/flat/blue.png', adminPublic + '/img/blue.png');
    mix.copy('node_modules/icheck/skins/flat/blue@2x.png', adminPublic + '/img/blue@2x.png');
    mix.copy('resources/assets/admin/js/dataTables.pt-BR.json', adminPublic + '/js/dataTables.pt-BR.json');

    mix.styles([
        folderNodeModules + '/ionicons/dist/css/ionicons.min.css',
        folderNodeModules + '/select2/dist/css/select2.css',
        folderNodeModules + '/datatables.net-bs/css/dataTables.bootstrap.css',
        '../../../' + adminPublicCss,
        '../../../' + adminCustomCss
    ], adminPublicCss);

    mix.delete(adminCustomCss);

    mix.scripts([
        folderNodeModules   + '/jquery/dist/jquery.min.js',
        folderNodeModules   + '/bootstrap-less/js/bootstrap.min.js',
        folderNodeModules   + '/toastr/toastr.js',
        adminResources      + '/adminlte/js/app.js',
        folderNodeModules   + '/datatables.net/js/jquery.dataTables.js',
        folderNodeModules   + '/datatables.net-bs/js/dataTables.bootstrap.js',
        folderNodeModules   + '/select2/dist/js/select2.js',
        folderNodeModules   + '/select2/dist/js/i18n/pt-BR.js',
        folderNodeModules   + '/icheck/icheck.js',
        adminResources      + '/js/admin.js',
        adminResources      + '/js/csktech.js'
    ], adminPublicJs);

});