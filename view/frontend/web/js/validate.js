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
 * @category mdsystemweb
 * @package base
 *
 * @copyright Copyright (c) 2019 Mdsystemweb Soluções Web. (https://www.mdsystemweb.com.br)
 *
 * @author Mdsystemweb Core Team <contato@mdsystemweb.com.br>
 * @author Diogo dos Santos Alves <diogo.alves@mdsystemweb.com.br>
 */
/*browser:true*/
/*global define*/
define([], function() {
        'use strict';

        var url = window.checkoutConfig['mdsystemwebtaxvat']['remote'];

        return {
            url: url
        }
    }
);
