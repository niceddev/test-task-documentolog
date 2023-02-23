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