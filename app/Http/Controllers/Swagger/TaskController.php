<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Get (
 *      path="/api/tasks",
 *      summary="Все задачи",
 *      tags={"Task"},
 *
 *      @OA\Response(
 *          response=200,
 *          description="send all tasks",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="int", example="1"),
 *              @OA\Property(property="title", type="string", example="обновить код"),
 *              @OA\Property(property="task_body", type="string", example="Обновить исходный код"),
 *              @OA\Property(property="task_state", type="object",
 *                  @OA\Property(property="id", type="int", example="1"),
 *                  @OA\Property(property="name", type="string", example="Бэклог"),
 *              ),
 *              @OA\Property(property="users", type="object",
 *                  @OA\Property(property="id", type="int", example="1"),
 *                  @OA\Property(property="name", type="string", example="Кирилл"),
 *                  @OA\Property(property="email", type="string", example="example@mail.ru"),
 *                  @OA\Property(property="surname", type="string", example="Васин"),
 *                  @OA\Property(property="patronymic", type="string", example="Васильевич"),
 *                  @OA\Property(property="specialization", type="string", example="backend"),
 *                  @OA\Property(property="login", type="string", example="login"),
 *              ),
 *
 *          ),
 *      ),
 *  )
 *
 * @OA\Get (
 * *       path="/api/tasks/1",
 * *       summary="Конкретная задача",
 * *       tags={"Task"},
 * *
 * *       @OA\Response(
 * *           response=200,
 * *           description="show one task",
 * *           @OA\JsonContent(
 * *               @OA\Property(property="id", type="integer", example=1),
 * *               @OA\Property(property="title", type="string", example="обновить код"),
 * *               @OA\Property(property="task_body", type="string", example="Обновить исходный код"),
 * *
 * *               @OA\Property(property="comments", type="array",
 * *                   @OA\Items(
 * *                       @OA\Property(property="id", type="integer", example=1),
 * *                       @OA\Property(property="user_id", type="integer", example=1),
 * *                       @OA\Property(property="task_id", type="integer", example=1),
 * *                       @OA\Property(property="text", type="string", example="Текст комментария"),
 * *                       @OA\Property(property="user", type="object",
 * *                           @OA\Property(property="id", type="integer", example=1),
 * *                           @OA\Property(property="name", type="string", example="Кирилл"),
 * *                           @OA\Property(property="email", type="string", example="example@email.ru"),
 * *                           @OA\Property(property="surname", type="string", example="Фамилия"),
 * *                           @OA\Property(property="patronymic", type="string", example="Отчество"),
 * *                           @OA\Property(property="specialization", type="string", example="Backend"),
 * *                           @OA\Property(property="login", type="string", example="login")
 * *                       )
 * *                   )
 * *               )
 * *           )
 * *       )
 * * )
 *
 */



class TaskController extends Controller
{
    //
}
