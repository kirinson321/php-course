<?php

function print_diamond($word){
    $word_length = strlen(utf8_decode($word));
    $starting_point = (int)($word_length/2);    
    
    $spaces = "";
    $output = "";
        
    #$blank = $starting_point;

    $start_index = $starting_point;
    $end_index = $starting_point;
    
    for($i = 0; $i <= $starting_point; $i++)
    {
        for($j = 0; $j < $start_index; $j++)
        {
            $spaces = $spaces . " ";
        }   
        
        if($word_length%2 == 0)
        {        
        for($j = $start_index; $j<$end_index; $j++)
        {
            $output = $output . $word[$j];    
        }
        } else
        {
            for($j = $start_index; $j<=$end_index; $j++)
        {
            $output = $output . $word[$j];    
        }
        }
        echo $spaces . $output;
        echo PHP_EOL;
        $start_index = $start_index - 1;
        $end_index = $end_index + 1;
        $spaces = "";
        $output = "";
    }

    $start_index = 0;
    $end_index = $word_length-1;

    for($i = $start_index; $i <= $starting_point; $i++)
    {
        for($j = 0; $j < $start_index; $j++)
        {
            $spaces = $spaces . " ";
        }   
        
        for($j = $start_index; $j<=$end_index; $j++)
        {
            $output = $output . $word[$j];    
        }

        echo $spaces . $output;
        echo PHP_EOL;
        $start_index = $start_index + 1;
        $end_index = $end_index - 1;
        $spaces = "";
        $output = "";
    }

}


for($i = 1; $i < $argc; $i++){
    print_diamond($argv[$i]);
    echo PHP_EOL;
}
