<?php
require 'TestClass.php';

use someNamespaceA\NamespacedClass;

class CommandNameTranslatorTest {
    protected CommandNameTranslatorTest $commandNameTranslator;

    public function setUp()
    {
        $this->commandNameTranslator = new CommandNameTranslatorTest();
    }


    function it_translates_a_command_name_to_its_validator_counterpart()
    {
        $validatorName = $this->commandNameTranslator->validatorName('TaskAchievedCommand');
        $this->assertEquals('TaskAchievedValidator', $validatorName);
    }


}
