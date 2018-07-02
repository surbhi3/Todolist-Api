<?php
namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Transformers\TaskTransformer;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    /**
     * GET /products
     *
     * @return array
     */
    public function index(){
        $paginator = Task::paginate();
        $tasks = $paginator->getCollection();
        $resource = new Collection($tasks, new TaskTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        return $this->fractal->createData($resource)->toArray();
    }

    public function show($id){
        $tasks = Task::find($id);
        $resource = new Item($tasks, new TaskTransformer);
        return $this->fractal->createData($resource)->toArray();
    }

    public function store(Request $request){
        //validate request parameters
        $this->validate($request, [
            'task' => 'bail|required',
            'task_description' => 'bail|required',
        ]);
        $tasks = Task::create($request->all());
        $resource = new Item($tasks, new TaskTransformer);
        return $this->fractal->createData($resource)->toArray();
    }

    public function update($id, Request $request){
        //validate request parameters
        $this->validate($request, [
            'task' => 'max:255',
        ]);
        //Return error 404 response if product was not found
        if(!Task::find($id)) return $this->errorResponse('task not given!', 404);
        $task = Task::find($id)->update($request->all());
        if($task){
            //return updated data
            $resource = new Item(Task::find($id), new TaskTransformer);
            return $this->fractal->createData($resource)->toArray();
        }
        //Return error 400 response if updated was not successful
        return $this->errorResponse('Failed to update product!', 400);
    }

    public function destroy($id){

        //Return error 404 response if product was not found
        if(!Task::find($id)) return $this->errorResponse('Task not found!', 404);
        //Return 410(done) success response if delete was successful
        if(Task::find($id)->delete()){
            return $this->customResponse('Task deleted successfully!', 410);
        }
        //Return error 400 response if delete was not successful
        return $this->errorResponse('Failed to delete Task!', 400);
    }

    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }
}
?>