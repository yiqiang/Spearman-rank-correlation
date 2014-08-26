<?php  
// Created by yiqiang <daiyqj@gmail.com>
class spearman
{
	function __construct()
	{
		//constructor
	}

	//find rank
	function rank($array)
	{
		$temp=$array;

		rsort($temp);

		$rank=array();
		$frequency=array_count_values($temp);

		foreach($array as $v)
		{
			$key=array_search($v, $temp);
			$key++;

			if($frequency[$v]>1)
			{
				$rank[]=array_sum(range($key,$key+$frequency[$v]-1))/$frequency[$v];
			}
			else
			{
				$rank[]=$key;
			}
			
		}
		return $rank;
	}

	function calc($array1,$array2)
	{
		//find d square
		$d_square=array_map
		(
			function ($x, $y) { return pow(($y-$x),2); },
			$this->rank($array1),
			$this->rank($array2)
		);

		$n=count($array1);
		//fomula calculation
		$result=1-(6*(array_sum($d_square))/($n*(pow($n,2)-1)));

		return $result;
	}
}

