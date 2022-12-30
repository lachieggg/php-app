<?php

namespace LoginApp\Middleware;

class CsrfViewMiddleware extends CustomMiddleware {
  /**
   * @param $request
   * @param $response
   * @param $next
   */
   public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    $this->container->view->getEnvironment()->addGlobal('csrf', [
      'field' => '
        <input id="csrf-token-name-elem"  type="hidden" name="' . $this->container->csrf->getTokenNameKey() . '" value="' . $this->container->csrf->getTokenName() . '">
        <input id="csrf-token-value-elem" type="hidden" name="' . $this->container->csrf->getTokenValueKey() . '" value="' . $this->container->csrf->getTokenValue() . '">
      ',
      'tokenNameKey' => $this->container->csrf->getTokenNameKey(),
      'tokenName' => $this->container->csrf->getTokenName(),
      'tokenValueKey' => $this->container->csrf->getTokenValueKey(),
      'tokenValue' => $this->container->csrf->getTokenValue()
    ]);

    $handler->handle($request)  
  }
}
