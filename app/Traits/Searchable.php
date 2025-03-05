<?php

namespace App\Traits;

trait Searchable {
    function search($query, array $SearchableFields) {
        return $query->where(function($subquery) use($SearchableFields) {
            foreach ($SearchableFields as $field) {
                $subquery->orWhere($field, 'like', "%". request('search') ."%");
            }
        });
    }
}

