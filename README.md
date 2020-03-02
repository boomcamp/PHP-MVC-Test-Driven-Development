# Test Driven Development

For this TDD project you need to add 10 passing tests inside `TDD_controller.php`.

# Initial Set Up

* Clone this repository and import `DB/tdd_db.sql` in phpmyadmin.

* Copy and Paste `TDD` folder inside `/opt/lampp/htdocs`.

* Update `TDD/config/database.php` with your database credentials.

# Routes

* http://localhost/TDD/test = The controller that you need to add the tests

* http://localhost/TDD/example = The controller that contains example passing tests

# Requirements

* Fix the failing results of `test_hello()` inside `TDD/controllers/TDD_controller.php`

```
public function test_hello()
{
    $this->unit->set_test_items(array('test_name', 'result'));

    echo $this->unit->run(
        $this->TDD_model->say_hello(), 
        'is_string', 
        'Check if display hello world string'
    );
}
```

* Fix the failing results of `test_type()` inside `TDD/controllers/TDD_controller.php`

```
public function test_type()
{
    $this->unit->set_test_items(array('test_name', 'result'));

    echo $this->unit->run(
        $this->TDD_model->get_type(), 
        'is_object', 
        'Check if type is object'
    );
}
```

* Add new `ten passing` tests for `Create Read Update Delete` operations.


# Finished

Submit a link of your github repository to the Google Classroom assignment related to this project. Good Luck!
