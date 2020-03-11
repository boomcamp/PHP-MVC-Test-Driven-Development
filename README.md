# Introduction

For this TDD project you need implement `10 passing tests using CI built in testing library` and `5 passing test using PHPUnit library` in PHP.

# Initial Set Up

* Clone this repository and import `DB/tdd_db.sql` in phpmyadmin.

* Copy and Paste `TDD` folder inside `/opt/lampp/htdocs`.

* Update `TDD/config/database.php` with your database credentials.

* Install the [phpunit](https://phpcourse.now.sh/week-6/day-2/day-1) library.

# Tests locations

* http://localhost/TDD/test = The controller that you need to add the tests

* http://localhost/TDD/example = The controller that contains example passing tests

* TDD/application/tests = The tests cases of PHPUnit.

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

* Continue on adding new `ten passing` tests using built in CI testing library.

* Continue on adding `five passing` test using `phpunit`.


# Finished

Submit a link of your github repository to the Google Classroom assignment related to this project. Good Luck!
