
$this->load->database('group_name');

Connecting to Multiple Databases
$DB1 = $this->load->database('group_one', TRUE);
$DB2 = $this->load->database('group_two', TRUE);

$this->db->close();
$this->db->reconnect();


$query = $this->db->query('YOUR QUERY HERE');

$this->db->escape() ;
This function determines the data type so that it can escape only string data. 
It also automatically adds single quotes around the data so you don’t have to:

$sql = "INSERT INTO table (title) VALUES(".$this->db->escape($title).")";

$sql = "INSERT INTO table (title) VALUES('".$this->db->escape_str($title)."')";

Query Bindings
Bindings enable you to simplify your query syntax by letting the system put the queries together for you. Consider the following example:

$sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
$this->db->query($sql, array(3, 'live', 'Rick'));

IN command 
$sql = "SELECT * FROM some_table WHERE id IN ? AND status = ? AND author = ?";
$this->db->query($sql, array(array(3, 6), 'live', 'Rick'));

result: SELECT * FROM some_table WHERE id IN (3,6) AND status = 'live' AND author = 'Rick'

Handling Errors
$this->db->error();

if ( ! $this->db->simple_query('SELECT `example_field` FROM `example_table`'))
{
        $error = $this->db->error(); // Has keys 'code' and 'message'
}


---------------------------------------------------------------------------

Result Arrays
$query = $this->db->query("SELECT * FROM users;");

$query = $this->db->query("YOUR QUERY");

foreach ($query->result() as $row)
{
        echo $row->title;
        echo $row->name;
        echo $row->body;
}

foreach ($query->result_array() as $row)
{
        echo $row['title'];
        echo $row['name'];
        echo $row['body'];
}

row()

$query = $this->db->query("YOUR QUERY");

$row = $query->row();

if (isset($row))
{
        echo $row->title;
        echo $row->name;
        echo $row->body;
}

$row = $query->row(5);

row_array()

$query = $this->db->query("YOUR QUERY");

$row = $query->row_array();

if (isset($row))
{
        echo $row['title'];
        echo $row['name'];
        echo $row['body'];
}
$row = $query->row_array(5);

num_rows()

$query = $this->db->query('SELECT * FROM my_table');

echo $query->num_rows();

num_fields()
$query = $this->db->query('SELECT * FROM my_table');

echo $query->num_fields();

free_result()
$query = $this->db->query('SELECT title FROM my_table');

foreach ($query->result() as $row)
{
        echo $row->title;
}

$query->free_result();  // The $query result object will no longer be available

$query2 = $this->db->query('SELECT name FROM some_table');

$row = $query2->row();
echo $row->name;
$query2->free_result(); // The $query2 result object will no longer be available

$query = $this->db->query('SELECT `field_name` FROM `table_name`');
$query->data_seek(5); // Skip the first 5 rows
$row = $query->unbuffered_row();

count rows
echo $this->db->count_all('my_table');

like mysqli Postgres etc
echo $this->db->platform();

db version
echo $this->db->version();