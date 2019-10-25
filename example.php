<?php
include __DIR__ . '/paginate.php';

$paginate = new Paginate(['currentPage' => 500, 'itemsTotal' => 1000, 'itemsPerPage' => 10]);
$results = $paginate->get();
print_r($results);