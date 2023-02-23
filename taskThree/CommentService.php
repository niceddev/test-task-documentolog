<?php

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