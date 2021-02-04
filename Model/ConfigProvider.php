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

namespace Mdsystemweb\Taxvat\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\UrlInterface;

class ConfigProvider implements ConfigProviderInterface
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * ConfigProvider constructor.
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }

    public function getConfig()
    {
        $config['mdsystemwebtaxvat'] = [
            'remote' => $this->getDocumentValidateUrl(),
        ];

        return $config;
    }

    private function getDocumentValidateUrl()
    {
        return $this->urlBuilder->getUrl('mdsystemwebtaxvat/validate/both', ['_secure' => true]);
    }
}
