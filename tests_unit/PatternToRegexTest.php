<?php

namespace AKlump\GitIgnorePatternMatcher\Tests;

use AKlump\GitIgnorePatternMatcher\PatternToRegex;
use AKlump\GitIgnorePatternMatcher\StringMatcher;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AKlump\GitIgnorePatternMatcher\StringMatcher
 */
class PatternToRegexTest extends TestCase {

  /**
   * @dataProvider \AKlump\GitIgnorePatternMatcher\Tests\PatternDataProvider::getData
   */
  public function testInvoke(string $pattern, string $string, bool $expected) {
    $regex = (new PatternToRegex())($pattern);
    $this->assertSame($expected, (bool) preg_match($regex, $string));
  }

}
