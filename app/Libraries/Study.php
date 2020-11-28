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
        for($i=1; $i<= $this->nb_months; $i++){
            // month ram cost = nb studies per day x 30
            $ram_cost = ($this->nb_studies * 30 / 1000 * 0.5) * $this->ram_hour_cost * 24 * 30;
            $storage_cost = $this->nb_studies * 30 * $this->study_cost;
            $arr_costs[] = [
                'month'=> substr(date('F', mktime(0, 0, 0, $i, 10)), 0, 3).' '.date('Y'),
                'nb_studies'=> number_format ( $this->nb_studies ,0 , '.' , ',' ),
                'cost' => number_format ( $ram_cost + $storage_cost ,2 , '.' , ',' )
            ];
            $this->nb_studies += $this->nb_studies * $this->growth / 100;
        }
        
        return $arr_costs;
    }
    
    
}