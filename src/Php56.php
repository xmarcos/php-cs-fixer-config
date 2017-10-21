<?php
/**
 * (c) 2017 Marcos Sader.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace xmarcos\PhpCsFixer\Config;

use PhpCsFixer\Config;

final class Php56 extends Config
{
    /**
     * @var null|string
     */
    private $header;

    /**
     * @param null|string $header if a non-empty string is provided, it will be used to enable the header_comment fixer
     */
    public function __construct($header = null)
    {
        parent::__construct("xmarcos' config for PHP v5.6");

        $this->header = $header;

        $this->setRiskyAllowed(true);
    }

    public function getRules()
    {
        $rules = [
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

        if (is_string($this->header) && !empty($this->header)) {
            $rules['header_comment'] = [
                'commentType' => 'PHPDoc',
                'header'      => $this->header,
                'location'    => 'after_open',
                'separate'    => 'bottom',
            ];
        }

        return $rules;
    }
}
