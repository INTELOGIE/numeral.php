<?php

use Stillat\Numeral\Languages\Language_csCZ;

class Language_csCZTest extends LanguageTestBase
{
    protected function getLangInstance()
    {
        return new Language_csCZ;
    }

    protected $formatTests = [
        [10000, '0,0.0000', '10 000,0000'],
        [10000.23, '0,0', '10 000'],
        [-10000, '0,0.0', '-10 000,0'],
        [10000.1234, '0.000', '10000,123'],
        [-10000, '(0,0.0000)', '(10 000,0000)'],
        [-0.23, '.00', '-,23'],
        [-0.23, '(.00)', '(,23)'],
        [0.23, '0.00000', '0,23000'],
        [1230974, '0.0a', '1,2mil.'],
        [1460, '0a', '1tis.'],
        [-104000, '0a', '-104tis.'],
        [1, '0o', '1.'],
        [52, '0o', '52.'],
        [23, '0o', '23.'],
        [100, '0o', '100.'],
        [1, '0[.]0', '1']
    ];

    protected $currencyTests = [
        [1000.234, '0,0.00$', '1 000,23\u004b\u010d'],
        [-1000.234, '(0,0$)', '(1 000\u004b\u010d)'],
        [-1000.234, '0.00$', '-1000,23\u004b\u010d'],
        [1230974, '(0.00a$)', '1,23mil.\u004b\u010d']
    ];

    protected $percentageTests = [
        [1, '0%', '100%'],
        [0.974878234, '0.000%', '97,488%'],
        [-0.43, '0%', '-43%'],
        [0.43, '(0.000%)', '43,000%']
    ];

    protected $unformatTests = [
        ['10 000,123', 10000.123],
        ['(0,12345)', -0.12345],
        ['(1,23mil.\u004b\u010d)', -1230000],
        ['1,23mil.\u004b\u010d', 1230000],
        ['10tis.', 10000],
        ['-10tis.', -10000],
        ['10mil.', 10000000],
        ['23.', 23],
        ['10 000,00\u004b\u010d', 10000],
        ['-76%', -0.76],
        ['2:23:57', 8637]
    ];

}