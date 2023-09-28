<?php

namespace AKlump\GitIgnorePatternMatcher\Tests;

class PatternDataProvider {

  public static function getData(): array {
    $tests = [];
    $tests[] = [
      'abc/**/',
      'abc/dir/file.txt',
      FALSE,
    ];

    $tests[] = [
      '!images/*.*',
      'images/alpha.jpeg',
      FALSE,
    ];
    $tests[] = [
      '!*.html',
      'index.php',
      TRUE,
    ];
    $tests[] = [
      'settings**.php',
      'settings/default.php',
      TRUE,
    ];
    $tests[] = [
      'settings**.php',
      'settings.php',
      TRUE,
    ];
    $tests[] = [
      '**/settings*.php',
      'foo/bar/settings.php',
      TRUE,
    ];
    $tests[] = [
      'foo/*/baz/**.txt',
      'foo/bar/baz/lorem/ipsum/file.txt',
      TRUE,
    ];
    $tests[] = [
      'foo/**/baz/*.txt',
      'foo/lorem/ipsum/baz/file.txt',
      TRUE,
    ];
    $tests[] = [
      'abc/**',
      'abc/dir/file.txt',
      TRUE,
    ];
    $tests[] = [
      'abc/**',
      'abc/file.txt',
      TRUE,
    ];
    $tests[] = [
      'abc/**',
      'abc',
      FALSE,
    ];
    $tests[] = [
      '**/',
      'foo/',
      TRUE,
    ];
    $tests[] = [
      '**/',
      'foo',
      FALSE,
    ];
    $tests[] = [
      'foo?ar',
      'foobar',
      TRUE,
    ];
    $tests[] = [
      'foo/**',
      'foo/bar',
      TRUE,
    ];
    $tests[] = [
      'foo/**',
      'foo/bar/baz',
      TRUE,
    ];
    $tests[] = [
      'foo/*/baz',
      'foo/bar/baz',
      TRUE,
    ];
    $tests[] = [
      'foo/*',
      'foo/bar/baz',
      FALSE,
    ];
    $tests[] = [
      'foo/*',
      'foo/bar',
      TRUE,
    ];
    $tests[] = [
      '*',
      'foo',
      TRUE,
    ];
    $tests[] = [
      '*',
      'foo/bar',
      FALSE,
    ];
    $tests[] = [
      '**',
      'foo/bar',
      TRUE,
    ];
    $tests[] = [
      'lorem.txt',
      'lorem_txt',
      FALSE,
    ];
    $tests[] = [
      'lorem.txt',
      'lorem.txt',
      TRUE,
    ];
    $tests[] = [
      'lorem/',
      'lorem/',
      TRUE,
    ];

    return $tests;
  }

}
