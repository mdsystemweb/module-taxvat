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
 * @author Mdsystemweb Core Team <contato@Mdsystemweb.com.br>
 * @author Diogo dos Santos Alves <diogo.alves@mdsystemweb.com.br>
 */

namespace Mdsystemweb\Taxvat\Controller\Validate;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultFactory;
use Mdsystemweb\Taxvat\Model\Validate;

class Both extends Action
{
    /**
     * @var JsonFactory
     */
    private $jsonFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {

        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $params = $this->getRequest()->getParams();
        $data = reset($params);
        $fieldName = key($params);

        $resultJson->setData([
            $fieldName => Validate::isValidCpfOrCnpj($data),
        ]);

        return $resultJson;
    }
}
