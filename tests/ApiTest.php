<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\ToDo;
use App\User;
class ApiTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
//    public function testSomethingIsTrue()
//    {
//        $this->assertTrue(true);
//    }

    public function testApplication()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals("Lumen (5.5.2) (Laravel Components 5.5.*)",$response->getContent());
        $this->assertEquals(200, $response->status());
    }


//    public function test_task_deletion()
//    {
//        $response = $this->call('DELETE', 'api/delete/{3}');
//
//        $this->assertEquals(200, $response->status());
//    }

//    public function test_task_creation()
//    {
//        //$user=factory(App\User::class)->create();
//
////        $user =  User :: find(1);
////        ToDo::create(['task_test', 'testdesc'], 1);
//
////        $found_book = ToDo::find(1);
////
////        $this->assertEquals($found_book->task, 'task_test');
////        $this->assertEquals($found_book->description, 'testdesc');
//
//        $this->seeInDatabase('todolist.todo', ['id' => 1 , 'user_id' => '3', 'task'=> 'task_test', 'description' => 'testdesc']);
//    }
}
