<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     php artisan make:service FibonacciGenerator
     <?php

namespace App\Services;

class FibonacciGenerator
{
    /**
     * Generates a Fibonacci sequence up to the nth term.
     *
     * @param int $length The length of the Fibonacci sequence to generate.
     * @return array The generated Fibonacci sequence.
     */
    public function generateSequence(int $length): array
    {
        $sequence = [0, 1]; // Start with the first two terms of the Fibonacci sequence

        for ($i = 2; $i < $length; $i++) {
            $nextTerm = $sequence[$i - 1] + $sequence[$i - 2];
            $sequence[] = $nextTerm;
        }

        return $sequence;
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\FibonacciGenerator;

class FibonacciController extends Controller
{
    protected $fibonacciGenerator;

    public function __construct(FibonacciGenerator $fibonacciGenerator)
    {
        $this->fibonacciGenerator = $fibonacciGenerator;
    }

    public function showFibonacciSequence()
    {
        $length = 10; // Specify the length of the Fibonacci sequence
        $sequence = $this->fibonacciGenerator->generateSequence($length);

        return view('fibonacci.sequence', ['sequence' => $sequence]);
    }
}




?>
<h1>Fibonacci Sequence</h1>
   <ul>
       @foreach($sequence as $term)
           <li>{{ $term }}</li>
       @endforeach
   </ul>
  </body>
</html>
