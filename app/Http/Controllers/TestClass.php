<?php
class CommandNameTranslator {
 public function toValidatorName($commandName)
 {
     if ($commandName == 'foobar')
     {
         return 'baz';
     }

     return str_replace('Command', 'Validator', $commandName);
 }
}
