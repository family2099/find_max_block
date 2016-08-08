<?php

ini_set('memory_limit', '-1');
// 題目說明

// 找出 10x10 陣列中的相鄰最大區塊

// 相鄰定義：1 的上下左右中有 1 的為相鄰區塊

// 預設陣列定義

$origin = array(
    array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
    array(0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
    array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 1, 0, 1, 0, 1, 1, 1, 1),
    array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
    array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
    array(1, 1, 0, 1, 1, 0, 0, 0, 0, 1)
);
// 練習重點：

// 邏輯判斷
// 輸出結果








$k=0;


//取出1的位置
for($i=0;$i<10;$i++)
{

  for($j=0;$j<10;$j++)
  {
    
    if($origin[$i][$j]==1)
    {
        $found[$k]=$i.$j;
        
        $k++;
        
    }
  }


}

//重複地去找區塊
$k=0;
while($found){
  
  $area_array[$k][]=$found[0];
  unset($found[0]);
  $found=array_values($found);
  count_area($found);
  $k++;
}






function count_area($found)
{
    global $k;
    global $found;
    global $area_array;
   
    

    foreach($area_array[$k] as $key=>$value)
    {
        foreach($found as $key1=>$value1)
        {
            $area_str=str_split($value);
            $f_str=str_split($value1);
            
            if($f_str[0]==$area_str[0] && $f_str[1]==$area_str[1]+1)
            {
              // var_dump($found);
              $area_array[$k][]=$value1;
              unset($found[$key1]);
              $found=array_values($found);
  
              count_area($found);
              
              
            }
            if($f_str[0]==$area_str[0]-1 && $f_str[1]==$area_str[1])
            {
              // var_dump($found);
              $area_array[$k][]=$value1;
              unset($found[$key1]);
              $found=array_values($found);
              
              count_area($found);
              
              
            }
            if($f_str[0]==$area_str[0]+1 && $f_str[1]==$area_str[1])
            {
              // var_dump($found);
              $area_array[$k][]=$value1;
              unset($found[$key1]);
              $found=array_values($found);
       
              count_area($found);
              
              
            }
            if($f_str[0]==$area_str[0] && $f_str[1]==$area_str[1]-1)
            {
              // var_dump($found);
              $area_array[$k][]=$value1;
              unset($found[$key1]);
              $found=array_values($found);
  
              count_area($found);
              
              
            }
  
        }
            
    
    }


}

//去顯示結果
$area_n=count($area_array);
// echo $area_n;

for($s=0;$s<$area_n;$s++)
{
    
    if($s==0)
    {
       
          $max[]=$area_array[$s];
     
    }
    else
    {
        
          if(sizeof($max[0]) == sizeof($area_array[$s]))
          {
              
              $max[]=$area_array[$s];
            
          }
          if(sizeof($max[0]) < sizeof($area_array[$s]))
          {
              // var_dump($max);
              
              $max=Array();
              // var_dump($max);
              // $max=array_values($max);
              $max[]=$area_array[$s];
            
          }
        
          if(sizeof($max[0]) > sizeof($area_array[$s]))
          {
              
              continue;
            
          }
          
 
      
      
    }
    
    
}




for($i=0;$i<10;$i++)
{
  
    for($j=0;$j<10;$j++)
    {
        
        
        $arr[$i][$j]=0;
        
      
    }
  
    
}

foreach($max as $key1=>$value1)
{
    foreach($value1 as $key=>$value)
    {
        $value=str_split($value);
        
        $arr[$value[0]][$value[1]]=1;
           
        
    }
  
  
}


for($i=0;$i<10;$i++)
{
  
    for($j=0;$j<10;$j++)
    {
        
        
        echo $arr[$i][$j];
        
      
    }
  
    echo "<br>";
}

/*-------------------------
靈感來源
-----------------------------*/
// function MyTest($num)
// {
// echo $num . "<Br>";
// if ($num>100) //設定遞迴條件
//   {
//   return; //結束遞迴
//   }
// Mytest($num+1); //呼叫函數自己  
// }


// MyTest(7);

?>




