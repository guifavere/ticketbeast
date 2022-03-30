<?php

use App\RandomOrderConfirmationNumberGenerator;

class RandomOrderConfirmationNumberGeneratorTest extends TestCase
{
    /** @test */
    function must_be_24_characters_long()
    {
        $generator = new RandomOrderConfirmationNumberGenerator();

        $confirmationNumber = $generator->generate();

        $this->assertEquals(24, strlen($confirmationNumber));
    }

    /** @test */
    function can_only_contain_uppercase_letters_and_numbers()
    {
        $generator = new RandomOrderConfirmationNumberGenerator();

        $confirmationNumber = $generator->generate();

        $this->assertRegExp('/^[A-Z0-9]+$/', $confirmationNumber);
    }

    /** @test */
    function cannot_contain_ambiguous_characters()
    {
        $generator = new RandomOrderConfirmationNumberGenerator();

        $confirmationNumber = $generator->generate();

        $this->assertFalse(strpos($confirmationNumber, '1'));
        $this->assertFalse(strpos($confirmationNumber, 'I'));
        $this->assertFalse(strpos($confirmationNumber, '0'));
        $this->assertFalse(strpos($confirmationNumber, 'O'));
    }
}
