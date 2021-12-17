<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class, [
                'label' => "Votre prénom :",
                'required' => true,
                'attr' => [
                    'placeholder'=>"Entrer votre prénom",
                ],
                'constraints' =>[
                    new NotBlank([
                        'message' => "Ce champ ne doit pas être vide",
                    ]),
                ]
                    
            ])
            ->add('name',TextType::class, [
                'label' => "Votre nom :",
                'required' => true,
                'attr' => [
                    'placeholder'=>"Entrer votre prénom",
                ],
                'constraints' =>[
                    new NotBlank([
                        'message' => "Ce champ ne doit pas être vide",
                    ]),
                ]     
                ])
            ->add('email',EmailType::class, [
                'label' => "Email",
                'required' => true,
                'attr' => [
                    'placeholder'=>"Entrer votre email",
                ],
                'constraints' =>[
                    new NotBlank([
                        'message' => "Ce champ ne doit pas être vide",
                    ]),
                    new Email([
                        'message'=>"Adresse valide",
                    ])
                ]
               
            ])
            ->add('message', TextareaType::class, [
                'label' => 'votre message',
                'attr' => [
                    'rows' => 6,
                    'placeholder'=>"Entrer votre email",
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}