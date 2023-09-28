<?php

namespace AKlump\GitIgnorePatternMatcher\Tests;

use AKlump\GitIgnorePatternMatcher\PatternToRegex;
use AKlump\GitIgnorePatternMatcher\StringMatcher;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AKlump\GitIgnorePatternMatcher\StringMatcher
 */
class StringMatcherTest extends TestCase {

  /**
   * @dataProvider \AKlump\GitIgnorePatternMatcher\Tests\PatternDataProvider::getData
   */
  public function testMatches(string $pattern, string $string, bool $expected) {
    $matcher = new StringMatcher($pattern);
    $this->assertSame($expected, $matcher->matches($string));
  }

}
