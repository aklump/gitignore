<?php

namespace AKlump\GitIgnore\Tests;

use AKlump\GitIgnore\Analyzer;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AKlump\GitIgnore\Analyzer
 * @uses \AKlump\GitIgnore\PatternToRegex
 */
class AnalyzerTest extends TestCase {

  public function dataFortestPathContainsPatternProvider() {
    $tests = [];
    $tests[] = [
      'foo#bar',
      FALSE,
    ];
    $tests[] = [
      'foo',
      FALSE,
    ];
    $tests[] = [
      'foo.bar',
      FALSE,
    ];
    $tests[] = [
      'foo-bar',
      FALSE,
    ];
    $tests[] = [
      'foo/bar/',
      FALSE,
    ];
    $tests[] = [
      'foo?bar',
      TRUE,
    ];
    $tests[] = [
      'foo**',
      TRUE,
    ];

    return $tests;
  }

  /**
   * @dataProvider dataFortestPathContainsPatternProvider
   */
  public function testContainsUnmatchedPatterns(string $path, bool $expected) {
    $this->assertSame($expected, Analyzer::containsPattern($path));
  }

  /**
   * @dataProvider \AKlump\GitIgnore\Tests\PatternDataProvider::getData
   */
  public function testContainsUnmatchedPatternsUsingPatternDataProvider(string $path) {
    $expect = TRUE;
    // In order to leverage the large dataset, we have to hack this a little
    // bit; these are patterns (in that dataset) for which we need to manually
    // set the expectation to FALSE.
    if (in_array($path, ['lorem/', 'lorem.txt'])) {
      $expect = FALSE;
    }
    $result = Analyzer::containsPattern($path);
    $this->assertSame($expect, $result);
  }

}
