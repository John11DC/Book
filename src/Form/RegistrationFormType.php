<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
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
        //    ->add('agreeTerms', CheckboxType::class, [
        //        'mapped' => false,
        //        'constraints' => [
        //            new IsTrue([
        //                'message' => 'You should agree to our terms.',
        //            ]),
        //        ],
        //    ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('firstName', TextType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
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
            ->add('name', TextType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => "Votre nom :",
                'required' => true,              
                'attr' => [
                    'placeholder'=>"Entrer votre nom",
                ],
                'constraints' =>[
                    new NotBlank([
                        'message' => "Ce champ ne doit pas être vide",
                    ]),                   
                ]
                    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
