# test-task-documentolog

### task-one
```
class MySingleton
{
    private static ?MySingleton $instance = null;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __clone(): void
    {
        // TODO: Implement __clone() method.
    }

    public function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }

}
```
### task-two
```
select * from employees e
    left join employees e2 on e2.employeeid = e.chiefid
where e.salary > e2.salary;
```
```
select department, count(distinct name) from employees
group by department
having count(distinct name) < 3;
```
```
1-НФ: В каждой клеточке 1 запись, нету дублирующихся строк
```
### task-three
```
html
```
