<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Frontend\AppBundle\Entity\PropertyRepository;
use Frontend\AppBundle\Entity\StatusRepository;

class editReservationFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $user = $options['attr']['user'];
         $status = $options['attr']['status'];
         $property = $options['attr']['property'];
         $resId = $options['attr']['resId'];
        $builder
            ->add('firstName', null, array('label'=>'First Name','attr' => array('class' => 'form-control'),'required' => true))
            ->add('lastName', null, array('label'=>'Last Name','attr' => array('class' => 'form-control'),'required' => true))
            ->add('checkIn', 'date', array('label'=>'Check In','format' => 'MM/dd/yyyy', 'widget'=>'single_text','attr' => array('class' => 'form-control period-calendar'),'required' => true))
            ->add('checkOut', 'date', array('label'=>'Check Out','format' => 'MM/dd/yyyy','widget' => 'single_text','attr' => array('class' => 'form-control period-calendar'),'required' => true))    
            ->add('checkouthour', 'choice', array('attr' => array('class' => 'form-control'), 'choices' => array('0' => '12 AM','1' => '1 AM', '2' => '2 AM', '3' => '3 AM', '4' => '4 AM', '5' => '5 AM', '6' => '6 AM', '7' => '7 AM', '8' => '8 AM', '9' => '9 AM', '10' => '10 AM', '11' => '11 AM', '12' => '12 PM', '13' => '1 PM', '14' => '2 PM', '15' => '3 PM', '16' => '4 PM', '17' => '5 PM', '18' => '6 PM', '19' => '7 PM', '20' => '8 PM', '21' => '9 PM', '22' => '10 PM', '23' => '11 PM'),'required' => true,'empty_value' => 'Hour'))
            ->add('checkinhour', 'choice', array('attr' => array('class' => 'form-control'), 'choices' => array('0' => '12 AM','1' => '1 AM', '2' => '2 AM', '3' => '3 AM', '4' => '4 AM', '5' => '5 AM', '6' => '6 AM', '7' => '7 AM', '8' => '8 AM', '9' => '9 AM', '10' => '10 AM', '11' => '11 AM', '12' => '12 PM', '13' => '1 PM', '14' => '2 PM', '15' => '3 PM', '16' => '4 PM', '17' => '5 PM', '18' => '6 PM', '19' => '7 PM', '20' => '8 PM', '21' => '9 PM', '22' => '10 PM', '23' => '11 PM'),'required' => true,'empty_value' => 'Hour'))        
            ->add('adults', 'choice', array('label'=>'Adults / Children','empty_value' => 'Adults','attr' => array('class' => 'form-control'),'choices' => array('0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'),'required' => true))          
            ->add('children', 'choice', array('empty_value' => 'Children','attr' => array('class' => 'form-control'),'choices' => array('0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'),'required' => true))                
            ->add('email', null , array('label'=>'Email','attr' => array('class' => 'form-control'), 'required' => true))
            ->add('phone', null , array('label'=>'Phone','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('mobile', null , array('label'=>'Mobile','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('property', 'entity' , array('label'=>'Property',
               'query_builder' => function (PropertyRepository $er) use ($user, $status, $property) {
                return $er->createQueryBuilder('p')
                ->select('p, u')
                ->join('p.user', 'u')
                ->andWhere('p.status = :id')
                ->andWhere('u.id = :uid')
                ->andWhere('p.serie = :pid')        
                ->setParameter('id', $status)
                ->setParameter('uid', $user)
                ->setParameter('pid', $property);
            },'attr' => array('class' => 'form-control'), 'class' => 'AppBundle:Property', 'required' => true,'empty_value' => false)) 
            ->add('status', 'entity' , array('label'=>'Status',
               'query_builder' => function (StatusRepository $er) {
                return $er->createQueryBuilder('s')
                ->select('s')
                ->andWhere('s.id = :cid OR s.id = :pid')
                ->setParameter('cid', 3)
                ->setParameter('pid', 5);
            },'attr' => array('class' => 'form-control'), 'class' => 'AppBundle:Status', 'required' => true,'empty_value' => false))    
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Reservation',
        ));
    }
             
            

    public function getName()
    {
        return 'reservation';
    }
}
