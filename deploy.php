<?php
namespace Deployer;

require 'recipe/laravel.php';

// Zone ühendus
set('application', 'yl1');
set('remote_user', 'virt109710');
set('http_user', 'virt109710');
set('keep_releases', 2);

host('tak21karp.itmajakas.ee')
    ->setHostname('tak21karp.itmajakas.ee')
    ->set('http_user', 'virt109710')
    ->set('deploy_path', '~/domeenid/www.tak21karp.itmajakas.ee/yl1')
    ->set('branch', 'main');

set('repository', 'git@github.com:EvertKa/weather-apii.git');

// tasks
task('opcache:clear', function () {
    run('killall php82-cgi || true');
})->desc('Clear opcache');

task('build:node', function () {
    cd('{{release_path}}');
    run('npm i');
    run('npx vite build');
    run('rm -rf node_modules'); 
});

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'build:node',
    'deploy:publish',
    'opcache:clear',
    'artisan:cache:clear'
]);
// Hooks

after('deploy:failed', 'deploy:unlock');

// namespace Deployer;

// require 'recipe/laravel.php';
// require 'contrib/php-fpm.php';
// require 'contrib/npm.php';

// set('application', 'yl1');
// set('repository', 'git@github.com:EvertKa/weather-apii.git');
// set('php_fpm_version', '8.0');

// host('tak21karp.itmajakas.ee')
//     ->set('remote_user', 'virt109710')
//     ->set('hostname', 'tak21karp.itmajakas.ee')
//     ->set('deploy_path', '~/domeenid/tak21karp.itmajakas.ee/yl1');

// task('deploy', [
//     'deploy:prepare',
//     'deploy:vendors',
//     'artisan:storage:link',
//     'artisan:view:cache',
//     'artisan:config:cache',
//     'artisan:migrate',
//     'npm:install',
//     'npm:run:prod',
//     'deploy:publish',
//     'php-fpm:reload',
// ]);

// task('npm:run:prod', function () {
//     cd('{{release_or_current_path}}');
//     run('npm run prod');
// });

// after('deploy:failed', 'deploy:unlock');