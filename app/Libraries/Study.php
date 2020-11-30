<?php 
namespace App\Libraries;

class Study {
    
    private $nb_studies;
    private $growth;
    private $nb_months;
    
    protected $ram_hour_cost = 0.00553;
    protected $gb_month_cost = 0.10;
    protected $study_cost = 10 / 1000 * 0.1;
    
    public function __construct($nb_studies, $growth, $nb_months){
        $this->nb_studies = $nb_studies;
        $this->growth = $growth;
        $this->nb_months = $nb_months;
    }
    
    public function CalculateCost(){
        $arr_costs = [];
        $year = date('Y');
        
        for($i=1; $i<= $this->nb_months; $i++){
            
            // Determining the month
            $month = ($i % 12);
            $new_year=false;
            if($month==0){
                $month=12;
                $new_year=true;
            }
            
            // RAM cost
            $ram_cost = ($this->nb_studies / 1000 * 0.5) * $this->ram_hour_cost * 24;

            // get the number of days for the current month
            $nb_days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            
            // Storage cost
            $storage_cost = $this->nb_studies * $nb_days_in_month * $this->study_cost;
            
            // Result
            $arr_costs[] = [
                'month'=> substr(date('F', mktime(0, 0, 0, $i, 10)), 0, 3).' '.$year,
                'nb_studies'=> number_format ( $this->nb_studies ,0 , '.' , ',' ),
                'cost' => number_format ( $ram_cost + $storage_cost ,2 , '.' , ',' )
            ];
            
            // Nb studies growth
            $this->nb_studies += $this->nb_studies * $this->growth / 100;
            
            // Increment for new year
            if($new_year) $year++;
        }
        
        return $arr_costs;
    }
    
    
}