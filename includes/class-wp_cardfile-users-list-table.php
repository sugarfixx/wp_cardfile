<?php
/**
 * Created by PhpStorm.
 * User: Sugarfixx
 * Date: 29/11/17
 * Time: 23:40
 */

if (!class_exists('WP_List_Table')) {
    require_once (ABSPATH . 'wp-admin/includes/class-wp-list-table.php');

}

class WP_Cardfile_Users_List_Table extends WP_List_Table
{
    public function __construct()
    {
        parent::__construct(array(
            'singular' => 'Bruker',
            'plural' => 'Brukere',
            'ajax' => true,
        ));
    }
    public function get_columns() {
        $columns = [
            'cb' => '<input type="checkbox" />',
            'id' => __('ID', 'ux'),
            'wp_user_id' => __('Wp_User', 'ux'),
            'first_name' => __('Fornavn', 'ux') ,
            'last_name' => __('Etternavn', 'ux') ,
            'address_line_1' => __('Adresse', 'ux') ,
            'city' => __('Sted', 'ux') ,
            'time' => __('Date', 'ux')
        ];
        return $columns;
    }
    public function get_hidden_columns()
    {
        // Setup Hidden columns and return them
        return array();
    }

    public function get_sortable_columns()
    {
        $sortable_columns = array(
            'last_name' => array('last_name',true) ,
            'city' => array('city',false) ,
            'postal_code' => array('postal_code',false) ,
            'time' => array('time',false)
        );
        return $sortable_columns;
    }

    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array(
            $columns,
            $hidden,
            $sortable
        );
        /** Process bulk action */
        $this->process_bulk_action();
        $per_page = $this->get_items_per_page('records_per_page', 10);
        $current_page = $this->get_pagenum();
        $total_items = self::record_count();
        $data = self::get_records($per_page, $current_page);
        $this->set_pagination_args(
            ['total_items' => $total_items, //WE have to calculate the total number of items
             'per_page' => $per_page // WE have to determine how many items to show on a page
            ]);
        $this->items = $data;
    }
    public static function get_records($per_page = 10, $page_number = 1)
    {
        global $wpdb;
        $sql = "select * from wp_cardfile_users";
        if (isset($_REQUEST['s'])) {
            $sql.= ' where column1 LIKE "%' . $_REQUEST['s'] . '%" or column2 LIKE "%' . $_REQUEST['s'] . '%"';
        }
        if (!empty($_REQUEST['orderby'])) {
            $sql.= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql.= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }
        $sql.= " LIMIT $per_page";
        $sql.= ' OFFSET ' . ($page_number - 1) * $per_page;
        $result = $wpdb->get_results($sql, 'ARRAY_A');
        return $result;
    }
    function column_cb($item)
    {
        return sprintf('<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']);
    }

    function column_first_column_name($item)
    {
        return sprintf('<a href="%s" class="btn btn-primary"/>Link Title</a>', $item['first_name']);
    }

    public function get_bulk_actions()
    {
        $actions = ['bulk-delete' => 'Delete'];
        return $actions;
    }
    public function process_bulk_action()
    {
        // Detect when a bulk action is being triggered...
        if ('delete' === $this->current_action()) {
            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr($_REQUEST['_wpnonce']);
            if (!wp_verify_nonce($nonce, 'bx_delete_records')) {
                die('Go get a life script kiddies');
            }
            else {
                self::delete_records(absint($_GET['record']));
                $redirect = admin_url('admin.php?page=wp_cardfile');
                wp_redirect($redirect);
                exit;
            }
        }

        // If the delete bulk action is triggered
        if ((isset($_POST['action']) && $_POST['action'] == 'bulk-delete') ||
            (isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete')) {
            $delete_ids = esc_sql($_POST['bulk-delete']);
            foreach($delete_ids as $id) {
                self::delete_records($id);
            }

            $redirect = admin_url('admin.php?page=wp_cardfile_records');
            wp_redirect($redirect);
            exit;
        }

    }
    public static function delete_records($id)
    {
        global $wpdb;
        $wpdb->delete("custom_records", ['id' => $id], ['%d']);
    }
    public function no_items()
    {
        _e('No record found in the database.', 'bx');
    }
    public static function record_count()
    {
        global $wpdb;
        $sql = "SELECT COUNT(*) FROM wp_cardfile_users";
        return $wpdb->get_var($sql);
    }
}