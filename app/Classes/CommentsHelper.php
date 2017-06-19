<?php

namespace App\Classes;

use Illuminate\Support\Facades\View;

class CommentsHelper
{
    const ADMIN_VIEW = 'pages.admin.commentOne';
    const PUBLIC_VIEW = 'pages.client.commentOne';

    public function buildTree(array $elements, $parentId = 0)
    {
        $branch = [];

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = static::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }


    public function getComments($comments, $article_id, $panel = 'piblic')
    {
        if (!$comments) {
            return false;
        } else {
            if($panel === 'admin') {
                $view = self::ADMIN_VIEW;
            }
            else {
                $view = self::PUBLIC_VIEW;
            }
            $html = '';
            foreach ($comments as $comment) {
                $html .= view($view, ['comment' => $comment, 'article_id' => $article_id]);
            }

            return $html;
        }
    }
}