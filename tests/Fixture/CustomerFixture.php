<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomerFixture
 */
class CustomerFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'customer';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'LastName' => 'Lorem ipsum dolor sit amet',
                'FirstName' => 'Lorem ipsum dolor sit amet',
                'Address' => 'Lorem ipsum dolor sit amet',
                'City' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
