<?php

/**
 * @file
 * Drupal settings entry point.
 *
 * @see https://api.drupal.org/api/drupal/sites!default!default.settings.php/11
 */

$databases = [];
$settings['hash_salt'] = 'n/a'; // Overridden on Platform.sh
$settings['update_free_access'] = FALSE;
$settings['file_scan_ignore_directories'] = ['node_modules', 'bower_components',];
$settings['entity_update_batch_size'] = 50;
$settings['entity_update_backup'] = TRUE;
$settings['config_sync_directory'] = '../config/sync';
$settings['trusted_host_patterns'] = ['.*']; // Best practice for Platform.sh.

// Platform.sh
// TODO

// See local.settings.php.dist for DDEV suggestions.
if (getenv('LANDO') == 'ON' || FALSE) {
  include_once $app_root . '/' . $site_path . '/local.settings.php';
}

// Override settings dynamically on any environment.
if (file_exists($app_root . '/' . $site_path . '/env.settings.php')) {
  include_once $app_root . '/' . $site_path . '/env.settings.php';
}
