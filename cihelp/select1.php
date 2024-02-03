Selecting Data

$this->db->get()

Runs the selection query and returns the result. Can be used by itself to retrieve all records from a table:

$query = $this->db->get('mytable');  // Produces: SELECT * FROM mytable

$query = $this->db->get('mytable', 10, 20);

// Executes: SELECT * FROM mytable LIMIT 20, 10
// (in MySQL. Other databases have slightly different syntax)

$query = $this->db->get('mytable');

foreach ($query->result() as $row)
{
        echo $row->title;
}


$this->db->get_where()

$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);

$this->db->select()
Permits you to write the SELECT portion of your query:

$this->db->select('title, content, date');
$query = $this->db->get('mytable');

// Executes: SELECT title, content, date FROM mytable

$this->db->select('(SELECT SUM(payments.amount) FROM payments WHERE payments.invoice_id=4) AS amount_paid', FALSE);
$query = $this->db->get('mytable');

$this->db->select_max()

$this->db->select_max('age');
$query = $this->db->get('members');  // Produces: SELECT MAX(age) as age FROM members

$this->db->select_max('age', 'member_age');
$query = $this->db->get('members'); // Produces: SELECT MAX(age) as member_age FROM members

$this->db->select_min()
$this->db->select_min('age');
$query = $this->db->get('members'); // Produces: SELECT MIN(age) as age FROM members

$this->db->select_sum('age');
$query = $this->db->get('members'); // Produces: SELECT SUM(age) as age FROM members

$this->db->select('title, content, date');
$this->db->from('mytable');
$query = $this->db->get();  // Produces: SELECT title, content, date FROM mytable
