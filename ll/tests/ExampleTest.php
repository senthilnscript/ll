<?php

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
	 
	 /** php unit test for DB test ***/
	public function testDatabase()
	{
		// Make call to application...
	
		$this->seeInDatabase('subject', ['name' => 'Maths']);
		$this->seeInDatabase('class', ['name' => 'I']);
		$this->seeInDatabase('student', ['name' => 'student 1']);
		$this->seeInDatabase('mark', ['student_id' => '2','subject_id' => '2']);
	}
}
