<?php

class CommentService
{
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

}