<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;
use App\Utils\JsonWebToken;
use App\Utils\Funciones;


class UsersController{
 
    public function add(Request $request, Response $response, $args)
    {   
        $arrDatos = $request->getParsedBody();
        $user = new User();
        $user->email = $arrDatos['email'];
        $user->clave = $arrDatos['password'];
      
        $rta = json_encode(array("ok" => $user->save()));

        $response->getBody()->write($rta);

        return $response;
    }
    public function login(Request $request, Response $response, $args)
    {   
        $retorno="Usuario Inexistente";
        $arrDatos = $request->getParsedBody();
        $lista = User::all();
        $objeto = Funciones::FilterDos($lista,"email",$arrDatos['email'],"clave",$arrDatos['password']);
        if($objeto != false)
        { 
             $retorno = JsonWebToken::obtenerJWT($objeto);
            
        }
        
         $response->getBody()->write($retorno);
       // $response->getBody()->write($rta);

        return $response;
    }

}