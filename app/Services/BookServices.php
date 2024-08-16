<?php

namespace App\Services;

use App\Repositories\BookRepositoryInterface;

class BookServices
{
    public function __construct(
        protected BookRepositoryInterface $bookRepository
    ) {
    }

    public function create(array $data)
    {
        return $this->bookRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->bookRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->bookRepository->delete($id);
    }

    public function all()
    {
        return $this->bookRepository->all();
    }

    public function find($id)
    {
        return $this->bookRepository->find($id);
    }
}
