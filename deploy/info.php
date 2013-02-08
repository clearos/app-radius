<?php

/////////////////////////////////////////////////////////////////////////////
// General information
/////////////////////////////////////////////////////////////////////////////

$app['basename'] = 'radius';
$app['version'] = '1.2.4';
$app['release'] = '1';
$app['vendor'] = 'ClearFoundation';
$app['packager'] = 'ClearFoundation';
$app['license'] = 'GPLv3';
$app['license_core'] = 'LGPLv3';
$app['description'] = lang('radius_app_description');

/////////////////////////////////////////////////////////////////////////////
// App name and categories
/////////////////////////////////////////////////////////////////////////////

$app['name'] = lang('radius_app_name');
$app['category'] = lang('base_category_network');
$app['subcategory'] = lang('base_subcategory_infrastructure');

/////////////////////////////////////////////////////////////////////////////
// Controllers
/////////////////////////////////////////////////////////////////////////////

$app['controllers']['radius']['title'] = $app['name'];
$app['controllers']['settings']['title'] = lang('base_settings');

/////////////////////////////////////////////////////////////////////////////
// Packaging
/////////////////////////////////////////////////////////////////////////////

$app['requires'] = array(
    'app-accounts',
    'app-groups',
    'app-users',
    'app-network',
);

$app['core_requires'] = array(
    'app-network-core',
    'app-openldap-directory-core',
    'app-samba-extension-core',
    'freeradius',
    'freeradius-ldap',
    'freeradius-utils',
);

$app['core_directory_manifest'] = array( 
    '/etc/raddb/clearos-certs' => array(),
    '/var/clearos/radius' => array(),
    '/var/clearos/radius/backup' => array(),
);

$app['core_file_manifest'] = array( 
    'freeradius.conf' => array( 'target' => '/var/clearos/ldap/synchronize/freeradius.conf' ),
    'clearos-clients.conf' => array(
        'target' => '/etc/raddb/clearos-clients.conf',
        'mode' => '0640',
        'owner' => 'root',
        'group' => 'radiusd',
        'config' => TRUE,
        'config_params' => 'noreplace',
    ),
    'clearos-eap.conf' => array(
        'target' => '/etc/raddb/clearos-eap.conf',
        'mode' => '0640',
        'owner' => 'root',
        'group' => 'radiusd',
    ),
    'clearos-users' => array(
        'target' => '/etc/raddb/clearos-users',
        'mode' => '0640',
        'owner' => 'root',
        'group' => 'radiusd',
    ),
    'clearos-inner-tunnel' => array(
        'target' => '/etc/raddb/sites-available/clearos-inner-tunnel',
        'mode' => '0640',
        'owner' => 'root',
        'group' => 'radiusd',
    ),
    'radiusd.php'=> array('target' => '/var/clearos/base/daemon/radiusd.php'),
);
