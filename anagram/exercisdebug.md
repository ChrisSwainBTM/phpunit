➜  php git:(phpunit) ✗ php phpunit.phar anagram/anagram_test.php
PHPUnit 7.3.2 by Sebastian Bergmann and contributors.

.F.F.FFF.FFF....F...                                              20 / 20 (100%)

Time: 79 ms, Memory: 8.00MB

There were 9 failures:

1) AnagramTest::testDetectsSimpleAnagram
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'tan'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:18

2) AnagramTest::testDetectsMultipleAnagrams
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'stream'
-    1 => 'maters'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:32

3) AnagramTest::testDetectsAnagram
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'inlets'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:46

4) AnagramTest::testDetectsMultipleAnagrams2
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'gallery'
-    1 => 'regally'
-    2 => 'largely'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:55

5) AnagramTest::testDoesNotDetectIdenticalWords
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'cron'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:63

6) AnagramTest::testDetectsAnagramsCaseInsensitively
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'Carthorse'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:77

7) AnagramTest::testDetectsAnagramsUsingCaseInsensitiveSubject
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'carthorse'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:84

8) AnagramTest::testDetectsAnagramsUsingCaseInsensitvePossibleMatches
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'Carthorse'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:91

9) AnagramTest::testDetectsUnicodeAnagrams
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'ΒΓΑ'
-    1 => 'γβα'
 )

/Users/chrisswain/Exercism/php/anagram/anagram_test.php:126

FAILURES!
Tests: 20, Assertions: 20, Failures: 9.
➜  php git:(phpunit) ✗ 