<?php
namespace Album\Model;

use DomainException;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\InputFilter\InputFilter;
use Laminas\Filter\ToInt;
use Laminas\Filter\StripTags;
use Laminas\Filter\StringTrim;
use Laminas\Validator\StringLength;

class Album implements InputFilterAwareInterface{
    public $id;
    public $name;
    public $email;
    public $phone_num;
    public $message;

    private $inputFilter;

    public function exchangeArray(array $data){
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->phone_num = $data['phone_num'];
        $this->message = $data['message'];
        
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }
    public function getInputFilter()
        {
            if ($this->inputFilter){
                return $this->inputFilter;
            }
            $inputFilter = new InputFilter();

            $inputFilter->add([
                'name'=>'id',
                'required'=> true,
                'filters'=>[
                    ['name'=> ToInt::class],
                ],
            ]);

            $inputFilter->add([
                'name'=>'name',
                'required'=>true,
                'filters'=>[
                    ['name'=>StripTags::class],
                    ['name'=>StringTrim::class],
                ],
                'validators'=>[
                    [
                        'name'=>StringLength::class,
                        'options'=>[
                            'encoding'=>'UTF-8',
                            'min'=> 1,
                            'max'=> 100,
                        ],
                    ],
                ],
            ]);

            $inputFilter->add([
                'name'=>'email',
                'required'=>true,
                'filters'=>[
                    ['name'=>StripTags::class],
                    ['name'=>StringTrim::class],
                ],
                'validators'=>[
                    [
                        'name'=>StringLength::class,
                        'options'=>[
                            'encoding'=>'UTF-8',
                            'min'=> 1,
                            'max'=> 100,
                        ],
                    ],
                ],
            ]);

            $inputFilter->add([
                'name'=>'phone_num',
                'required'=>true,
                'filters'=>[
                    ['name'=>StripTags::class],
                    ['name'=>StringTrim::class],
                ],
                'validators'=>[
                    [
                        'name'=>StringLength::class,
                        'options'=>[
                            'encoding'=>'UTF-8',
                            'min'=> 1,
                            'max'=> 100,
                        ],
                    ],
                ],
            ]);

            $inputFilter->add([
                'name'=>'message',
                'required'=>true,
                'filters'=>[
                    ['name'=>StripTags::class],
                    ['name'=>StringTrim::class],
                ],
                'validators'=>[
                    [
                        'name'=>StringLength::class,
                        'options'=>[
                            'encoding'=>'UTF-8',
                            'min'=> 1,
                            'max'=> 100,
                        ],
                    ],
                ],
            ]);

            $this->inputFilter =$inputFilter;
            return $this->inputFilter;
        }
        public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'email'    => $this->email,
            'phone_num'  => $this->phone_num,
            'message'  => $this->message,
        ];
    }
}