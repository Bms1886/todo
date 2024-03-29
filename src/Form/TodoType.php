<?php

namespace App\Form;

use App\Entity\Todo;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class TodoType extends AbstractType
{
    private $tokenStorage;
    /*public function __construct(TokenStorageInterface $tokenStorage){
        $this->tokenStorage = $tokenStorage;
    }*/
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
      /*  $user= $this->tokenStorage->getToken()->getUser();
        $userId= $user->getId();*/
        $builder
            ->add('titre')
            ->add('statut')
            ->add('relation', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Todo::class,
        ]);
    }
}
