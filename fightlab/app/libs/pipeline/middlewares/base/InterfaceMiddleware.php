<?php

namespace app\libs\pipeline\middlewares\base;

use app\libs\http\Request;
use app\libs\http\Response;

/**
 * Descripción de MiddlewareInterface
 *
 * @author Ing. Jose Rasjido
 */

interface InterfaceMiddleware {
    
    /**
     * Procesa una petición del cliente
     * @param Request $request
     */
    public function process(Request $request, Response $response): void;

    /**
     * Setea el siguiente middleware, dentro de la cadena de responsabilidad.
     * @param InterfaceMiddleware $middleware Próximo middleware en la cadena.
     * @return void
     */
    public function setNext(InterfaceMiddleware $middleware): void;

    /**
     * Invoca (procesa) el siguiente middleware, en la cadena de responsabilidad.
     * @param Request $request Petición HTTP.
     * @return void
     */
    public function processNext(Request $request, Response $response): void;
    
}
