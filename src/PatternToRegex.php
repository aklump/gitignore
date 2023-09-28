<?php

namespace AKlump\GitIgnorePatternMatcher;

/**
 * Convert a gitignore pattern to a regex pattern.
 */
class PatternToRegex {

  private const FIND_QUESTION_MARK = '\?';

  private const FIND_SINGLE_ASTERIX = '(?<!\*)\*(?!\*)';

  private const FIND_DOUBLE_ASTERISKS = '(?<!\*)\*\*(?!\*)';

  /**
   * @param string $pattern
   *   The gitignore-like pattern, e.g. "foo/**.txt"
   *
   * @return string
   *   A regex string to be used with preg_match, etc.
   */
  public function __invoke(string $pattern): string {
    $delimiter = '#';
    $regex = $pattern;
    $regex = preg_quote($regex, $delimiter);
    $regex = str_replace(['\*', '\?'], ['*', '?'], $regex);
    $regex = preg_replace($delimiter . self::FIND_QUESTION_MARK . $delimiter, '.', $regex);
    $regex = preg_replace($delimiter . self::FIND_SINGLE_ASTERIX . $delimiter, '[^/]*', $regex);
    $regex = preg_replace($delimiter . self::FIND_DOUBLE_ASTERISKS . $delimiter, '.*', $regex);
    if (substr($regex, 0, 2) === '\!') {
      $regex = '(?!' . substr($regex, 2) . ').*';
    }
    $regex = "$delimiter^$regex\$$delimiter";

    return $regex;
  }

}
