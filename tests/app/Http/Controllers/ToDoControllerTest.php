<?php
namespace Tests\App\Http\Controllers;
use App\Http\Controllers\TodoController;
use App\ToDo;
use TestCase;
use Illuminate\Database\Schema;
/**
 * Created by PhpStorm.
 * User: papa
 * Date: 27-06-2018
 * Time: 19:06
 */

class ToDoControllerTest extends TestCase
{
        public function test_ToDoController_Add_Validates_Invalid_Request()
    {
        $response = $this->call('POST', '/api/add/2', ['task' => 'my first task']);

        $this->assertEquals(
            422, $response->getStatusCode()
        );

        $this->assertEquals(
            '{"description":["The description field is required."]}', $response->getContent()
        );
    }

//    public function test_ToDoController_Add_Validates_the_entered_data()
//    {
//        ToDo::fake();
//        $response = $this->call('POST', '/api/add/2', ['task' => 'my first task', 'description' => 'description_test']);
//
//        $this->assertEquals(
//            '{"task":"my first task","description":"description_test","updated_at":"2018-06-29 06:14:23","created_at":"2018-06-29 06:14:23","id":2}', $response->getContent()
//        );
//    }

//    public function test_ToDoController_delete_Validates_if_data_deleted()
//    {
//        $data=['id' => '1' , 'task'=> 'task1' , 'description' => 'description1'];
//
//        $table= 'todo';
//        //$this->assertSoftDeleted($table,$data);
//
//        $this->assertSoftDeleted('users', [
//            'id' => 1,
//            'name' => 'task1',
//            'email' => 'description1',
//        ]);
////        $response = $this->call('DELETE', '/api/delete/1');
//
////        $this->assertEquals(
////            200, $response->getStatusCode()
///     );
//    }
}