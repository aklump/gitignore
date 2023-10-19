<?php

namespace AKlump\GitIgnore;

/**
 * Convert a gitignore pattern to a regex pattern.
 */
class PatternToRegex {

  private const FIND_QUESTION_MARK = '\?';

  private const REPLACE_QUESTION_MARK = '.';

  private const FIND_SINGLE_ASTERIX = '(?<!\*)\*(?!\*)';

  private const REPLACE_SINGLE_ASTERIX = '[^/]*';

  private const FIND_SINGLE_DIR_ASTERIX = '(?<!\*)/\*(?!\*)';

  private const REPLACE_SINGLE_DIR_ASTERIX = '/[^/]+';

  private const FIND_DOUBLE_ASTERISKS = '(?<!\*)\*\*(?!\*)';

  private const REPLACE_DOUBLE_ASTERISKS = '.*';

  private const FIND_DOUBLE_DIR_ASTERISKS = '(?<!\*)/\*\*(?!\*)';

  private const REPLACE_DOUBLE_DIR_ASTERISKS = '/.+';

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
    $regex = preg_replace($delimiter . self::FIND_QUESTION_MARK . $delimiter, self::REPLACE_QUESTION_MARK, $regex);
    $regex = preg_replace($delimiter . self::FIND_SINGLE_DIR_ASTERIX . $delimiter, self::REPLACE_SINGLE_DIR_ASTERIX, $regex);
    $regex = preg_replace($delimiter . self::FIND_SINGLE_ASTERIX . $delimiter, self::REPLACE_SINGLE_ASTERIX, $regex);
    $regex = preg_replace($delimiter . self::FIND_DOUBLE_DIR_ASTERISKS . $delimiter, self::REPLACE_DOUBLE_DIR_ASTERISKS, $regex);
    $regex = preg_replace($delimiter . self::FIND_DOUBLE_ASTERISKS . $delimiter, self::REPLACE_DOUBLE_ASTERISKS, $regex);
    if (substr($regex, 0, 2) === '\!') {
      $regex = '(?!' . substr($regex, 2) . ').*';
    }
    $regex = "^$regex/?\$";

    return $delimiter . $regex . $delimiter;
  }

}
