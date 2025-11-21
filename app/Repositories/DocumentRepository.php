<?php
namespace App\Repositories;

use App\Document;
use Illuminate\Support\Facades\DB;

class DocumentRepository extends RessourceRepository{

    public function __construct(Document $document)
    {
        $this->model = $document;
    }

    public function getByappel($appel)
    {
        return DB::table("documents")->where("appel_id",$appel)->get();
    }
    public function get()
    {
        return DB::table("documents")
        ->join("appels","documents.appel_id","=","appels.id")
        ->select("documents.*","appels.titre as projet")
        ->get();
    }
}
