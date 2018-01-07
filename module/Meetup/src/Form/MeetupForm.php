<?php

declare(strict_types=1);

namespace Meetup\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;

class MeetupForm extends Form implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('meetup');

        $this->add([
            'type' => Element\Text::class,
            'name' => 'title',
            'options' => [
                'label' => 'Titre',
            ],
        ]);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'organisateur',
            'options' => [
                'label' => 'Organisateur(s)',
            ],
        ]);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'entreprise',
            'options' => [
                'label' => 'Entreprise',
            ],
        ]);

        $this->add([
            'type' => Element\Number::class,
            'name' => 'participant',
            'options' => [
                'label' => 'Nombre de Participants',
            ],
        ]);

        $this->add([
            'type' => Element\Textarea::class,
            'name' => 'description',
            'options' => [
                'label' => 'Description',
            ],
        ]);

        $this->add([
            'type' => Element\Submit::class,
            'name' => 'submit',
            'attributes' => [
                'value' => 'submit',
            ],
        ]);

        $this->add([
            'type' => Element\DateTime::class,
            'name' => 'date',
            'options' => [
                'label' => 'Date',
                'format' => 'Y-m-d\TH:iP',
            ],
        ]);

    }

    public function getInputFilterSpecification()
    {
        return [
            'title' => [
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 5,
                            'max' => 40,
                        ],
                    ],
                ],
            ],
            'description' => [
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 5,
                            'max' => 100,
                        ],
                    ],
                ],
            ]
        ];
    }
}
