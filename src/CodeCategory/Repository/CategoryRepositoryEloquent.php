<?php


namespace CodePress\CodeCategory\Repository;


use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeCategory\Models\Category;

class CategoryRepositoryEloquent extends AbstractRepository implements CategoryRepositoryInterface
{
    public function model()
    {
        return Category::class;
    }
}