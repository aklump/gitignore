<?php

namespace AKlump\GitIgnorePatternMatcher;

class StringAnalyzer {

  /**
   * Test a string to see if it contains any unmatched pattern bits.
   *
   * @param string $string
   *
   * @return bool
   */
  public static function containsUnmatchedPatterns(string $string): bool {
    $regex = (new PatternToRegex())($string);
    $delimiter = substr($regex, 0, 1);

    return self::trim($regex) !== preg_quote($string, $delimiter);
  }

  private static function trim($string): string {
    $split = ',';
    $regex = (new PatternToRegex())($split);
    list($prefix, $suffix) = explode($split, $regex);

    return substr($string, strlen($prefix), -1 * strlen($suffix));
  }

}
