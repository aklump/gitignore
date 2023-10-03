<?php

namespace AKlump\GitIgnore\Tests;

use AKlump\GitIgnore\Analyzer;
use AKlump\GitIgnore\Pattern;
use AKlump\GitIgnore\PatternToRegex;
use PHPUnit\Framework\TestCase;

/**
 * @covers README.md
 * @uses \AKlump\GitIgnore\PatternToRegex
 * @uses \AKlump\GitIgnore\Pattern
 * @uses \AKlump\GitIgnore\Analyzer
 */
class ReadmeExamplesTest extends TestCase {

  public function testTestPattern() {
    $pattern = new Pattern('foo/**/*.php');
    $result = $pattern->matches('foo/bar/baz/lorem.php');
    $this->assertTrue($result);
  }

  public function testPatternToRegex() {
    $regex = (new PatternToRegex())('foo/**/*.php');
    $this->assertSame('#^foo/.+/[^/]*\.php/?$#', $regex);

    $regex = PatternToRegex::convert('foo/**/*.php');
    $this->assertSame('#^foo/.+/[^/]*\.php/?$#', $regex);
  }

  public function testContainsPattern() {
    $this->assertTrue(Analyzer::containsPattern('foo/**'));
    $this->assertFalse(Analyzer::containsPattern('foo/bar'));
  }

}
