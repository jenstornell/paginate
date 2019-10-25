# Paginate

The most simple pagination class ever. It's up to you to create the html.

## Example

```php
include __DIR__ . '/paginate.php';

$paginate = new Paginate(['currentPage' => 500, 'itemsTotal' => 1000, 'itemsPerPage' => 10]);
$results = $paginate->get();
print_r($results);
```

**Output**

```text
Array
(
  [currentPage] => 500
  [itemsTotal] => 1000
  [itemsPerPage] => 10
  [hasNext] => true
  [hasPrev] => true
  [prev] => 499
  [next] => 501
)
```

## License

MIT