<?php
namespace App\Repositories;

use App\Image;
use Illuminate\Support\Facades\DB;

class ImageRepository extends RessourceRepository{

    public function __construct(Image $image)
    {
        $this->model = $image;
    }
    public function getImageBySuiviActivite($id){
        return DB::table('images')
        ->join('suivi_activites','images.suivi_activite_id','=','suivi_activites.id')
        ->where('images.suivi_activite_id',$id)
        ->select('images.*')
        ->get();
    }


}
