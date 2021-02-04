# Mdsystemweb_Taxvat

- Validação de CPF e CNPJ

## Validação no backend

` \Mdsystemweb\Taxvat\Model\Validate::isValidCpfOrCnpj($documento)`

` \Mdsystemweb\Taxvat\Model\Validate::isValidCpf($documento)`

` \Mdsystemweb\Taxvat\Model\Validate::isValidCnpj($documento)`

## Validação no frontend

`<input ... data-validate="{required:true, 'remote':'<?php /* @escapeNotVerified */ echo $this->getUrl('Mdsystemwebtaxvat/validate/both', ['_secure' => true]); ?>'}"/>`
