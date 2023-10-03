<?php

namespace AKlump\GitIgnore\Tests;

class PatternDataProvider {

  public static function getData(): array {
    $tests = [];
    $tests[] = [
      '**/node_modules/.bin/*',
      '../../web/sites/default/themes/custom/og2_theme/node_modules/.bin/sass',
      TRUE,
    ];
    $tests[] = [
      '../../web/sites/default/**/node_modules/.bin/*',
      '../../web/sites/default/themes/custom/og2_theme/node_modules/.bin/sass',
      TRUE,
    ];
    $tests[] = [
      // based on Bash `ls app/*` does not return app/.
      'app/**',
      'app/',
      FALSE,
    ];
    $tests[] = [
      // based on Bash `ls app/*` does not return app/.
      'app/**',
      'app',
      FALSE,
    ];
    $tests[] = [
      // based on Bash `ls files/*` does not return files/.
      '/Users/aklump/Code/Packages/bash/easy-perms/tests_unit/files/*',
      '/Users/aklump/Code/Packages/bash/easy-perms/tests_unit/files/',
      FALSE,
    ];
    $tests[] = [
      '/foo/bar/baz/tests_unit/files/*_dir',
      '/foo/bar/baz/tests_unit/files/lorem_dir',
      TRUE,
    ];
    $tests[] = [
      '/foo/bar/baz/tests_unit/files/*_dir',
      '/foo/bar/baz/tests_unit/files/lorem_dir/',
      TRUE,
    ];
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
