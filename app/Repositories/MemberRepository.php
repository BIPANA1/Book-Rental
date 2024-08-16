<?php

namespace App\Repositories;
use App\Models\Members;


class MemberRepository implements MemberRepositoryInterface
{
    public function all()
    {
        return Members::all();
    }

    public function create(array $data)
    {
        return Members::create($data);
    }

    public function update(array $data, $id)
    {
        $member = Members::findOrFail($id);
        $member->update($data);
        return $member;
    }

    public function delete($id)
    {
        $member = Members::findOrFail($id);
        $member->delete();
    }

    public function find($id)
    {
        return Members::findOrFail($id);
    }
}
