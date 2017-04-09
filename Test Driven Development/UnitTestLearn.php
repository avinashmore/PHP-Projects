<?php
use PHPUnit\Framework\TestCase;
/**
* 
*/
class UnitTestLearn extends TestCase
{
	
	#methods whose name start with ‘test’ are executed, one at a time, on a different instance of this Test Case 

	public function testArray()
	{
		
		# use methods that start with assert to execute compare the expected and actual value. 
		# first argument to these methods is expected result and second argument is actual result
		$sum = array_sum(array());
		
		# fail will fail the next test case
		#$this->fail($message = '');
		$this->assertEquals(0,$sum);

		# you can skip test using markTestSkipped
		#$this->markTestSkipped();
		#$this->assertEquals(1,2);

		#check if the array contains the subset
		$this->assertArraySubset(['a' => ['1']], ['a' => ['1', '2']]);

		#checks if the associative array has the key 
		$this->assertArrayHasKey('a', ['a' => 1]);

		# checks if the value is contained in the array
		$this->assertContains(4, [1, 2, 3]);

		#checks if the count is equal to the number of elements in the haystack
		$this->assertCount(0, ['foo']);


	}


	function testMoreAsserts(){
		#check value and type both are same or not
		$this->assertSame(42, (int) "42");

		#check if the value is true or not
        $this->assertTrue(true);
        
        #check if the value is false or not
        $this->assertFalse(false);
        
        #check if the value is empty or not
		$this->assertEmpty('');

		#checks if the value is null or not
        $this->assertNull(null);

        #checks if the value is null or not
        $this->assertNotNull(42);

        #checks if the type is same or not
        $this->assertInternalType("string", "hello, world");

        # checks if actual value is less than the expected value 
        # this assertion will not fail
        $this->assertLessThan(1, 0);

        # checks if  actual value is less than or equal to the expected value 
        # this assertion will fail
        $this->assertLessThanOrEqual(0, -1);

        # checks if the value is not a number
        $this->assertNan(1);

        # check if the value is infinite
        $this->assertInfinite(1);

	}

	public function testFile()
	{	
		#check if the file exists
		$this->assertFileExists('composer.json');

		#checks if the file or provided is readable or not
		$this->assertIsReadable('composer.json');

		#check if the file or path provided is writable or not
		$this->assertIsWritable('composer.json');

		#checks if the directory exists
		$this->assertDirectoryExists('vendor');

		#checks if the directory is readable
		$this->assertDirectoryIsReadable('vendor');

		#checks if the directory is writable
		$this->assertDirectoryIsWritable('vendor');

	}

	public function testJSON()
	{
		# checks if the two json files are equal or not
		$this->assertJsonFileEqualsJsonFile(
          'composer.json', 'composer1.json');

		#checks if the JSON strings match or not
		$this->assertJsonStringEqualsJsonString(
            json_encode(['Mascot' => 'Tux']),
            json_encode(['Mascot' => 'ux'])
        );
	}

	public function testXML(){
		# checks if the two xml files are equal
		$this->assertXmlFileEqualsXmlFile('test1.xml', 'test2.xml');

		# checks if the xml string is equal to the string equivalent of the string
		$this->assertXmlStringEqualsXmlFile('test3.xml', '<first><inner/></first>');

		# checks if the two xml strings are equivalent
		$this->assertXmlStringEqualsXmlString('<foo><bar/></foo>', '<foo><bar/></foo>');
	}

	public function testString(){
		# checks if the string(needle) contained in the string(haystack)
		$this->assertContains("test", "this is a test string" );

		# checks if the strint(needle) in the string(haystack) with $ignoreCase
		$this->assertContains('foo', 'FooBar', '', true);

		# checks if the string(needle) type is the only type in the string(haystack)
		$this->assertContainsOnly('string', ['1', '2', 3]);
	}



}


?>