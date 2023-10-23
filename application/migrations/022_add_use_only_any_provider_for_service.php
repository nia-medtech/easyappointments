<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.4.4
 * ---------------------------------------------------------------------------- */

/**
 * Class Migration_Modify_sync_period_columns
 *
 * @property CI_DB_query_builder $db
 * @property CI_DB_forge $dbforge
 */
class Migration_Add_use_only_any_provider_for_service extends CI_Migration {
    
    /**
     * Upgrade method.
     */
    public function up()
    {
        if ( ! $this->db->field_exists('provider_assignment_type', 'services'))
        {         
            $fields = [
                'provider_assignment_type' => [
                    'type' => 'VARCHAR',
                    'constraint' => '256',
                ]
            ];

            $this->dbforge->add_column('services', $fields);
        }
    }



    /**
     * Downgrade method.
     */
    public function down()
    {
        if ($this->db->field_exists('provider_assignment_type', 'services'))
        {
            $this->dbforge->drop_column('services', 'provider_assignment_type');
        }
    }
}
