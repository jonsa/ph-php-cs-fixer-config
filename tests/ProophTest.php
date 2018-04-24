<?php
/**
 * This file is part of the prooph/php-cs-fixer-config.
 * (c) 2016-2017 prooph software GmbH <contact@prooph.de>
 * (c) 2016-2017 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Prooph\CS\Config\Test;

use PhpCsFixer\ConfigInterface;
use PHPUnit\Framework\TestCase;
use Prooph\CS\Config\Prooph;

class ProophTest extends TestCase
{
    /**
     * @test
     */
    public function it_implements_interface()
    {
        $config = new Prooph();
        $this->assertInstanceOf(ConfigInterface::class, $config);
    }

    /**
     * @test
     */
    public function it_returns_correct_values()
    {
        $config = new Prooph();
        $this->assertSame('prooph', $config->getName());
        $this->assertTrue($config->getUsingCache());
        $this->assertTrue($config->getRiskyAllowed());
    }

    /**
     * @test
     */
    public function it_has_rules()
    {
        $config = new Prooph();
        $this->assertNotEmpty($config->getRules());
    }

    /**
     * @test
     */
    public function it_does_not_have_header_comment_fixer_by_default()
    {
        $config = new Prooph();
        $rules = $config->getRules();
        $this->assertArrayHasKey('header_comment', $rules);
        $this->assertFalse($rules['header_comment']);
    }
}
