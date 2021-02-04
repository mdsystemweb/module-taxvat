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

namespace Mdsystemweb\Taxvat\Model;

class Validate
{
    public static function isValidCpfOrCnpj($document): bool
    {
        if (!self::isValidCpf($document) && !self::isValidCnpj($document)) {
            return false;
        }

        return true;
    }

    public static function isValidCpf($cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

        if (strlen($cpf) != 11
            || $cpf == '00000000000'
            || $cpf == '11111111111'
            || $cpf == '22222222222'
            || $cpf == '33333333333'
            || $cpf == '44444444444'
            || $cpf == '55555555555'
            || $cpf == '66666666666'
            || $cpf == '77777777777'
            || $cpf == '88888888888'
            || $cpf == '99999999999'
            || $cpf == '12345678900'
        ) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
            }
        }

        return true;
    }

    public static function isValidCnpj($cnpj): bool
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        if (strlen($cnpj) != 14
            || $cnpj == "00000000000000"
            || $cnpj == "11111111111111"
            || $cnpj == "22222222222222"
            || $cnpj == "33333333333333"
            || $cnpj == "44444444444444"
            || $cnpj == "55555555555555"
            || $cnpj == "66666666666666"
            || $cnpj == "77777777777777"
            || $cnpj == "88888888888888"
            || $cnpj == "99999999999999"
        ) {
            return false;
        }

        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $left = $sum % 11;

        if ($cnpj{12} != ($left < 2 ? 0 : 11 - $left)) {
            return false;
        }

        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $left = $sum % 11;

        return $cnpj{13} == ($left < 2 ? 0 : 11 - $left);
    }
}
