<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function uppercase($word)
    {
        $data['word'] = $word;
		$data['upperWord'] = strtoupper($word);
		return view('uppercase')->with($data);
    }

    public function increment($num)
    {
    	$data['num'] = $num;
		$data['inc'] = $num + 1;
		return view('increment')->with($data);
    }

    public function add($a, $b)
    {
    	$data['b'] = $b;
    	$data['a'] = $a;
    	$data['result'] = $a + $b;
    	return view('add')->with($data);
    }

    public function rollDice($guess)
    {
    	$data['dice'] = rand(1,6);
		$data['guess'] = $guess;
		$data['result'] = ($guess == $data['dice']) ? 'Good Guess' : 'Wrong';

		return view('roll-dice')->with($data);
    }
}