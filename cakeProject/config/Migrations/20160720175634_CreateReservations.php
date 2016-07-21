<?php
use Migrations\AbstractMigration;

class CreateReservations extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('reservations', ['id' => false, 'primary_key' => ['id'], 'engine' => 'InnoDB']);
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('idRoom', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('checkinDate', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('nights', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
