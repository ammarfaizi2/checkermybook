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
	private $list;
	public function __construct()
	{
		header("Content-type:text/plain");
		$this->list = file_exists('dtrr.txt')?explode("\n",file_get_contents('dtrr.txt')):array();
	}
	public function run()
	{
		ini_set('max_execution_time',false);
		ignore_user_abort(true);
		print "My Book Checker\nHasil Checker disimpan di rr.txt\nHasil Sukses di simpan di success.txt\n\n\n\nMasukkan jumlah : ";
		$cycle = defined('STDIN')?(int)trim(fgets(STDIN,1024)):$_GET['lp'];
		flush();
		#sleep(2);
		print "Sedang memulai {$cycle} kali check...\n";
		flush();
		#sleep(1);
		print "\n\n";
		flush();
		#sleep(1);
		$this->dt = $this->open('dtrr.txt');
		$this->op = $this->open('rr.txt');
		$this->do = $this->open('success.txt');
		for($i=1;$i<=$cycle;$i++){
			$aa = '7'.$this->gen();
			print (count($this->list))."  |  ".$aa."  |  ";
			flush();
			print ($this->check($aa))."\n";
			flush();
		}
		$this->close($this->op);
		$this->close($this->do);
		$this->close($this->dt);
	}
	private function check($c)
	{
		$data = parent::curl("http://wildan-fajriansyah.org/mybook.php?code=".$c);
		$a = json_decode($data,true);
		$this->write($this->dt,$c."\n");
		$this->write($this->op,$c.'|'.$data."\n");
		if($a===null or $a['result']==false){
			$msg = "Salah";
		} else {
			$msg = "Benar";
			$this->write($this->do,$c."\t|\t".$data);
		}
		return $msg;
	}
	private function open($file)
	{
		return fopen($file,'a');
	}
	private function write($hp,$content)
	{
		return fwrite($hp,$content);
	}
	private function close($hp)
	{
		return fclose($hp);
	}
	private function rstr()
	{
		$a = "0123456789" xor $b = '';
		$c = strlen($a)-1;
		for($i=0;$i<7;$i++){
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