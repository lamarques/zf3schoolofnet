<?php
/**
 * Created by PhpStorm.
 * User: NB0065
 * Date: 11/03/2017
 * Time: 17:29
 */

namespace Blog\InputFilter;


use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class PostInputFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
            'name' => 'id',
            'required' => true,
            'allow_empty' => true
        ]);

        $this->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                ['name' => StringTrim::class],
                ['name' => StripTags::class],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O Campo é Obrigatório!',
                        ]
                    ]
                ]
            ]
        ]);
        $this->add([
            'name' => 'content',
            'required' => true,
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O Campo é Obrigatório!',
                        ]
                    ]
                ]
            ]
        ]);
    }
}