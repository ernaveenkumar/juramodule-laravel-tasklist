<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];

//http://127.0.0.1:8000/

Route::get('/', function () {

    return view('index',[
        //'tasks' => \App\Models\Task::all()   define at top like this use App\Models\Task; then we can use it like this Task
        //'tasks' => Task::latest()->where('completed',true)->get()
        'tasks' => Task::latest()->paginate()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create'); //display the form

Route::get('/tasks/{task}/edit', function(Task $task){

        return view(
            'edit',
            //data:['task'=> Task::findOrFail($id)]
            ['task' => $task]
        );
})->name('tasks.edit');


Route::get('/tasks/{task}', function(Task $task) {

    return view('show',['task' => $task]);
})->name('tasks.show');


Route::post('/tasks', function(Task $task, TaskRequest $request){
    //Route::post('/task', function(Request $request){

    //after using TaskRequest . To access the data
    $data = $request->validated();
    //dd($data);
    //dd($request->all());

    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required'

    // ]);

    // $task = new Task;

    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->completed = 0;
    // $task->save();

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show',['task' => $task->id ])-> with('success','Task created successfuly');

})->name('tasks.store'); //On submit the form for new data

//edit form will send data on this url
// When using task request replace Request with TaskRequest
//Route::put('tasks/{id}', function($id, Request $request){
Route::put('/tasks/{task}', function(Task $task, TaskRequest $request){
    //var_dump($request);
     //after using TaskRequest . To access the data
     //and pass it directly to create method

     //$data = $request->validated();

     //validate the data. Now validating data with TaskRequest file
    //php artisan make:request TaskRequest

    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required'
    // ]);

    // $task = Task::findOrFail($id);
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    //after using TaskRequest we can use Create method to save returned data from TaskRequest
    //
    //to use update we have to set the fillable properties
    $task->update( $request->validated());

    //redirect it
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')->with('sucess','Task deleted');
})->name('tasks.destroy');
// Route::get('/xxx', function(){
//     return 'Hello';
// })->name('hello');

// Route::get('/greet/{name}', function($name){
//     return "Hello {$name}";
// });

// Route::get('hallo', function(){
//     return redirect()->route('hello');
// });



Route::put('tasks/{task}/toggle-complete', function (Task $task){

    // $task->completed = !$task->completed;
    // $task->save();
    $task->toggleCompleted();

    return redirect()->back()->with('success', 'Task updatd');
})->name('tasks.toggle-complete');

Route::fallback(function(){
    return 'Still got somewhere';
});
