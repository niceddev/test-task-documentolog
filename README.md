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
### task-three (смотрите папку выше taskThree)
```
Код в сервисном слое, я просто вызываю его в шаблоне с помощью echo

public function buildHierarchyTreeFromArray(array $commentsArray, int $parentId = 1, array &$processedIds = [])
{
    $tree = '<ul>';

    foreach ($commentsArray as $item) {

        if ($item[1] === $parentId && !in_array($item[0], $processedIds)) {

            $processedIds[] = $item[0];

            $tree .= '<li>' . $item[2];
            $tree .= $this->buildHierarchyTreeFromArray($commentsArray, $item[0], $processedIds);
            $tree .= '</li>';

        }

    }

    return $tree . '</ul>';
}
```
