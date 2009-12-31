<?php
class Clan extends ActiveTable
{
	protected $table_name = 'clan';
    protected $primary_key = 'clan_id';

} // end Clan

class Clanj extends ActiveTable
{
	protected $table_name = 'clan_join';
    protected $primary_key = 'clan_id_id';

} // end Clan
class Clandonate extends ActiveTable
{
	protected $table_name = 'clan_donate_history';
    protected $primary_key = 'id';

} // end Clan
?>
