<?php

namespace App\Queries\GridQueries;

use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class ClosedContactQuery implements DataQuery
{
    public function data($column, $direction)
    {
        $rows = DB::table('contacts')
            ->select('contacts.id as Id',
                'contacts.message as Message',
                'contacts.contact_topic_id as Topic',
                'contacts.status_id as Status',
                'contact_topics.name as Topic',
                'users.email as Email',
                DB::raw('DATE_FORMAT(contacts.created_at,
                                 "%m-%d-%Y") as Created'))
            ->leftJoin('contact_topics', 'contact_topic_id', '=', 'contact_topics.id')
            ->leftJoin('users', 'user_id', '=', 'users.id')
            ->where('contacts.status_id', 0)
            ->orderBy($column, $direction)
            ->paginate(5);

        return $rows;

    }

    public function filteredData($column, $direction, $keyword)
    {
        $rows = DB::table('contacts')
            ->select('contacts.id as Id',
                'contacts.message as Message',
                'contacts.contact_topic_id as Topic',
                'contacts.status_id as Status',
                'contact_topics.name as Topic',
                'users.email as Email',
                DB::raw('DATE_FORMAT(contacts.created_at,
                                 "%m-%d-%Y") as Created'))
            ->leftJoin('contact_topics', 'contact_topic_id', '=', 'contact_topics.id')
            ->leftJoin('users', 'user_id', '=', 'users.id')
            ->where('contacts.status_id', 0)
            ->where('users.email', 'like', '%' . $keyword . '%')
            ->orWhere('contacts.message', 'like', '%' . $keyword . '%')
            ->orWhere('contact_topics.name', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(5);

        return $rows;

    }
}