<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

 // Assuming this is placed in the App/Helpers directory
namespace App\Helpers;


" Generates a Fibonacci sequence of a specified length. "

'1- This function offers a choice between a recursive or iterative approach
 to calculate the Fibonacci sequence. The recursive approach is efficient '
'2-for smaller lengths, while the iterative approach might be preferable'
'3- for larger sequences to avoid potential stack overflow issues. '

" @param int $length The desired length of the Fibonacci sequence.
 @param string $method (Optional) The calculation method (either 'recursive' or 'iterative').
 Defaults to 'recursive'.
 @return array An array containing the Fibonacci sequence elements.
 @throws InvalidArgumentException If the input length is less than 0 or the method is invalid."

function fibonacci(int $length): array
{
  if ($length < 0) {
      throw new InvalidArgumentException('Length cannot be negative');
  }

  $method = strtoupper(trim($method ?? 'recursive')); // Use 'recursive' as default

  if (!in_array($method, ['RECURSIVE', 'ITERATIVE'])) {
      throw new InvalidArgumentException('Invalid method. Supported methods: recursive, iterative');
  }

  if ($method === 'RECURSIVE') {
      return fibonacciRecursive($length);
  } else {
      return fibonacciIterative($length);
  }
}


 "Calculates the Fibonacci sequence recursively."
 '(Suitable for smaller sequences to avoid potential stack overflow issues)'

// @param int $length The desired length of the sequence.
//@return array An array containing the Fibonacci sequence elements.

function fibonacciRecursive(int $length): array
{
  if ($length <= 1) {
      return range(0, $length); // Base case: 0 or 1 element
  }

  return array_merge(fibonacciRecursive($length - 1), [fibonacciRecursive($length - 2) + fibonacciRecursive($length - 1)]);
}


function fibonacciIterative(int $length): array
{
  if ($length <= 1) {
      return range(0, $length); // Base case: 0 or 1 element
  }

  $a = 0;
  $b = 1;
  $sequence = [];

  for ($i = 0; $i < $length; $i++) {
      $sequence[] = $a;
      $c = $a + $b;
      $a = $b;
      $b = $c;
  }

  return $sequence;
}

// Example usage with a clear explanation
try {
// Choose the method (recursive or iterative) based on your sequence length
$sequenceLength = 10; // Adjust for different lengths

if ($sequenceLength <= 30) {
  $sequence = fibonacci($sequenceLength, 'recursive'); // Use recursive for smaller lengths
} else {
  $sequence = fibonacci($sequenceLength, 'iterative'); // Use iterative for larger lengths
}

echo "Fibonacci sequence of length $sequenceLength: ";
print_r($sequence);
} catch (InvalidArgumentException $e) {
echo "Error: " . $e->getMessage() . "\n";
}



     ?>
  </body>
</html>
