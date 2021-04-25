<?php

namespace App\Repositories;

use App\EnterpriseMembership;
use Illuminate\Support\Facades\DB;

class EnterpriseMembershipRepository
{
    public function createUpdate($data)
    {
        $id = isset($data["id"]) ? $data["id"] : null;
        $model = EnterpriseMembership::updateOrCreate(['id' => $id], $data);

        return $model;
    }
    
    public function find($id, $select = '*', $with = [])
    {
        return EnterpriseMembership::whereId($id)
                    ->select($select)
                    ->with($with)
                    ->first();
    }

    public function delete($id)
    {
        return EnterpriseMembership::destroy($id);
    }
}
