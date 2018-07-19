<?php

namespace App\Queries;

use App\Book;
use DB;


class AllBooksQuery
{

    public static function sendData()
    {



        $rows = DB::table('books')
            ->select('id',
                'title',
                'author',
                'weight',
                'url',
                'is_featured',
                'is_active',
                'image_extension',
                DB::raw('DATE_FORMAT(published_at,
                             "%m-%d-%Y") as published'),
                DB::raw('DATE_FORMAT(created_at,
                             "%m-%d-%Y") as created')
            )
            ->orderBy('weight', 'asc')
            ->get();




        return json_encode($rows);

    }



}