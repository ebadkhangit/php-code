$this->db->join()

$this->db->select('*');
$this->db->from('blogs');
$this->db->join('comments', 'comments.id = blogs.id');
$query = $this->db->get();

// Produces:
// SELECT * FROM blogs JOIN comments ON comments.id = blogs.id

$this->db->join('comments', 'comments.id = blogs.id', 'left');

$this->db->where('name', $name); // Produces: WHERE name = 'Joe'

$this->db->where('name', $name);
$this->db->where('title', $title);
$this->db->where('status', $status);
// WHERE name = 'Joe' AND title = 'boss' AND status = 'active'

$this->db->where('name !=', $name);
$this->db->where('id <', $id); // Produces: WHERE name != 'Joe' AND id < 45

$array = array('name' => $name, 'title' => $title, 'status' => $status);
$this->db->where($array);
// Produces: WHERE name = 'Joe' AND title = 'boss' AND status = 'active'

$array = array('name !=' => $name, 'id <' => $id, 'date >' => $date);
$this->db->where($array);

$this->db->where('name !=', $name);
$this->db->or_where('id >', $id);  // Produces: WHERE name != 'Joe' OR id > 50

$names = array('Frank', 'Todd', 'James');
$this->db->where_in('username', $names);
// Produces: WHERE username IN ('Frank', 'Todd', 'James')

$names = array('Frank', 'Todd', 'James');
$this->db->or_where_in('username', $names);
// Produces: OR username IN ('Frank', 'Todd', 'James')

$names = array('Frank', 'Todd', 'James');
$this->db->where_not_in('username', $names);
// Produces: WHERE username NOT IN ('Frank', 'Todd', 'James')

$this->db->like('title', 'match');
// Produces: WHERE `title` LIKE '%match%' ESCAPE '!'


$this->db->like('title', 'match');
$this->db->like('body', 'match');
// WHERE `title` LIKE '%match%' ESCAPE '!' AND  `body` LIKE '%match% ESCAPE '!'

$this->db->like('title', 'match', 'before');    // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
$this->db->like('title', 'match', 'after');     // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'
$this->db->like('title', 'match', 'none');      // Produces: WHERE `title` LIKE 'match' ESCAPE '!'
$this->db->like('title', 'match', 'both');      // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'


$array = array('title' => $match, 'page1' => $match, 'page2' => $match);
$this->db->like($array);
// WHERE `title` LIKE '%match%' ESCAPE '!' AND  `page1` LIKE '%match%' ESCAPE '!' AND  `page2` LIKE '%match%' ESCAPE '!'

$this->db->like('title', 'match'); $this->db->or_like('body', $match);
// WHERE `title` LIKE '%match%' ESCAPE '!' OR  `body` LIKE '%match%' ESCAPE '!'

$this->db->not_like('title', 'match');  // WHERE `title` NOT LIKE '%match% ESCAPE '!'

$this->db->like('title', 'match');
$this->db->or_not_like('body', 'match');
// WHERE `title` LIKE '%match% OR  `body` NOT LIKE '%match%' ESCAPE '!'

$this->db->group_by("title"); // Produces: GROUP BY title

$this->db->group_by(array("title", "date"));  // Produces: GROUP BY title, date

$this->db->distinct();
$this->db->get('table'); // Produces: SELECT DISTINCT * FROM table

$this->db->having('user_id = 45');  // Produces: HAVING user_id = 45
$this->db->having('user_id',  45);  // Produces: HAVING user_id = 45

$this->db->having(array('title =' => 'My Title', 'id <' => $id));
// Produces: HAVING title = 'My Title', id < 45

$this->db->order_by('title', 'DESC');
// Produces: ORDER BY `title` DESC

$this->db->order_by('title DESC, name ASC');
// Produces: ORDER BY `title` DESC, `name` ASC

$this->db->order_by('title', 'RANDOM');
// Produces: ORDER BY RAND()

$this->db->order_by(42, 'RANDOM');
// Produces: ORDER BY RAND(42)

$this->db->limit(10);  // Produces: LIMIT 10

$this->db->limit(10, 20);  // Produces: LIMIT 20, 10 (in MySQL.  Other databases have slightly different syntax)

echo $this->db->count_all_results('my_table');  // Produces an integer, like 25
$this->db->like('title', 'match');
$this->db->from('my_table');
echo $this->db->count_all_results(); // Produces an integer, like 17
echo $this->db->count_all_results('my_table', FALSE);

echo $this->db->count_all('my_table');  // Produces an integer, like 25
