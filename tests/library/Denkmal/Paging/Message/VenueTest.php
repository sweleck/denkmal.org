<?php

class Denkmal_Paging_Message_VenueTest extends CMTest_TestCase {

    public function tearDown() {
        CMTest_TH::clearEnv();
    }

    public function testGetItems() {
        $venue1 = Denkmal_Model_Venue::create('Example 1', true, false);
        $venue2 = Denkmal_Model_Venue::create('Example 2', true, false);

        $message1 = Denkmal_Model_Message::create($venue1, 'client', 'Foo 1');
        $message2 = Denkmal_Model_Message::create($venue1, 'client', 'Foo 2');
        $message3 = Denkmal_Model_Message::create($venue2, 'client', 'Foo 3');

        $paging = new Denkmal_Paging_Message_Venue($venue1);
        $this->assertEquals(array($message1, $message2), $paging->getItems());

        $message4 = Denkmal_Model_Message::create($venue1, 'client', 'Foo 4');
        $paging = new Denkmal_Paging_Message_Venue($venue1);
        $this->assertEquals(array($message1, $message2, $message4), $paging->getItems());

        $message2->delete();
        $paging = new Denkmal_Paging_Message_Venue($venue1);
        $this->assertEquals(array($message1, $message4), $paging->getItems());
    }

    public function testGetItemsChangeVenue() {
        $venue1 = Denkmal_Model_Venue::create('Example 1', true, false);
        $venue2 = Denkmal_Model_Venue::create('Example 2', true, false);

        $message1 = Denkmal_Model_Message::create($venue1, 'client', 'Foo 1');

        $this->assertEquals(array($message1), new Denkmal_Paging_Message_Venue($venue1));
        $this->assertEquals(array(), new Denkmal_Paging_Message_Venue($venue2));

        $message1->setVenue($venue2);

        $this->assertEquals(array(), new Denkmal_Paging_Message_Venue($venue1));
        $this->assertEquals(array($message1), new Denkmal_Paging_Message_Venue($venue2));
    }
}
