<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class WorldTermQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('world_terms')
                    ->select('world_terms.id as Id',
                             'world_terms.name as Name',
                             'world_terms.slug as Slug',
                             'world_terms.is_active as Active',
                             'world_terms.description as Description',
                             'world_term_types.name as Type',
                             'world_term_types.id as Tid',
                             'planets.name as Planet',
                             'planets.id as Pid',
                             'books.title as BookTitle',
                             'books.url as Url',
                             DB::raw('DATE_FORMAT(world_terms.created_at,
                             "%m-%d-%Y") as Created'))
                             ->leftJoin('world_term_types', 'world_term_type_id', '=', 'world_term_types.id')
                             ->leftJoin('planets', 'planet_id', '=', 'planets.id')
                             ->leftJoin('books', 'book_id', '=', 'books.id')
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {


        if($column == 'First Appears'){

            $column = 'books.title';

        }

        $rows = DB::table('world_terms')
            ->select('world_terms.id as Id',
                     'world_terms.name as Name',
                     'world_terms.slug as Slug',
                     'world_terms.is_active as Active',
                     'world_terms.description as Description',
                     'world_term_types.name as Type',
                     'world_term_types.id as Tid',
                     'planets.name as Planet',
                     'planets.id as Pid',
                     'books.title as BookTitle',
                     'books.url as Url',
                     DB::raw('DATE_FORMAT(world_terms.created_at,
                             "%m-%d-%Y") as Created'))
            ->leftJoin('world_term_types', 'world_term_type_id', '=', 'world_term_types.id')
            ->leftJoin('planets', 'planet_id', '=', 'planets.id')
            ->leftJoin('books', 'book_id', '=', 'books.id')
                ->where('world_terms.name', 'like', '%' . $keyword . '%')
                ->orWhere('world_term_types.name', 'like', '%' . $keyword . '%')
                ->orWhere('planets.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}