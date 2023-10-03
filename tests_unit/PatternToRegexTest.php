<?php

namespace AKlump\GitIgnore\Tests;

use AKlump\GitIgnore\PatternToRegex;
use AKlump\GitIgnore\Pattern;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AKlump\GitIgnore\Pattern
 */
class PatternToRegexTest extends TestCase {

  /**
   * @dataProvider \AKlump\GitIgnore\Tests\PatternDataProvider::getData
   */
  public function testInvoke(string $pattern, string $string, bool $expected) {
    $regex = (new PatternToRegex())($pattern);
    $this->assertSame($expected, (bool) preg_match($regex, $string));
  }

}
