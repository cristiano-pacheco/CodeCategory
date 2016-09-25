<?php


namespace CodePress\CodeCategory\Controllers;


use CodePress\CodeCategory\Repository\CategoryRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    private $repository;
    private $response;

    public function __construct(ResponseFactory $response, CategoryRepositoryInterface $repository)
    {
        $this->response = $response;
        $this->repository = $repository;
    }

    public function index()
    {
        $categories = $this->repository->all();
        return $this->response->view('codecategory::index', compact('categories'));
    }

    public function create()
    {
        $categories = [];
        $categories = $this->repository->all();
        return $this->response->view('codecategory::create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $categories = $this->repository->all();
        $category = $this->repository->find($id);
        return $this->response->view('codecategory::edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        unset($data['_token']);

        if (!isset($data['active'])) {
            $data['active'] = 0;
        }

        $this->repository->update($data, $id);
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.categories.index');
    }
}