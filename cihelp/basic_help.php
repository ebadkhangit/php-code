mail not send using web mail on server-> go particular domain->DNS->Select MX->priority 0->host->@->mail.domain namme type then save


3) Explain how you will load or add a model in CodeIgniter?

$this->load->model (‘Model_Name’);

$this->load->helper('name');

$this->load->helper('url');

$this->load->helper(
        array('helper1', 'helper2', 'helper3')
);

$this->load->library('cart');
$this->load->library(‘session’); method is used to sessions in CodeIgniter

$this->load->library('session');
Once loaded, the Sessions library object will be available using:

$this->session

Creating a session in CodeIgniter
$this->session->set_userdata('some_name', 'some_value');


$newdata = array(
        'username'  => 'johndoe',
        'email'     => 'johndoe@some-site.com',
        'logged_in' => TRUE
);
$this->session->set_userdata($newdata);

Reading session data in CodeIgniter

$this->session->userdata('your_key');

Removing Session Data

$this->session->unset_userdata('some_key');
Unset an array of item keys

 $array_items = array('username', 'email');
 $this->session->unset_userdata($array_items);
 
 Remov index.php
 
 Step 1: Open config.php and replaces
$config['index_page'] = "index.php" to $config['index_page'] = "" 
and 
$config['uri_protocol'] ="AUTO" to $config['uri_protocol'] = "REQUEST_URI"

Step 2: Change your .htaccess file to
RewriteEngine on
RewriteCond $1 !^(index\.php|[Javascript / CSS / Image root Folder name(s)]|robots\.txt)
RewriteRule ^(.*)$ /index.php/$1 [L]

In Codeigniter, you can link images/CSS/JavaScript by using the absolute path to your resources.

Something like below

// References your $config['base_url']
<img src="<?php echo site_url('images/myimage.jpg'); ?>" />

Code for Checking a field or column exists or not in a Codeigniter table.

if ($this->db->field_exists('field_name', 'table_name'))
{
        // some code...
}

//Loading Cart library

$this->load->library('cart');
Using Cart library methods

$data = array(
        'id'      => 'sku_9788C',
        'qty'     => 1,
        'price'   => 35.95,
        'name'    => 'T-Shirt',
        'options' => array('Size' => 'L', 'Color' => 'Red')
);

$this->cart->insert($data);

function add_post($post_data){
   $this->db->insert('posts', $post_data);
   $insert_id = $this->db->insert_id();
   return  $insert_id;
}


//DELETE FROM table WHERE id = $id
$conditions =['id' => $id]
$this->db->delete('table_name', $conditions); 

// Deleting records from more than one tables in one go
$id=1;
$tables = array('table1', 'table2', 'table3');
$this->db->where('id', $id);
$this->db->delete($tables);


order_by function is used to order the records from a table in CodeIgniter.
// Getting random rows from database in CodeIgniter
$this->db->select('*');
$this->db->from('table_name');
$this->db->order_by("column_name", "random");
$result = $this->db->get()->result(); 

By default, all logs in Codeigniter are stored in logs/ directory. To enable error logging you must set the “threshold” for logging in application/config/config.php. Also, your logs/ must be writable.

$config['log_threshold'] = 1;

There are three message types in Codeigniter. They are :

Error Messages. These are actual errors, such as PHP errors or user errors.
Debug Messages. These are messages that assist in debugging. For example, if a class has been initialized, you could log this as debugging info.
Informational Messages. These are the lowest priority messages, simply giving information regarding some process.