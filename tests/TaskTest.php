<?php
class TaskTest extends TestCase
{

    public function testSomethingIsTrue()
    {
        $this->assertTrue(true);
    }

    /**
     * /tasks [GET]
     */

//    public function testShouldReturnAllProducts(){
//        $this->get("tasks", []);
//
//        $this->seeStatusCode(200);
//        $this->seeJsonStructure([
//            'data' => ['*' =>
//                [
//                    'task',
//                    'task_description',
//                    'created_at',
//                    'updated_at',
////                    'links'
//                ]
//            ],
////            'meta' => [
////                '*' => [
////                    'total',
////                    'count',
////                    'per_page',
////                    'current_page',
////                    'total_pages',
////                    'links',
////                ]
////            ]
//        ]);
//
//    }
//    /**
//     * /tasks/id [GET]
//     */
//    public function testShouldReturnProduct(){
//        $this->get("tasks/2", []);
//        $this->seeStatusCode(200);
//        $this->seeJsonStructure(
//            ['data' =>
//                [
//                    'task',
//                    'task_description',
//                    'created_at',
//                    'updated_at',
//  //                  'links'
//                ]
//            ]
//        );
//
//    }
//    /**
//     * /tasks [POST]
//     */
//    public function testShouldCreateProduct(){
//        $parameters = [
//            'task' => 'task_test',
//            'task_description' => 'tast_description',
//        ];
//        $this->post("tasks", $parameters, []);
//        $this->seeStatusCode(200);
//        $this->seeJsonStructure(
//            ['data' =>
//                [
//                    'task',
//                    'task_description',
//                    'created_at',
//                    'updated_at',
////                    'links'
//                ]
//            ]
//        );
//
//    }
//
//    /**
//     * /tasks/id [PUT]
//     */
//    public function testShouldUpdateProduct(){
//        $parameters = [
//            'task' => 'test_task_updated',
//            'task_description' => 'test_description_updated',
//        ];
//        $this->put("tasks/4", $parameters, []);
//        $this->seeStatusCode(200);
//        $this->seeJsonStructure(
//            ['data' =>
//                [
//                    'task',
//                    'task_description',
//                    'created_at',
//                    'updated_at',
//   //                 'links'
//                ]
//            ]
//        );
//    }
//    /**
//     * /tasks/id [DELETE]
//     */
//    public function testShouldDeleteProduct(){
//
//        $this->delete("tasks/5", [], []);
//        $this->seeStatusCode(410);
//        $this->seeJsonStructure([
//            'status',
//            'message'
//        ]);
//    }
}
