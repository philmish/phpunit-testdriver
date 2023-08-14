<?php declare(strict_types=1);

use PhpCsFixer\Finder;

$finder = Finder::create()
    ->exclude(__DIR__ . "/tools")
    ->exclude(__DIR__ . "/vendor")
    ->in(__DIR__ . "/src")
    ->in(__DIR__ . "/tests");

$config = new PhpCsFixer\Config();
$config->setRules([
    "trim_array_spaces" => true,
    "no_multiline_whitespace_around_double_arrow" => true,
    "cast_spaces" => ["space" => "none"],
    "concat_space" => ["spacing" => "one"],
    "clean_namespace" => true,
    "curly_braces_position" => [
        "classes_opening_brace" => "same_line",
        "functions_opening_brace" => "same_line",
       "anonymous_functions_opening_brace" => "same_line",
    ],
    "fully_qualified_strict_types" => true,
    "no_blank_lines_after_phpdoc" => true,
    "no_useless_nullsafe_operator" => true,
    "phpdoc_indent" => true,
    "phpdoc_trim" => true,
    "single_quote" => false,
   "whitespace_after_comma_in_array" => ["ensure_single_space" => true] 
]);
$config->setFinder($finder);
$config->setCacheFile(__DIR__ . "/.php_cs.cache");
return $config;


