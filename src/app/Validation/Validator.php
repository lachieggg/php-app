<?php

namespace LoginApp\Validation;

use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{
  protected $errors;

  public function validate($request, array $rules)
  {
    foreach ($rules as $field => $rule) {
      try {
        $rule->setName(ucfirst($field))->assert($request->getParam($field));
      } catch (NestedValidationException $e) {
        $this->errors[$field] = $e->getMessages();
      }
    }

    // add the errors to the global _SESSION variable
    $_SESSION['errors'] = $this->errors;

    return $this;
  }

  // TODO
  public function passwordValidate($first, $second) {
    if($first !== $second) {
      return new NestedValidationException('Passwords are different');
    }
  }

  public function failed()
  {
    return !empty($this->errors);
  }

}
