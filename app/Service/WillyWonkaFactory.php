<?php

namespace App\Service;

class WillyWonkaFactory
{
    public $result;
    public $groups;

    public function __construct()
    {
        $this->groups = collect([5000, 2000, 1000, 500, 250]); 
    }

    /**      
     * Build and get method are just calls for logic algorithm methods.
     * get and build method is space to improve the methods ideally u should be able to call multiple at a time.
     * 
     * @param  int  $n         
     * @param  int  $y         
     * @param  int  $key        
     * @return void             
     */
    public function get(int $amount) : array
    {
        return $this->build($amount);        
    }

    private function build(int $amount) : array
    {
        $this->widgetCover($amount, $this->groups[0], 0);
        return $this->optmizePacks(); 
    }

    /**      
     * method to get all widgets per pack using highest pack with as little room left over
     * @param  int  $n         
     * @param  int  $y         
     * @param  int  $key        
     * @return void             
     */
    private function widgetCover(int $n, int $y, int $key)
    {   
        $x = $this->getX($n, $y);
        $n = $n - (($x - 1)) * $y;

        // perfect order
        if(($n / $y) === $x) {
            $this->result[] = [$x, $y];
            return;
        }
      
        $this->result[] = [$x - 1 , $y];

        if($key === $this->groups->keys()->last() && $n > 0) {
            $this->result[$key][0] += 1;
            return;
        }
        
        return $this->widgetCover($n, $this->groups[$key + 1], $key + 1);   
    }    

    /**
     * grab quantity of package given the amount that is left and package size
     * @param  int    $n 
     * @param  int    $y 
     * @return int    
     */
    private function getX(int $n, int $y) : int 
    {
        return ceil($n / $y);
    }

    /**
     * Optimize packs based by checking each group 
     * @param  int    $n 
     * @param  int    $y 
     * @return int    
     */
    private function optmizePacks() : array
    {
        $data = array_reverse($this->result);
        $array = [];
        $max = count($data) - 1;

        foreach($data as $key => &$pack) {
            if($key === $max) {
                break;
            }

            $addOnKey = $key + 1;
           
            if($pack[0] * $pack[1] === $data[$addOnKey][1] * ($pack[0] - 1)) {
                $data[$key][0] = 0;
                $data[$key][1] = $pack[1];
                
                $data[$key + 1][0] += 1;
                $data[$key + 1][1] = $data[$key + 1][1];
            }
        }

        return collect($data)->reject(function($item){
            if($item[0] === 0 ) {
                return true;
            }
        } )->toArray();      
    }
}


