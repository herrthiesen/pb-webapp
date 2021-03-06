<?php

namespace Becker\WebAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Becker\WebAppBundle\Entity\Buehne;
use Becker\WebAppBundle\Entity\Kategorie;
use Becker\WebAppBundle\Entity\Anfrage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Becker\WebAppBundle\Form\EintragenForm;
use Becker\WebAppBundle\Form\ErweiterteSucheForm;
use Becker\WebAppBundle\Form\AnfrageBuehneForm;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\DBAL\DriverManager;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BeckerWebAppBundle:Default:index.html.twig');
    }
    
    public function eintragenAction()
    {
        $buehne = new Buehne();
        $em = $this->getDoctrine()->getManager();
        $em->persist($buehne);
        
        $form = $this->createForm(new EintragenForm(), $buehne);
        
        return $this->render('BeckerWebAppBundle:Default:eintragen.html.twig', array('form' => $form->createView(), $buehne));
    }
    
    public function searchAction(Request $request)
    {
        if ($request->getMethod() == 'POST')
        {
            
            $term = $request->request->get('term');
            if (!$term)
            {
                //=====================================
                //Check if search is an advanced search
                //=====================================
                
                
                $form = $this->createForm(new ErweiterteSucheForm());
                $request = Request::createFromGlobals();
                $form->handleRequest($request);
            
                if ($form->isValid()) 
                {       
                    $term = $form->get('name')->getData();
                    if(strlen($term) > 0)
                        {$term = 'name:'.$term;}
                    else
                    {    
                        $term = $form->get('ahoehe')->getData();
                        if(strlen($term) > 0)
                            {$term = 'ahoehe:'.$term;} 
                        else
                        {    
                            $term = $form->get('korblast')->getData();
                            if(strlen($term) > 0)
                                {$term = 'korblast:'.$term;} 
                            else
                            {    
                                $term = $form->get('reichweite')->getData();
                                if(strlen($term) > 0)
                                    {$term = 'reichweite:'.$term;} 
                                else
                                {    
                                    $term = $form->get('laenge')->getData();
                                    if(strlen($term) > 0)
                                        {$term = 'laenge:'.$term;} 
                                    else
                                    {    
                                        $term = $form->get('breite')->getData();
                                        if(strlen($term) > 0)
                                            {$term = 'breite:'.$term;} 
                                        else
                                        {    
                                            $term = $form->get('hoehe')->getData();
                                            if(strlen($term) > 0)
                                                {$term = 'hoehe:'.$term;}
                                            else
                                            {    
                                                $term = $form->get('stuetzbreite')->getData();
                                                if(strlen($term) > 0)
                                                    {$term = 'stuetzbreite:'.$term;} 
                                                else
                                                {    
                                                    $term = $form->get('hersteller')->getData();
                                                    if(strlen($term) > 0)
                                                        {$term = 'hersteller:'.$term;} 
                                                    else
                                                    {    
                                                        $term = $form->get('tag1')->getData();
                                                        if(strlen($term) > 0)
                                                            {$term = 'tag:'.$term;} 
                                                    }    
                                                }
                                            }
                                        }
                                    }    
                                }    
                            }
                        }
                    }
                    
                    if(strlen($term) > 0)
                    { 
                        
                        return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('term' => $term)); 
                    }
                    else
                    {
                        //Create Advanced Search Form
                        $buehne = new Buehne();
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($buehne);

                        $form = $this->createForm(new ErweiterteSucheForm(), $buehne);

                        return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('form' => $form->createView(), 'term' => $term));
                    }
                }
                else
                {
                    //Create Advanced Search Form
                    $buehne = new Buehne();
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($buehne);

                    $form = $this->createForm(new ErweiterteSucheForm(), $buehne);

                    return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('form' => $form->createView(), 'term' => $term));
                }
                
            }
            else
            {
                if(strpos($term, ':'))
                {
                    return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('term' => $term));  
                }
                else
                {
                    return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('term' => 'any:'.$term));   
                }
            }
        }
        else 
        {
            //Create Advanced Search Form
            $buehne = new Buehne();
            $em = $this->getDoctrine()->getManager();
            $em->persist($buehne);

            $form = $this->createForm(new ErweiterteSucheForm(), $buehne);
            $term = '';

            return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('form' => $form->createView(), 'term' => $term));
        }
    }
    
    public function erweiterteSucheAction()
    {
        $buehne = new Buehne();
        $em = $this->getDoctrine()->getManager();
        $em->persist($buehne);
        
        $form = $this->createForm(new ErweiterteSucheForm(), $buehne);
        
        return $this->render('BeckerWebAppBundle:Default:search.html.twig', array('form' => $form->createView(), $buehne, 'term' => ''));
    }
    
    
    public function arbeitsbuehnenAction()
    {
        return $this->render('BeckerWebAppBundle:Default:arbeitsbuehnen.html.twig');
    }
    
    public function arbeitsbuehneAction()
    {
        return $this->render('BeckerWebAppBundle:Default:arbeitsbuehne.html.twig');
    }
    
    public function lkwAction()
    {
        return $this->render('BeckerWebAppBundle:Default:lkw.html.twig');
    }
    
    public function gelenkAction()
    {
        return $this->render('BeckerWebAppBundle:Default:gelenk.html.twig');
    }
   
    public function teleskopAction()
    {
        return $this->render('BeckerWebAppBundle:Default:teleskop.html.twig');
    }
    
    public function scherenAction()
    {
        return $this->render('BeckerWebAppBundle:Default:scheren.html.twig');
    }
    
    public function anhaengerAction()
    {
        return $this->render('BeckerWebAppBundle:Default:anhaenger.html.twig');
    }  
        
    public function mastAction()
    {
        return $this->render('BeckerWebAppBundle:Default:mast.html.twig');
    }   
    
    public function liftAction()
    {
        return $this->render('BeckerWebAppBundle:Default:lift.html.twig');
    } 
        
    public function kettenAction()
    {
        return $this->render('BeckerWebAppBundle:Default:ketten.html.twig');
    }
    
    public function teleskopstaplerAction()
    {
        return $this->render('BeckerWebAppBundle:Default:teleskopstapler.html.twig');
    } 
    
     /**
     * 
     * @Route("/arbeitsbuehne/create")
     */
    public function create2BuehneAction()
    {
        $kategorie = new Kategorie();
        $kategorie->setName('LKW Arbeitsbühne');
        
        $buehne = new Buehne();
        $buehne->setName('L 180 035 LTDJ');
        $buehne->setAhoehe('18.20');
        $buehne->setKorblast('200');
        $buehne->setLaenge('6.68');
        $buehne->setBreite('2.10');
        $buehne->setHoehe('2.80');
        $buehne->setReichweite('12.90');
        $buehne->setStuetzbreite('3.60');
        $buehne->setHersteller('Multitel');
        $buehne->setPdf('xxx');
        $buehne->setKategorie($kategorie);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($kategorie);
        $em->persist($buehne);
        $em->flush();
        
        return new Response('Bühne wurde angelegt mit der ID '.$buehne->getId());
    }  
    
    /**
     * @Route("/arbeitsbuehne/show/{id}", defaults={"id" = 1})
     */
    public function showBuehneAction($id)
    {      
        
        //$form = $this->createForm(new anfrageBuehneForm(), $id);
        
        //return $this->render('BeckerWebAppBundle:Default:eintragen.html.twig', array('form' => $form->createView(), $buehne));
        
                        
        return $this->render('BeckerWebAppBundle:Default:arbeitsbuehne.html.twig', array('id' => $id));
        
    }  
    
    public function showBuehneSuccessAction($id, $success)
    {      
        
        //$form = $this->createForm(new anfrageBuehneForm(), $id);
        
        //return $this->render('BeckerWebAppBundle:Default:eintragen.html.twig', array('form' => $form->createView(), $buehne));
        echo '<div class="alert alert-success" role="alert"><strong>Vielen Dank!</strong> Ihre Anfrage wurde erfolgreich verschickt.</div>';
                        
        return $this->render('BeckerWebAppBundle:Default:arbeitsbuehne.html.twig', array('id' => $id));
        
    }  
    

    public function markerAction()
    {      
        //$session = new Session();
        //$session->start();

        $session = $this->getRequest()->getSession();
        
        if(!$session->getId())
        {
            $session = new Session();
            $session->start();
        }
        
        $count = 1;
        $id = 33;
        $session->set('marks', array('1' => $id));
                        
        return $this->render('BeckerWebAppBundle:Default:marker.html.twig');
        
    }  
    
    public function getGPAction()
    {       
        
        return $this->renderArrayResultsAction();
        
        /*$conn = $this->container->get('database_connection');
        $sql = 'SELECT a.*
            FROM gp f 
            JOIN ClosureTable a ON (f.nlid = a.descendant_id)
            WHERE a.descendant_id = 15';
        $rows = $conn->query($sql);
        
        if(!$conn)
        {
            return new Response('NO ');
        }
        else 
        {
            while ($row = $rows->fetch()) 
            {                
                echo $row['ancestor_id'].' '.$row['descendant_id'].'</br>';
                $anc = $row['ancestor_id'];
                do
                {
                    $conn2 = $this->container->get('database_connection');
                    $sql2 = 'SELECT a.ancestor_id, a.level
                        FROM ClosureTable a 
                        WHERE a.descendant_id = '.$anc.' AND a.level = 1';

                    $rows2 = $conn->query($sql2);
                    while ($row2 = $rows2->fetch()) 
                    { 
                        $anc2 = $row2['ancestor_id'];
                        $level = $row2['level'] + 1;
                        echo ' VORFAHRE '.$anc2.' '.$level.' '.'</br></br>';
                        $anc = $anc2;
                    }
                } while (!$anc);
                
                if(!$anc)
                {
                    echo '</br> ENDE ';
                }
            }
            $count  = count($rows);
            
            //UPDATE LEVEL FOR NEW GP
            $newId = 18;
            $conn = $this->container->get('database_connection');
            $sql = 'SELECT a.ancestor_id, a.level
                FROM ClosureTable a WHERE a.descendant_id = '.$newId.' AND a.level = 1';
            $result = $conn->query($sql);
            
            while ($row = $result->fetch()) 
            {  
               echo  $row['ancestor_id'].$row['level'];
                
                $seekId = $row['ancestor_id'];
                
                $i = 0;
                while($seekId > 0)
                {
                    $i++;
                       $seekId = $this->getNextLevelAction($seekId, $newId, $i);
                }                
            }
            
            return new Response('</br>YES '.$sql);

        }*/
        return new Response('</br>YES '.$sql);
    }
    
    public function renderArrayResultsAction()
    {
        //echo '============================<br>';
        
        $conn = $this->container->get('database_connection');
        $sql = 'SELECT f.*
            FROM gp f';
        $rows = $conn->query($sql);
        $results = $rows->fetchAll();
        
       // print_r($results);
        //echo '<br>============================<br>';
       // return $this->render('BeckerWebAppBundle:Default:teleskopstapler.html.twig');
        
        return $this->render('BeckerWebAppBundle:Default:arrayEcho.html.twig', array('results' => $results));
    }
    
    public function getNextLevelAction($id, $newId, $level)
    {
        $conn = $this->container->get('database_connection');
        $sql = 'SELECT a.ancestor_id, a.level
            FROM ClosureTable a WHERE a.descendant_id = '.$id.' AND a.level = 1';
        $result = $conn->query($sql);

        while ($row = $result->fetch()) 
        {  
            $i = $level + 1;
            $conn2 = $this->container->get('database_connection');

            $update = 'UPDATE ClosureTable SET level = ? WHERE a.ancestor_id = ? AND a.descendant_id = ?';
            echo '<br>'.$update;

            $anc = $row['ancestor_id'];

            $count = $conn2->executeUpdate('UPDATE ClosureTable SET level = ? WHERE ancestor_id = ? AND descendant_id = ?', array($i, $anc, $newId));
            echo  '<br>'.$row['ancestor_id'].$i;


            return $row['ancestor_id'];
        }
        
        return null;
    }
    
    /**
    * Call Anfrage Form
    * 
    * @parameter buehneName & buehneId
    * @return Renders Anfrage Form
    */

    public function anfragenAction($buehne, $buehneId)
    {
        $form = $this->createForm(new AnfrageBuehneForm());

        return $this->render('BeckerWebAppBundle:Default:anfrage.html.twig', 
                             array('form' => $form->createView(), 
                                   'buehneName' => $buehne, 
                                   'buehneId' => $buehneId));
    }
    
    /**
    * Sends the Anfrage form content per email
    * and store it to db
    * 
    * @return to the buehne details page with msg
    */
    public function sendeAnfrageAction(Request $request)
    {
        if ($request->getMethod() == 'POST')
        {   
            //=========================
            // getting all form data
            //=========================
            $data = $request->request->all();
            
            //=========================
            //FETCHING BUEHNENAME FROM DB
            //=========================
            $id = $data['becker_webappbundle_anfrageBuehne']['buehne_id'];
            $conn = $this->container->get('database_connection');
            $sql = 'SELECT name
                FROM buehne WHERE id = '.$id;
            $rows = $conn->query($sql);
            
            if($conn)
            {
                $row = $rows->fetchAll();
                $name = $row[0]['name'];            
                //push the buehne name to form data array
                array_push($data, $name);
            }
            
            //=========================
            // preparing the anfrage email and send it
            //=========================
            $mailer = $this->get('mailer');
            $message = $mailer->createMessage()
                ->setSubject('Mietanfrage für '.$name)
                ->setFrom('denzlingen.ab@becker.eu')
                ->setTo('s.thiesen@becker.eu')
                ->setBody(
                    $this->renderView(
                        'Emails/anfrage.html.twig',
                        array('data' => $data)
                    ),
                    'text/html'
                );
            $mailer->send($message);

            //=========================
            // send anfrage to db
            //=========================
            echo 'send';
            $this->storeAnfrageToDbAction($data);
          
        }
        //=========================
        // Go back to the current buehne Details page 
        // and show success message
        //=========================
        return $this->
            redirectToRoute('becker_web_app_buehneShowSuccess', 
                            array('id' => $id, 'success' => 1)); 
        
        return new Response ('');
    }
    
    /**
    * Store Anfrage form data array to db
    *
    * @param (array) form data
    * @return true/fals
    */
    public function storeAnfrageToDbAction($data)        
    {
        //=========================
        // get form data
        //=========================
      
        $buehne_id = $data['becker_webappbundle_anfrageBuehne']['buehne_id'];
        $mietenVom = $data['becker_webappbundle_anfrageBuehne']['mietenVom'];
        $mietenBis = $data['becker_webappbundle_anfrageBuehne']['mietenBis'];
        $kundeName = $data['becker_webappbundle_anfrageBuehne']['kundeName'];
        $kundeFirma = $data['becker_webappbundle_anfrageBuehne']['kundeFirma'];
        $kundeEmail = $data['becker_webappbundle_anfrageBuehne']['kundeEmail'];
        $kundeTel = $data['becker_webappbundle_anfrageBuehne']['kundeTel'];
        $bemerkung = $data['becker_webappbundle_anfrageBuehne']['bemerkung'];
        $einsatzort = $data['becker_webappbundle_anfrageBuehne']['einsatzort'];
        
        
        //=========================
        // insert into db
        //=========================
        $conn = $this->container->get('database_connection');
       
        $conn->insert('anfrage', 
                      array('buehne_id' => $buehne_id, 
                            'mietenVom' => $mietenVom,
                            'mietenBis' => $mietenBis,
                            'kundeName' => $kundeName,
                            'kundeFirma' => $kundeFirma,
                            'kundeEmail' => $kundeEmail,
                            'kundeTel' => $kundeTel,
                            'bemerkung' => $bemerkung,
                            'einsatzort' => $einsatzort
                           ));
                                          
        return new Response ('');
    }
    
}
