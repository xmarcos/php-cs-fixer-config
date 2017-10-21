<?php
/**
 * (c) 2017 Marcos Sader.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace xmarcos\PhpCsFixer\Config\Test;

use PhpCsFixer\ConfigInterface;
use PHPUnit\Framework\TestCase;
use xmarcos\PhpCsFixer\Config\Php56;

final class Php56Test extends TestCase
{
    public function testImplementsInterface()
    {
        $config = new Php56();
        $this->assertInstanceOf(ConfigInterface::class, $config);
    }

    public function testName()
    {
        $expected_name = "xmarcos' config for PHP v5.6";
        $config        = new Php56();
        $this->assertEquals($expected_name, $config->getName());
    }

    private function getBaseRules()
    {
        return [
            '@PSR2'        => true,
            '@Symfony'     => true,
            'array_syntax' => [
                'syntax'    => 'short',
            ],
            'binary_operator_spaces' => [
                'align_double_arrow' => true,
                'align_equals'       => true,
            ],
            'heredoc_to_nowdoc'                   => true,
            'no_null_property_initialization'     => true,
            'no_short_echo_tag'                   => true,
            'ordered_imports'                     => true,
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_order'                        => true,
            'phpdoc_types_order'                  => true,
            'strict_comparison'                   => true,
        ];
    }

    /**
     * @param null|string $header
     *
     * @return array
     */
    private function getHeaderRules($header = null)
    {
        return [
            'header_comment' => [
                'commentType' => 'PHPDoc',
                'header'      => $header,
                'location'    => 'after_open',
                'separate'    => 'bottom',
            ],
        ];
    }

    public function testHasRules()
    {
        $config = new Php56();
        $this->assertNotEmpty($config->getRules());
    }

    public function testBaseRules()
    {
        $config = new Php56();
        $this->assertEquals($this->getBaseRules(), $config->getRules());
    }

    public function testBaseAndHeaderRules()
    {
        $header_comment = '(c) 2017';
        $config         = new Php56($header_comment);
        $this->assertContains($this->getHeaderRules(), $config->getRules());
    }
}
