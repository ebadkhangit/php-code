Updating Data

$data = array(
        'title' => 'My title',
        'name'  => 'My Name',
        'date'  => 'My date'
);

$this->db->replace('table', $data);

// Executes: REPLACE INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')

$this->db->set('name', $name);
$this->db->insert('mytable');  // Produces: INSERT INTO mytable (`name`) VALUES ('{$name}')

$this->db->set('name', $name);
$this->db->set('title', $title);
$this->db->set('status', $status);
$this->db->insert('mytable');

$this->db->set('field', 'field+1', FALSE);
$this->db->where('id', 2);
$this->db->update('mytable'); // gives UPDATE mytable SET field = field+1 WHERE id = 2

$this->db->set('field', 'field+1');
$this->db->where('id', 2);
$this->db->update('mytable'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

$array = array(
        'name' => $name,
        'title' => $title,
        'status' => $status
);

$this->db->set($array);
$this->db->insert('mytable');

$data = array(
        'title' => $title,
        'name' => $name,
        'date' => $date
);

$this->db->where('id', $id);
$this->db->update('mytable', $data);
// Produces:
//
//      UPDATE mytable
//      SET title = '{$title}', name = '{$name}', date = '{$date}'
//      WHERE id = $id

$this->db->update('mytable', $data, "id = 4");

$this->db->update('mytable', $data, array('id' => $id));

$this->db->delete('mytable', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id

$this->db->where('id', $id);
$this->db->delete('mytable');

// Produces:
// DELETE FROM mytable
// WHERE id = $id

$tables = array('table1', 'table2', 'table3');
$this->db->where('id', '5');
$this->db->delete($tables);

$this->db->empty_table('mytable'); // Produces: DELETE FROM mytable

$this->db->from('mytable');
$this->db->truncate();

// or

$this->db->truncate('mytable');

Method Chaining:-
$query = $this->db->select('title')
                ->where('id', $id)
                ->limit(10, 20)
                ->get('mytable');
				
				
				if ($this->db->table_exists('table_name'))
{
        // some code...
}

$tables = $this->db->list_tables();

foreach ($tables as $table)
{
        echo $table;
}

$fields = $this->db->list_fields('table_name');

foreach ($fields as $field)
{
        echo $field;
}

if ($this->db->field_exists('field_name', 'table_name'))
{
        // some code...
}