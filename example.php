<?php
include __DIR__ . '/paginate.php';

$paginate = new Paginate([
  'base' => 'https://example.com',
  'prefix' => 'page',
  'currentPage' => 1,
  'itemsTotal' => 100,
  'itemsPerPage' => 10
]);
$results = $paginate->get();
print_r($results);

$paginate = new Paginate([
  'base' => 'https://example.com',
  'prefix' => 'page',
  'currentPage' => 100,
  'itemsTotal' => 100,
  'itemsPerPage' => 10
]);
$results = $paginate->get();
print_r($results);

$paginate = new Paginate([
  'base' => 'https://example.com',
  'prefix' => 'page',
  'currentPage' => 5,
  'itemsTotal' => 5,
  'itemsPerPage' => 10
]);
$results = $paginate->get();
print_r($results);

$paginate = new Paginate([
  'base' => 'https://example.com',
  'currentPage' => 3,
  'itemsTotal' => 5,
  'itemsPerPage' => 10
]);
$results = $paginate->get();
print_r($results);