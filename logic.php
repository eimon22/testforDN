<?php 

//pushes half of the zeros in a given array to the beginning of the array, and the other half to the end.

function transformedArray(array $inputArray) : array {

	$zeroCount = 0;
	$outputArray = [];
	$rightZero = [];

	for($i=0; $i < count($inputArray); $i++) {
		if($inputArray[$i] == 0)
		{
			$zeroCount++;
			if($zeroCount % 2 == 0) {
				//push zero to the left
				array_unshift($outputArray, 0);
			}
			else {
				//prepare zero to the right
				array_push($rightZero, 0);
			}
		}
		else {
			//push non-zero to the right
			array_push($outputArray, $inputArray[$i]);
		}
	}

	//combine to the two array
	return array_merge($outputArray, $rightZero);
}

echo "[" .implode(",", transformedArray([3,5,6,0,7,0,1]))."]<br>";
echo "[" .implode(",", transformedArray([5,0,0,6,0,8]))."]<br>";
echo "[" .implode(",", transformedArray([1,2,3,0,0,0,0]))."]<br>";
echo "[" .implode(",", transformedArray([1,2,3]))."]<br>";