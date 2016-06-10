<?php

namespace Autoecole\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    //Return le main layout in {# Autoecole/MainBundle/Resources/views/layout.html.twig #}
    public function indexAction()
    {        
        return $this->render('AutoecoleMainBundle::layout.html.twig');
    }
     //Return le block 'home' in {# Autoecole/MainBundle/Resources/views/Default/accueil.html.twig #}
    public function accueilAction()
    {        
        return $this->render('AutoecoleMainBundle:Default:accueil.html.twig');
    }
     //Return le block 'services' in {# Autoecole/MainBundle/Resources/views/Default/services.html.twig #}
    public function servicesAction()
    {    
     // On récupère le repository
        $repository = $this->getDoctrine()
        ->getManager()
        ->getRepository('AutoecoleMainBundle:Pricing');

        for ($i = 1; $i <= 4; $i++) {
     // On récupère l'entité correspondante à l'id $id
            $price_array[$i] = $repository->find($i);    
            // $price_array[$i] est donc une instance de Autoecole\MainBundle\Entity\Pricing
    // ou null si l'id $id  n'existe pas, d'où ce if :
            if (null === $price_array[$i]) {
              throw new NotFoundHttpException("L'annonce d'id ".$i." n'existe pas.");
          }
      }

      return $this->render('AutoecoleMainBundle:Default:services.html.twig',array(
          'pricing' => $price_array));
    }
    //Return le block 'contacts' in {# Autoecole/MainBundle/Resources/views/Default/contacts.html.twig #}
    public function contactsAction()
    {        
     return $this->render('AutoecoleMainBundle:Default:contacts.html.twig');
    }
    //Return le block 'blog' in {# Autoecole/MainBundle/Resources/views/Default/blog.html.twig #}
    public function blogAction()
    {        
        return $this->render('AutoecoleMainBundle:Default:blog.html.twig');
    }
    //Return le block 'carrousel' in {# Autoecole/MainBundle/Resources/views/Default/carrousel.html.twig #}
    public function carrouselAction()
    {
        return $this->render('AutoecoleMainBundle:Default:carrousel.html.twig');
    }
    //Return le block 'footer' in {# Autoecole/MainBundle/Resources/views/Default/footer.html.twig #}
    public function footerAction()
    {
        return $this->render('AutoecoleMainBundle:Default:footer.html.twig');
    }
}

