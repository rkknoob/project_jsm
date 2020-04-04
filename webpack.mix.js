const mix = require('laravel-mix');

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

mix.copyDirectory('resources/vendors/bootstrap-filestyle', 'public/vendors/bootstrap-filestyle');
mix.copyDirectory('resources/vendors/font-awesome/fonts', 'public/fonts');
mix.copyDirectory('resources/vendors/themify-icons/fonts', 'public/fonts');
mix.copyDirectory('node_modules/summernote/dist/font', 'public/css/font');
mix.copyDirectory('resources/vendors/font-awesome5/webfonts', 'public/webfonts');
mix.copy('resources/img', 'public/img');
mix.copy('resources/js/datatables-th.lang', 'public/js/datatables-th.lang');
// -backoffice
mix.babel(
    [
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/axios/dist/axios.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/metisMenu/dist/metisMenu.min.js',
        'node_modules/jquery-slimscroll/jquery.slimscroll.min.js',
        'node_modules/moment/min/moment.min.js',
        'node_modules/numeral/min/numeral.min.js',
        'node_modules/select2/dist/js/select2.full.min.js',
        'node_modules/datatables.net/js/jquery.dataTables.min.js',
        'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
        'node_modules/sweetalert2/dist/sweetalert2.all.min.js',
        'node_modules/jquery-validation/dist/jquery.validate.min.js',
        'node_modules/jquery-validation/dist/additional-methods.min.js',
        'node_modules/jquery-validation/dist/localization/messages_th.min.js',
        'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
        'node_modules/daterangepicker/daterangepicker.js',
        'resources/vendors/bootstrap-filestyle/src/bootstrap-filestyle.min.js',
        'node_modules/summernote/dist/summernote-bs4.min.js',
        'node_modules/dropzone/dist/min/dropzone.min.js',
        'resources/js/main.js'
    ],
    'public/js/vendor.js'
).version();
// -front
mix.babel(
    [
        'node_modules/vue/dist/vue.min.js',
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/axios/dist/axios.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/select2/dist/js/select2.full.min.js',
        'node_modules/sweetalert2/dist/sweetalert2.all.min.js',
        'node_modules/jquery-validation/dist/jquery.validate.min.js',
        'node_modules/jquery-validation/dist/additional-methods.min.js',
        'node_modules/jquery-validation/dist/localization/messages_th.min.js',
        'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
        'node_modules/summernote/dist/summernote-bs4.min.js',
        'node_modules/bootstrap-input-spinner/src/bootstrap-input-spinner.js',
        'node_modules/numeral/min/numeral.min.js',
        'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js',
        'resources/js/front.js'
    ],
    'public/js/global.js'
).version();

mix.babel([
    'resources/js/app.js'
], 'public/js/app.js').version();

// Page
// -backoffice
mix.babel(['resources/js/pages/backoffice/dashboard.js'], 'public/js/backoffice-dashboard.js').version();
mix.babel(['resources/js/pages/backoffice/categorie.js'], 'public/js/backoffice-categorie.js').version();
mix.babel(['resources/js/pages/backoffice/customer.js'], 'public/js/backoffice-customer.js').version();
mix.babel(['resources/js/pages/backoffice/product.js'], 'public/js/backoffice-product.js').version();
mix.babel(['resources/js/pages/backoffice/order.js'], 'public/js/backoffice-order.js').version();
mix.babel(['resources/js/pages/backoffice/payment.js'], 'public/js/backoffice-payment.js').version();
mix.babel(['resources/js/pages/backoffice/page.js'], 'public/js/backoffice-page.js').version();

// -front
mix.babel(['resources/js/pages/front/customer.js'], 'public/js/customer.js').version();
mix.babel(['resources/js/pages/front/home.js'], 'public/js/home.js').version();
mix.babel(['resources/js/pages/front/categorie.js'], 'public/js/categorie.js').version();
mix.babel(['resources/js/pages/front/product.js'], 'public/js/product.js').version();
mix.babel(['resources/js/pages/front/cart.js'], 'public/js/cart.js').version();
mix.babel(['resources/js/pages/front/order.js'], 'public/js/order.js').version();

// -backoffice
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'resources/vendors/font-awesome/css/font-awesome.min.css',
    'resources/vendors/themify-icons/css/themify-icons.css',
    'node_modules/select2/dist/css/select2.min.css',
    'node_modules/sweetalert2/dist/sweetalert2.min.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',
    'node_modules/bootstrap-select/dist/css/bootstrap-select.min.css',
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
    'node_modules/daterangepicker/daterangepicker.css',
    'node_modules/summernote/dist/summernote-bs4.css',
    'node_modules/dropzone/dist/min/dropzone.min.css',
    'resources/css/main.min.css',
    'resources/css/style.css',
], 'public/css/vendor.css').version();

// -front
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'resources/vendors/font-awesome5/css/all.min.css',
    'resources/vendors/themify-icons/css/themify-icons.css',
    'node_modules/select2/dist/css/select2.min.css',
    'node_modules/sweetalert2/dist/sweetalert2.min.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',
    'node_modules/bootstrap-select/dist/css/bootstrap-select.min.css',
    'node_modules/summernote/dist/summernote-bs4.css',
    'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css',
    'resources/css/front.css'
], 'public/css/global.css').version();

mix.styles(['resources/css/auth-light.css'], 'public/css/auth-light.css').version();
