<?php

use ObjectId\ObjectId;
use PHPUnit\Framework\TestCase;

class ObjectIdTest extends TestCase {
    public function testObjectId()
    {
        $objectId = ObjectId::generate();
        
        $this->assertIsString($objectId);
        $this->assertEquals(24, strlen($objectId));
    }
}