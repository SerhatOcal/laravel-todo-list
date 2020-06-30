<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tasks extends Model
{
   protected $table = 'tasks';

   public function saveData($data, $provider_id)
   {

       if ($provider_id == 1){

           $sonuc = "";

           foreach ($data as $row) {
               $tasks = Tasks::where('title', $row->id)->first();
               $tasks = json_decode($tasks);

               if (!is_null($tasks) AND $tasks->title == $row->id) {
                   switch ($row->zorluk) {
                       case "1":
                           $zorluk = 1;
                           break;
                       case "2":
                           $zorluk = 2;
                           break;
                       case "3":
                           $zorluk = 3;
                           break;
                       case "4":
                           $zorluk = 4;
                           break;
                       case "5":
                           $zorluk = 5;
                           break;
                       default:
                           $zorluk = 0;
                   }

                   $updateData = [
                       'title'          => $row->id,
                       'time'           => $row->sure,
                       'difficulty'     => $row->zorluk,
                       'developer_id'   => $zorluk
                    ];

                   $update = Tasks::where('title', $row->id)->update($updateData);

                   if ($update){
                       $sonuc  = response()->json(["success" => 'Veriler Güncellendi', 'hata' => 0]);
                   }else{
                       $sonuc  = response()->json(["error" => 'Hata Meydana Geldi Lütfen Tekrar Deneyin', 'hata' => 1]);
                   }

               } else {

                   $task = new Tasks();
                   switch ($row->zorluk) {
                       case "1":
                           $zorluk = 1;
                           break;
                       case "2":
                           $zorluk = 2;
                           break;
                       case "3":
                           $zorluk = 3;
                           break;
                       case "4":
                           $zorluk = 4;
                           break;
                       case "5":
                           $zorluk = 5;
                           break;
                       default:
                           $zorluk = 0;
                   }

                   $task->title         = $row->id;
                   $task->time          = $row->sure;
                   $task->difficulty    = $row->zorluk;
                   $task->developer_id  = $zorluk;
                   $insert = $task->save();

                   if ($insert){
                       $sonuc  = response()->json(["success" => 'Veriler Kaydedildi', 'hata' => 0]);
                   }else{
                       $sonuc  = response()->json(["error" => 'Hata Meydana Geldi Lütfen Tekrar Deneyin', 'hata' => 1]);
                   }
               }
           }

           return $sonuc;

       } else {

           $sonuc = "";

           foreach ($data as $key => $row) {
                foreach ($row as $key2 => $row2) {

                    $tasks = Tasks::where('title', $key2)->first();
                    $tasks = json_decode($tasks);

                    if (!is_null($tasks) AND $tasks->title == $key2) {
                        switch ($row2->level) {
                            case "1":
                                $zorluk = 1;
                                break;
                            case "2":
                                $zorluk = 2;
                                break;
                            case "3":
                                $zorluk = 3;
                                break;
                            case "4":
                                $zorluk = 4;
                                break;
                            case "5":
                                $zorluk = 5;
                                break;
                            default:
                                $zorluk = 0;
                        }

                        $updateData = [
                            'title'         => $key2,
                            'time'          => $row2->estimated_duration,
                            'difficulty'    => $row2->level,
                            'developer_id'  => $zorluk
                        ];

                        $update = Tasks::where('title', $key2)->update($updateData);

                        if ($update){
                            $sonuc  = response()->json(["success" => 'Veriler Güncellendi', 'hata' => 0]);
                        }else{
                            $sonuc  = response()->json(["error" => 'Hata Meydana Geldi Lütfen Tekrar Deneyin', 'hata' => 1]);
                        }

                    } else {
                        $task                = new Tasks();
                        switch ($row2->level) {
                            case "1":
                                $zorluk = 1;
                                break;
                            case "2":
                                $zorluk = 2;
                                break;
                            case "3":
                                $zorluk = 3;
                                break;
                            case "4":
                                $zorluk = 4;
                                break;
                            case "5":
                                $zorluk = 5;
                                break;
                            default:
                                $zorluk = 0;
                        }

                        $task->title         = $key2;
                        $task->time          = $row2->estimated_duration;
                        $task->difficulty    = $row2->level;
                        $task->developer_id  = $zorluk;
                        $insert = $task->save();

                        if ($insert){
                            $sonuc  = response()->json(["success" => 'Veriler Kaydedildi', 'hata' => 0]);
                        } else {
                            $sonuc  = response()->json(["error" => 'Hata Meydana Geldi Lütfen Tekrar Deneyin', 'hata' => 1]);
                        }
                    }

                }
           }

           return $sonuc;
       }
   }
}
