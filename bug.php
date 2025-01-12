```php
function processData(array $data): array
{
    $result = [];
    foreach ($data as $item) {
        // Assume 'item' is an array with at least a 'value' key
        if (isset($item['value'])) {
            $result[] = $item['value'];
        }
    }
    return $result;
}

$myData = [
    ['value' => 1],
    ['value' => 2],
    ['value' => 3],
];

$processedData = processData($myData);
print_r($processedData); // Output: Array ( [0] => 1 [1] => 2 [2] => 3 )

// The bug is introduced here
$myData[] = ['somekey' => 1]; // Adding an element without 'value' key

$processedData = processData($myData);
print_r($processedData); // Output: Array ( [0] => 1 [1] => 2 [2] => 3 ) //Missing the last element
```