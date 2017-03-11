<?php
/**
 * Created by PhpStorm.
 * User: NB0065
 * Date: 11/03/2017
 * Time: 01:40
 */

namespace Blog\Model;


class Post
{

    public $id;
    public $title;
    public $content;

    public function exchangeArray(array $data)
    {
        $this->id = (!empty($data['id'])) ? $data['id']:null;
        $this->title = (!empty($data['title'])) ? $data['title']:null;
        $this->content = (!empty($data['content'])) ? $data['content']:null;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

}