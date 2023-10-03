<?php

namespace AKlump\GitIgnore\Tests;

use AKlump\GitIgnore\PatternToRegex;
use AKlump\GitIgnore\Pattern;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AKlump\GitIgnore\Pattern
 */
class PatternTest extends TestCase {

  /**
   * @dataProvider \AKlump\GitIgnore\Tests\PatternDataProvider::getData
   */
  public function testMatches(string $pattern, string $string, bool $expected) {
    $pattern = new Pattern($pattern);
    $this->assertSame($expected, $pattern->matches($string));
  }

}
