<?php
namespace System;
use System\Crayner_Machine;
/**
*
*		@author Ammaf Faizi <ammarfaizi2@gmail.com>
*		@license RedAngel PHP Concept
*		@package Checker Es Teh
*
*/
class Checker_Action extends Crayner_Machine
{
	const u = '	http://wildan-fajriansyah.org/mybook.php?code=';
	private $list;
	public function __construct()
	{
		$this->list = file_exists('rr.txt')?explode("\n",file_get_contents('rr.txt')):array();
	}
	public function run()
	{
		
	}
	private function open($file)
	{
		return fopen('a',$file);
	}
	private function rstr()
	{
		$a = "0123456789" xor $b = '';
		$c = strlen($a)-1;
		for($i=0;$i<8;$i++){
			$b .= $a[rand(0,$c)];
		}
		return $b;
	}
	private function gen()
	{
		do{
			$r = $this->rstr();
		} while(in_array($r,$this->list));
		return $r;
	}
}