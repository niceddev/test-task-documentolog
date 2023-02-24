# test-task-documentolog

### task-one
```
final class MySingleton
{
    private static ?MySingleton $instance = null;

    private function __construct(): void
    {
        // TODO: Implement __construct() method.
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone(): void
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup(): void
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
Чтобы запустить: php -S localhost:80
```
```
class CommentService
{
    /**
     * @param array $commentsArray
     * 
     * @return string
     */
    public function getHierarchyTreeDOM(array $commentsArray): string
    {
        $processedIds = [];

        $htmlDOM = '<ul>';

        foreach ($commentsArray as $comment) {

            if ($comment[0] === $comment[1]) {
                $htmlDOM .= '<li>' . $comment[2];
                $htmlDOM .= $this->buildHierarchyRecursively($commentsArray, $comment[0], $processedIds);
                $htmlDOM .= '</li>';
            }

        }

        return $htmlDOM . '</ul>';
    }

    /**
     * @param array $commentsArray
     * @param int $parentId
     * @param array $processedIds
     * 
     * @return string
     */
    private function buildHierarchyRecursively(array $commentsArray, int $parentId = 1, array &$processedIds = []): string
    {
        $htmlDOM = '<ul>';

        foreach ($commentsArray as $item) {

            if ($item[0] !== $parentId && $item[1] === $parentId && !in_array($item[0], $processedIds)) {
                $processedIds[] = $item[0];

                $htmlDOM .= '<li>' . $item[2];
                $htmlDOM .= $this->buildHierarchyRecursively($commentsArray, $item[0], $processedIds);
                $htmlDOM .= '</li>';
            }

        }

        return $htmlDOM . '</ul>';
    }

}
```
```
<?php

require_once('CommentService.php');

$commentService = new CommentService();

$commentsArray = [
    [1, 1, 'Comment 1'],
    [2, 1, 'Comment 2'],
    [3, 2, 'Comment 3'],
    [4, 1, 'Comment 4'],
    [5, 2, 'Comment 5'],
    [6, 3, 'Comment 6'],
    [7, 7, 'Comment 7'],
];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments</title>
</head>
<body>
    <h2>Comments:</h2>
    <?php

        echo $commentService->getHierarchyTreeDOM($commentsArray);

    ?>
</body>
</html>
```
