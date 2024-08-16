<?php

namespace App\Services;

use App\Repositories\MemberRepositoryInterface;

class MemberServices
{
    public function __construct(
        protected MemberRepositoryInterface $memberRepository
    ) {
    }

    public function create(array $data)
    {
        return $this->memberRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->memberRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->memberRepository->delete($id);
    }

    public function all()
    {
        return $this->memberRepository->all();
    }

    public function find($id)
    {
        return $this->memberRepository->find($id);
    }
}
