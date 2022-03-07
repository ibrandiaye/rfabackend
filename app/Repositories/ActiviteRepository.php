<?php

namespace App\Repositories;

use App\Activite;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActiviteRepository extends RessourceRepository{
    public function __construct(Activite $activite)
    {
        $this->model = $activite;
    }
    public function getActiviteByProjets($id){
        return Activite::with('projet')
        ->where('projet_id',$id)
        ->get();
    }
    public function getActivite(){
        return Activite::with('projet')
        ->where('debut','>=', Carbon::now()->format('Y-m-d'))
        ->get();
    }


    public function countActivite($projet_id)
  {
      return DB::table('activites')
      ->join('projets','activites.projet_id','=','projets.id')
      ->where('activites.projet_id',$projet_id)
      ->count('*');
  }
  public function datediff($debut,$fin){


    // Declare and define two dates
    $date1 = strtotime($debut);
    $date2 = strtotime($fin);

    // Formulate the Difference between two dates
    $diff = abs($date2 - $date1);

    // To get the year divide the resultant date into
    // total seconds in a year (365*60*60*24)
    $years = floor($diff / (365*60*60*24));

    // To get the month, subtract it with years and
    // divide the resultant date into
    // total seconds in a month (30*60*60*24)
    $months = floor(($diff - $years * 365*60*60*24)
                                    / (30*60*60*24));

    // To get the day, subtract it with years and
    // months and divide the resultant date into
    // total seconds in a days (60*60*24)
    $days = floor(($diff - $years * 365*60*60*24 -
                $months*30*60*60*24)/ (60*60*24));

    // To get the hour, subtract it with years,
    // months & seconds and divide the resultant
    // date into total seconds in a hours (60*60)
    $hours = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24)
                                        / (60*60));

    // To get the minutes, subtract it with years,
    // months, seconds and hours and divide the
    // resultant date into total seconds i.e. 60
    $minutes = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24
                                - $hours*60*60)/ 60);

    // To get the minutes, subtract it with years,
    // months, seconds, hours and minutes
    $seconds = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24
                    - $hours*60*60 - $minutes*60));

    return $days;


  }
}
