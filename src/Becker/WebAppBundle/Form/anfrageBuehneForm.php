<?php
namespace Becker\WebAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Persistence\ObjectManager;
   

class anfrageBuehneForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder
                ->setAction('/wa/web/createBuehne/')
                ->setMethod('POST')
                ->add('name')
                ->add('tel')
                ->add('email')
                ->add('save', 'submit', array(
                    'attr' => array('class' => 'post')))
                ;
    }
    

    public function getName()
    {
        return 'becker_webappbundle_anfrageBuehne';
    }
}