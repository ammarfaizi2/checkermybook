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
		print "My Book Checker\nHasil Checker disimpan di rr.txt\nHasil Sukses di simpan di success.txt\n\n\n\nMasukkan jumlah : ";
		$cycle = (int)trim(fgets(STDIN,1024));
		sleep(2);
		print "Memulai...\n";
		sleep(1);
		print "\n\n";
		sleep(1);
		for($i=1;$i<=$cycle;$i++){
			$aa = $this->gen();
			print (count($this->list))."\t|\t".$aa."\t".($this->check($aa))."\n";
		}
	}
	private function check($c)
	{
		
		
	}
	private function open($file)
	{
		$this->save = fopen('a',$file);
	}
	private function write($content)
	{
		return fwrite($this->save,$content);
	}
	private function close()
	{
		return fclose($this->save);
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
		$this->list[] = $r;
		return $r;
	}
}