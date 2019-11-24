<?php

namespace App\Queries;

use App\Book;
use DB;


class AllBooksQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('books')
            ->select('id as Id',
                'title as Title',
                'author as Author',
                'number as Number',
                'series_name as Series',
                'url as Url',
                'is_featured as Featured',
                'is_active as Active',
                'image_extension as Ext',
                DB::raw('DATE_FORMAT(published_at,
                             "%m-%d-%Y") as Published'),
                DB::raw('DATE_FORMAT(created_at,
                             "%m-%d-%Y") as Created')
            )
            ->orderBy($column, $direction)
            ->paginate(5);

        return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('books')
            ->select('id as Id',
                'title as Title',
                'author as Author',
                'number as Number',
                'series_name as Series',
                'url as Url',
                'is_featured as Featured',
                'is_active as Active',
                'image_extension as Ext',
                DB::raw('DATE_FORMAT(published_at,
                             "%m-%d-%Y") as Published'),
                DB::raw('DATE_FORMAT(created_at,
                             "%m-%d-%Y") as Created')

            )
            ->where('title', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(5);

        return $rows;

    }



}