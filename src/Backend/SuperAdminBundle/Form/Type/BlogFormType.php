<?php

namespace Backend\SuperAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Frontend\AppBundle\Entity\StatusRepository;
use Symfony\Component\Validator\Constraints\File;

class BlogFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         //$user = $options['attr']['user'];
         //$status = $options['attr']['status'];
        $builder
            ->add('tittle', null, array('label'=>'Title','attr' => array('class' => 'form-control'),'required' => true))
            ->add('photo', null , array('validation_groups' => array('contactFront'),'label'=>'Featured Image', 'constraints' => array(new File(array('maxSize'=>'1M'))), 'data_class' =>null, 'required' => false, 'attr' => array('accept'=>'image/*')))     
            ->add('text', null, array('label'=>'Text','attr' => array('class' => 'form-control'),'required' => true))
            ->add('category', 'entity', array('label'=>'Category','attr' => array('class' => 'form-control'), 'class' => 'AppBundle:Category','property' => 'name'))
            ->add('tags', 'entity', array('label'=>'Tags','attr' => array('class' => ''), 'class' => 'AppBundle:Tags','property' => 'name', 'multiple'=> true, 'expanded'=>true))
            ->add('status', 'entity' , array('label'=>'Status',
               'query_builder' => function (StatusRepository $er) {
                return $er->createQueryBuilder('s')
                ->select('s')
                ->andWhere('s.id = :cid OR s.id = :pid')
                ->setParameter('cid', 5)
                ->setParameter('pid', 6);
            },'attr' => array('class' => 'form-control'), 'class' => 'AppBundle:Status', 'required' => true,'empty_value' => false))    
            ;
         
    }

    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Blog',
        ));
    }
             
            

    public function getName()
    {
        return 'blog';
    }
}
