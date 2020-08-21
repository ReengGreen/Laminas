<?php
namespace Album\Form;
use Laminas\Form\Form;
class AlbumForm extends Form{

    public function __construct($name = null)
    {
        parent::__construct('album');
      
        $this->add([
            'name'=>'id',
            'type'=>'hidden',
        ]);

        $this->add([
            'name'=>'name',
            'type'=>'text',
            'options'=>[
                'label'=>'Name:',
            ],
        ]);

        $this->add([
            'name'=>'email',
            'type'=>'text',
            'options'=>[
                'label'=>'Email:',
            ],
        ]);

        $this->add([
            'name'=>'phone_num',
            'type'=>'text',
            'options'=>[
                'label'=>'Phone Number:',
            ],
        ]);

        $this->add([
            'name'=>'message',
            'type'=>'text',
            'options'=>[
                'label'=>'Message:',
            ],
        ]);

        $this->add([
            'name'=>'submit',
            'type'=>'submit',
            'attributes'=>[
                'value'=>'Submit',
                'id'=>'submitbutton',
            ],
        ]);
        
    }
}