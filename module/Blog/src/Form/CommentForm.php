<?php

namespace Blog\Form;


use Zend\Form\Element;
use Zend\Form\Form;

class CommentForm extends Form
{

    public function __construct($name = null, array $options = [])
    {
        parent::__construct('post');
        $this->add([
            'name' => 'content',
            'type' => Element\Textarea::class,
            'options' => [
                'label' => 'Content'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value' => 'Enviar',
                'id' => 'submitbutton'
            ]
        ]);
    }

}