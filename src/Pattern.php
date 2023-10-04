<?php

namespace AKlump\GitIgnore;

/**
 * @url https://git-scm.com/docs/gitignore#_pattern_format
 *
 * "*" matches anything except a slash.
 * "?" matches any one character except "/".
 * [a-zA-Z], can be used to match one of the characters in a range.
 */
class Pattern {

  private string $pattern;

  private string $regex;

  public function __construct(string $pattern) {
    $this->regex = (new PatternToRegex())($pattern);
    $this->pattern = $pattern;
  }

  /**
   * Test a pattern match using a string.
   *
   * @param string $test_string
   *
   * @return bool
   *   True if $test_string matches the pattern.
   */
  public function matches(string $test_string): bool {
    $result = FALSE;
    if (empty($this->regex) || $this->regex === $this->pattern) {
      $result = $test_string === $this->pattern;
    }
    elseif (preg_match($this->regex, $test_string, $matches)) {
      $result = $matches[0] === $test_string;
    }

    return $result;
  }

  public function toRegex(): string {
    return (new PatternToRegex())($this);
  }

  public function __toString(): string {
    return $this->pattern;
  }

}
