<?php
use Migrations\AbstractMigration;

class AddIdUserToReservations extends AbstractMigration
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
        $table->addColumn('idUser', 'uuid', [
            'default' => null,
            'null' => false,
            'after' => 'idRoom'
        ]);
        $table->update();
    }
}
