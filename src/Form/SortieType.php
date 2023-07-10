<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_demande_projet', DateType::class, [
                'label' => 'Date de la demande* :',
                'required' => true,
                'invalid_message' => 'Veuillez saisir la date de la demande !',
            ])
            ->add('nom_projet', TextType::class, [
                'label' => 'Intitulé du projet* :',
                'required' => true,
                'invalid_message' => 'Veuillez saisir l\'intitulé du projet !',
            ])
            ->add('enseignant_projet', ChoiceType::class, [
                'label' => 'Nom et prénom de l\'enseignant organisateur* :',
                'required' => true,
                'invalid_message' => 'Veuillez sélectionner le nom et prénom de l\'enseignant organisateur !',
            ])
            ->add('', TextType::class, [
                'label' => 'Classes / élèves* :',
                'required' => true,
                'invalid_message' => 'Veuillez sélectionner les classes ou élèves concernés !',
            ])
            ->add('adresse_projet', TextType::class, [
                'label' => 'Adresse de la sortie* :',
                'required' => true,
                'invalid_message' => 'Veuillez saisir l\'adresse de la sortie !',
            ])
            ->add('jour_sortie', DateType::class, [
                'label' => 'Jour de la sortie :',
                'required' => false,
            ])
            ->add('heure_debut_sortie', TimeType::class, [
                'label' => 'Heure de début :',
                'required' => false,
            ])
            ->add('heure_fin_sortie', TimeType::class, [
                'label' => 'Heure de fin :',
                'required' => false,
            ])
            ->add('duree_projet', TextType::class, [
                'label' => 'Durée :',
                'required' => false,
            ])
            ->add('accompagnateurs', TextType::class, [
                'label' => 'Nom et prénom des accompagnateurs :',
                'required' => false,
            ])
            ->add('transport_sortie', ChoiceType::class, [
                'label' => 'Type de transport :',
                'required' => false,
            ])
            ->add('cout_transport', IntegerType::class, [
                'label' => 'Coût de transport :',
                'required' => false,
            ])
            ->add('devis_bus', FileType::class, [
                'label' => 'Devis :',
                'required' => false,
            ])
            ->add('activites', TextType::class, [
                'label' => 'Activité(s)',
                'required' => false,
            ])
            ->add('resa_sandwich', ChoiceType::class, [
                'label' => 'Réservation de sandwich à faire :',
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ],
                'required' => false,
            ])
            ->add('cout_global_projet', IntegerType::class, [
                'label' => 'Coût global',
                'required' => false,
            ])
            ->add('cout_eleve_projet', TextType::class, [
                'label' => 'Coût par élève',
                'required' => false,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
