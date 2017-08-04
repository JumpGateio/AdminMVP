<?php

namespace App\Providers\Search;

use Illuminate\Support\Facades\DB;
use JumpGate\Database\Searching\Providers\Search;

class User extends Search
{
    public function name($value)
    {
        if (! $this->verify('name', $value)) {
            return true;
        }

        $this->search = $this->search->whereHas('details', function ($query) use ($value) {
            $query->where(function ($subQuery) use ($value) {
                $raw = DB::raw('CONCAT_WS(
                    \'\',
                    IF(first_name IS NULL, \'\', CONCAT(LOWER(first_name), \' \')),
                    IF(middle_name IS NULL, \'\', CONCAT(LOWER(middle_name), \' \')),
                    IF(last_name IS NULL, \'\', LOWER(last_name))
                )');

                $subQuery->where($raw, 'LIKE', '%' . strtolower($value) .'%')
                    ->orWhere(DB::raw('LOWER(display_name)'), 'LIKE', '%' . strtolower($value) .'%');
            });
        });
    }
}
