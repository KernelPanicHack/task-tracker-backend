<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0",
 *      title="Test"
 * )
 *
 * @OA\Components(
 *     @OA\SecurityScheme(
 *         securityScheme="bearerAuth",
 *         type="http",
 *         scheme="bearer"
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/register",
 *     summary="Регистрация",
 *     tags={"Auth"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="Krirll") ,
 *                     @OA\Property(property="email", type="string", example="example@mail.ru") ,
 *                     @OA\Property(property="password", type="string", example="12345678") ,
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="send massage about email verification",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Email verification send")
 *         ),
 *     ),
 *     @OA\Response(
 *          response=422,
 *          description="send data verification err",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="The email has already been taken"),
 *              @OA\Property(property="errors", type="object",
 *                  @OA\Property(property="name", type="array",
 *                      @OA\Items( type="string", example="The name field is required"),
 *                  ),
 *                  @OA\Property (property="email", type="array",
 *                      @OA\Items( type="string", example="The email has already been taken."),
 *                  ),
 *                  @OA\Property (property="password", type="array",
 *                      @OA\Items( type="string", example="The password field must be at least 8 characters"),
 *                  ),
 *              )
 *          )
 *     )
 * )
 * @OA\Post(
 *     path="/api/login",
 *     summary="Вход",
 *     tags={"Auth"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="email", type="string", example="yakuta2004@mail.ru"),
 *                     @OA\Property(property="password", type="string", example="123456789"),
 *                 )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="send user data and token",
 *         @OA\JsonContent(
 *             @OA\Property (property="user", type="object",
 *                 @OA\Property (property="id", type="int", example="1"),
 *                 @OA\Property (property="name", type="string", example="Kirill"),
 *                 @OA\Property (property="email", type="string", example="yakuta2004@mail.ru"),
 *             ),
 *             @OA\Property (property="token", type="string", example="18|8j0B0dKIuqanPY0hrgvfEo6idVAyw41me11Coyp922b7304b")
 *         )
 *     ),
 *     @OA\Response(
 *           response=422,
 *           description="send data verification err",
 *           @OA\JsonContent(
 *               @OA\Property(property="message", type="string", example="The email field is required. (and 1 more error)"),
 *               @OA\Property(property="errors", type="object",
 *                   @OA\Property (property="email", type="array",
 *                       @OA\Items( type="string", example="The email field is required."),
 *                   ),
 *                   @OA\Property (property="password", type="array",
 *                       @OA\Items( type="string", example="The password field is required."),
 *                   ),
 *               )
 *           )
 *      ),
 *     @OA\Response(
 *         response = 401,
 *         description="user dont registred",
 *         @OA\JsonContent(
 *             @OA\Property (property="message", type="string", example="Invalid credentials")
 *         )
 *     )
 * )
 * @OA\Post(
 *      path="/api/email/resend",
 *      summary="Отправить подтверждение почты еще раз",
 *      tags={"Auth"},
 *
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="email", type="string", example="yakuta2004@mail.ru")
 *                  )
 *              }
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="email sent",
 *          @OA\JsonContent(
 *              @OA\Property(property="email", type="string", example="Verification email resent")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="send data err",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Email already verified")
 *          )
 *      )
 *  )
 *
 * @OA\Get(
 *     path="/api/logout",
 *     summary="Выход",
 *     tags={"Auth"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="remove auth token",
 *         @OA\JsonContent(
 *             @OA\Property (property="message", type="string", example="Token removed successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="fake bearer token",
 *         @OA\JsonContent(
 *             @OA\Property (property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 *
 *
 */

class AuthController extends Controller
{

}
