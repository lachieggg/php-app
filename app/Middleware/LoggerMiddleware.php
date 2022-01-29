<?php

namespace LoginApp\Middleware;

class LoggerMiddleware extends Middleware {
  /**
   * @param $request
   * @param $response
   * @param $next
   */
  public function __invoke($request, $response, $next) {    
    $this->container->logger->info('request');
    $this->container->logger->info($request->getUri());
        
    $this->container->logger->info('response');
    $this->container->logger->info($response->getStatusCode());

    return $next($request, $response);
  }
}
