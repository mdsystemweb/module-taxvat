<?php
/**
 * Mdsystemweb Soluções Web
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to https://www.mdsystemweb.com.br for more information.
 *
 * @category Mdsystemweb
 * @package base
 *
 * @copyright Copyright (c) 2019 Mdsystemweb Soluções Web. (https://www.mdsystemweb.com.br)
 *
 * @author Mdsystemweb Core Team <contato@mdsystemweb.com.br>
 * @author Diogo dos Santos Alves <diogo.alves@mdsystemweb.com.br>
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Mdsystemweb_Taxvat',
    __DIR__
);
