<?php
namespace GetThingsDone\Account\Tests;

class ConfigTest extends TestCase
{
    /** @test */
    public function it_should_use_connection_from_package_config()
    {
        $this->assertEquals(
            config('account.database_connection'),
            config('database.connections.account')
        );
    }
}
