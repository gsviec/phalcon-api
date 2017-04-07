<?php
/**
 * Phanbook : Delightfully simple forum and Q&A software
 *
 * Licensed under The BSD License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link    http://phanbook.com Phanbook Project
 * @since   1.0.0
 * @author  Phanbook <hello@phanbook.com>
 * @license https://github.com/phanbook/phanbook/blob/master/LICENSE.txt
 */

use Phalcon\Loader;

// Load constants
require 'constants.php';

(new Loader)
    ->registerNamespaces([
        
        'App'              => ROOT_DIR . '/core/',
        'App\Controllers'  => ROOT_DIR . '/app/controllers/'
      
    ])
    ->registerFiles([
        __DIR__ . '/helpers.php',
    ])
    ->register();

// Register The Composer Auto Loader
require ROOT_DIR . '/vendor/autoload.php';
