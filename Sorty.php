<?php

class Sortdat
{
private $array;   	//the array with elements
private $algorithm;	//the algorithm that will be used
private $show;		//flag true:false -->print elements:don't print
static  $last=array();
function __construct($array,$algorithm,$show){
	self::$last=$this->array=$array;
	$this->algorthim=$algorithm;
	$this->show=$show;
}

function sortNow(){
switch ($this->algorthim){
	case "shell":
		return $this->shellSort();
	case "selection":
		return $this->selectionSort();
	case "quick":
		return $this->quicksort();
	case "bubble":
		  return $this->bubblesort();
	case "insertion":
		  return $this->insertionsort();
	}
}

function insertionSort()
{
	$elements=$this->array;	
	for($i=1; $i<count($elements); $i++) {
        // Always compare the bit we're looking at to its next left neighbor, unless we're at the leftmost side of the array
        for ($j=$i-1; $j>=0; $j--) {
			$this->showElements($elements);
            //sleep(1); // this is just so you can see the work in progress
             //$comparisons++;
            // If the left neighbor is actually bigger than our current bit, let's swap them
            if ($elements[$j]>$elements[$j+1]){
 			// echo "$elements[$j] is bigger than ".$elements[$j+1]."\n";
                //XOR swpping
				$elements[$j]^=$elements[$j+1]^=$elements[$j]^=$elements[$j+1];
//              $swappings++; // count how often we're swapping things around

          	} else 
					break;
			}
        }
return $elements;
}


function bubbleSort()
{
	$elements=$this->array;
    $size = count($elements);
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-1-$i; $j++) {
			if($this->show)$this->showElements($elements);
            if ($elements[$j+1] < $elements[$j]) {
			//XOR swpping
		//	echo "<br /> $j";
			$elements[$j]^=$elements[$j+1]^=$elements[$j]^=$elements[$j+1];
            }
        }
    }
    return $elements;
}

function quickSort() 
{
//	if($this->show) echo "Quick Sorting<br />";
	$elements=$this->array;
	if($this->show)$this->showElements($elements);
	if( count( $elements ) < 2 ) {
        return $elements;
    }
    $left = $right = array( );
    reset( $elements );
    $pivot_key  = key( $elements );
    $pivot  = array_shift( $elements );
    foreach( $elements as $k => $v ) {
        if( $v < $pivot )
            $left[$k] = $v;
        else
            $right[$k] = $v;
    }
    return array_merge($this->quicksort($left), array($pivot_key => $pivot), $this->quicksort($right));
}  

function selectionSort(){
	if ($this->show)echo "Selection Sorting <br />";
	$elements=$this->array;
	for ($i = 0; $i < count($elements); ++$i) {
		if($this->show)$this->showElements($elements);
		$min = null;
		$minKey = null;
		for($j = $i; $j < count($elements); ++$j) {
			if (null === $min || $elements[$j] < $min) {
				$minKey = $j;
				$min = $elements[$j];
				}
			}
		$elements[$minKey] = $elements[$i];
		$elements[$i] = $min;
	}
return $elements;
}


function shellSort()
{
$elements=$this->array;
if ($this->show)echo "Shell Sorting<br />";
$length=count($elements);
$k=0;
$gap[0]=(int) ($length / 2);
while($gap[$k]>1)
{
 $k++;
 $gap[$k]=(int)($gap[$k-1]/2);
}//end while

for($i=0;$i<=$k;$i++)
{
$step=$gap[$i];
 for($j=$step;$j<$length;$j++)
 {
	 $temp=$elements[$j];
	 $p=$j-$step;
	 while($p>=0 && $temp<$elements[$p])
	 {
		$elements[$p+$step]=$elements[$p];
		$p=$p-$step;
		if ($this->show)$this->showElements($elements);
	 }//end while
	 $elements[$p+$step]=$temp;
 }//endfor j
}//endfor i
return $elements;
}
function showElements($x){
$test=$this->compArr($x,self::$last);
//var_dump($test);
foreach($x as $k=>$v)
	if(in_array($k,$test))
		printf('<p style="color:red;display:inline;">%d </p>   ',$v) ;
	else
		echo "<p style='display:inline;'>$v</p>  ";
echo "<hr /><br>";
//print_r($test);
self::$last=$x;
$test=0;
//var_dump(self::$last);
}
function compArr($x,$y){
	$result=array();
	for($i=0;$i<count($x);$i++)
		if($x[$i]!=$y[$i])
			$result[]+=$i;
//	echo count($result)."*";
	return $result;
	}
}
?>
