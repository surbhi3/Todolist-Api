<?php
namespace App\Transformers;
use App\Task;
use League\Fractal;
class TaskTransformer extends Fractal\TransformerAbstract
{
    public function transform(Task $Task)
    {
        return [
            'id'      => (int) $Task->id,
            'task'   => $Task->task,
            'task_description'    =>  $Task->task_description,
            'created_at'    =>  $Task->created_at->format('d-m-Y'),
            'updated_at'    =>  $Task->updated_at->format('d-m-Y'),
            'links'   => [
                [
                    'uri' => 'tasks/'.$Task->id,
                ]
            ],
        ];
    }
}
