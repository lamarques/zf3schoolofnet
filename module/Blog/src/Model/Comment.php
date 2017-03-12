<?php
/**
 * Created by PhpStorm.
 * User: NB0065
 * Date: 11/03/2017
 * Time: 01:40
 */

namespace Blog\Model;


class Comment
{

    public $id;
    public $content;
    public $post_id;

    public function exchangeArray(array $data)
    {
        $this->id = (!empty($data['id'])) ? $data['id']:null;
        $this->content = (!empty($data['content'])) ? $data['content']:null;
        $this->post_id = (!empty($data['post_id'])) ? $data['post_id']:null;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'post_id' => $this->post_id,
        ];
    }

}