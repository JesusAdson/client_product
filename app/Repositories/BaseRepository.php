<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return all data paginated.
     * @return LengthAwarePaginator
     */
    public function listAllPaginated(): LengthAwarePaginator
    {
        return $this
            ->model
            ->query()
            ->orderBy('name', 'asc')
            ->paginate(20);
    }
   
    /**
     * It inserts a new register into database
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model
            ->query()
            ->create($data);
    }

    /**
     * @param integer $id
     * @return Model
     */
    public function getById(int $id): Model
    {
        return $this->model
            ->query()
            ->findOrFail($id);
    }

    /**
     * Returns a specific information with its relations
     *
     * @param integer $id
     * @param array $relationships
     * @return Model
     */
    public function getByIdWithRelationships(int $id, array $relationships = []): ?Model
    {
        return $this->model
            ->query()
            ->with($relationships)
            ->where('id', $id)
            ->first();
    }

    /**
     * @param integer $id
     * @param array $data
     * @return boolean|null
     */
    public function update(int $id, array $data): ?bool
    {
        return $this->model
            ->query()
            ->where('id', $id)
            ->update($data);
    }

    /**
     * @param integer $id
     * @return boolean|null
     */
    public function delete(int $id): ?bool
    {
        return $this->getById($id)->delete();
    }
    
    /**
     * @param string $name
     * @return LengthAwarePaginator|null
     */
    public function getByName(string $name): ?LengthAwarePaginator
    {
        return $this->model
            ->query()
            ->where('name', 'LIKE', "%{$name}%")
            ->paginate(20);
    }
}