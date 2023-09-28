<?php

namespace AKlump\GitIgnorePatternMatcher\Tests;

use AKlump\GitIgnorePatternMatcher\StringAnalyzer;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AKlump\GitIgnorePatternMatcher\StringAnalyzer
 */
class StringAnalyzerTest extends TestCase {

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
    $this->assertSame($expected, StringAnalyzer::containsUnmatchedPatterns($path));
  }

  /**
   * @dataProvider \AKlump\GitIgnorePatternMatcher\Tests\PatternDataProvider::getData
   */
  public function testContainsUnmatchedPatternsUsingPatternDataProvider(string $path) {
    $expect = TRUE;
    // In order to leverage the large dataset, we have to hack this a little
    // bit; these are patterns (in that dataset) for which we need to manually
    // set the expectation to FALSE.
    if (in_array($path, ['lorem/', 'lorem.txt'])) {
      $expect = FALSE;
    }
    $result = StringAnalyzer::containsUnmatchedPatterns($path);
    $this->assertSame($expect, $result);
  }

}
