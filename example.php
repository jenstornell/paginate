<?php
include __DIR__ . '/paginate.php';

$paginate = new Paginate([
  'base' => 'https://example.com',
  'currentPage' => 1,
  'itemsTotal' => 1000,
  'itemsPerPage' => 10
]);
$results = $paginate->get();
print_r($results);