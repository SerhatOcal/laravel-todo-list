<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Developers extends Model
{
   public function hesapla(){
       $results = DB::select(
           'SELECT
                        developers.id,
                        developers.name,
                        tasks.title,
                        tasks.difficulty,
                        SUM(tasks.time) AS toplam_sure
                    FROM developers
                    LEFT JOIN tasks ON tasks.developer_id=developers.id
                    GROUP BY tasks.developer_id'
       );

       return $results;
   }
}
