<?php

namespace LoginApp\Middleware;

class LoggerMiddleware extends Middleware {
  /**
   * @param $request
   * @param $response
   * @param $next
   */
  public function __invoke($request, $response, $next) {
        $this->container->logger->info($response);

        return $next($request, $response);
  }
}
