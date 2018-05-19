<?php

namespace Zahira\ZahiraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Zahira\ZahiraBundle\Entity\youth;
use Zahira\ZahiraBundle\Security\WebService;
use Zahira\ZahiraBundle\Controller\SecurityController;

use Zahira\ZahiraBundle\Entity\Eps;

class YouthController extends SecurityController
{
   
    // funcion Get para traer todo los datos de la BD
    public function getAction(){
        $countYouth = $this->getDoctrine()->getRepository('zahiraBundle:youth')->GetYouth();
        return new JsonResponse($countYouth);
    }
    
    public function indexAction()
    {
        //return new Response('mirando mi nuevo controller');
//        $viewGet = $this->getDoctrine()->getManager();        
//       $youthnew = $viewGet->getRepository('zahiraBundle:youth')->findBy(array('stateYouth'=>1), array('nameYouth'=>'ASC'));
//       
//       $array[]=array();
//       
//       for($i = 0; $i < count($youthnew); $i++){
//           $array[$i] = [
//               'id' => $youthnew[$i]->getId(),
//               'codYouth' => $youthnew[$i]->getCodYouth(),
//               'nameYouth' => $youthnew[$i]->getNameYouth(),
//               'lastnameYouth' => $youthnew[$i]->getLastnameYouth(),
//               'phoneYouth' => $youthnew[$i]->getPhoneYouth(),
//               'addressYouth' => $youthnew[$i]->getAddressYouth(),
//               'bingoYouth' => $youthnew[$i]->getBingoYouth(),
//               'stateYouth' => $youthnew[$i]->getStateYouth(),
//               'imageYouth' => $youthnew[$i]->getImageYouth()
//           ];
//       }
//       
       //return new JsonResponse($array, Response::HTTP_OK);
        return new Response('nada que mirar aqui');
    }
    
    
    // funcion para contar cuantos registros existen en la tabla yount
    public function countAction(){
        
        $countYouth = $this->getDoctrine()->getRepository('zahiraBundle:youth')->counterUser();
        return new JsonResponse($countYouth);
    }
    
    
    // funcio para agregar datos 
    public function addAction(Request $request)
    {   
        $valoresJson = json_decode($request->getContent(),true);
        $em = $this->getDoctrine()->getManager();
        
        $youth = new youth();
        
        $youth->setCodYouth($valoresJson['codYouth']);
        $youth->setNameYouth($valoresJson['nameYouth']);
        $youth->setLastnameYouth($valoresJson['lastnameYouth']);
        $youth->setBirthdate(new \DateTime($valoresJson['birthdate']));
        $youth->setGroupYouth($valoresJson['groupYouth']);
        $youth->setAddressYouth($valoresJson['addressYouth']);
        $youth->setPhoneYouth($valoresJson['phoneYouth']);
        $youth->setMailYouth($valoresJson['mailYouth']);
        $youth->setCommune($valoresJson['commune']);
        $youth->setImageYouth($valoresJson['imageYouth']);
        $youth->setRegisterYouth(new \DateTime($valoresJson['registerYouth']));
        $youth->setStateYouth(1);
        $youth->setSexYouth($valoresJson['sexYouth']);
        $youth->setVoteYouth($valoresJson['voteYouth']);
        $youth->setSubsidy($valoresJson['subsidy']);
        $youth->setPensionYouth($valoresJson['pensionYouth']);
        $youth->setEntityYouth($valoresJson['entityYouth']);
        $youth->setSisbenYouth($valoresJson['sisbenYouth']);
        $youth->setBingoYouth($valoresJson['bingoYouth']);
        $youth->setSizeYouth($valoresJson['sizeYouth']);
        $youth->setCodEps($valoresJson['codEps']);
        $youth->setCod_Rh($valoresJson['rh']);
        
        $em->persist($youth);
        $em->flush();
        return new JsonResponse('Usuario Registrado Correctamente');
    }
    
    // metodo encargado de buscar un usuario e especifico
    public function viewAction($id)
    {
        $viewYouthId = $this->getDoctrine()->getRepository('zahiraBundle:youth')->ViewYouth($id);
        return new JsonResponse($viewYouthId);     
    }
    
    
    public function editAction($id){
        return new Response('hola mundo a editar '. $id );
    }
    
    // funcion para hacer borrado logico
    public function EditStateAction($id){
//        $youth = $this->getDoctrine()->getRepository('zahiraBundle:youth')->find($id);
//        $youth->setStateYouth(0);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($youth);
//        $em->flush();
        
        $countYouth = $this->getDoctrine()->getRepository('zahiraBundle:youth')->DeleteLogYouth($id);
        //dump($countYouth); die();
        //return new JsonResponse($countYouth);
        if($countYouth === 1){
           return new JsonResponse('Deleted Succcessful'); 
        }
        
    }
    
    
    // funcion para el envio de correo electronico con symfony
    
    public function MailAction(Request $request){
        $valoresJson = json_decode($request->getContent(),true);
        
        dump($valoresJson); die();
        
        if (isset($valoresJson)) {
            
            $message = \Swift_Message::newInstance()
                ->setSubject($valoresJson['asuntMail'])
                ->setFrom('info@cergersoft.com')
                ->setTo($valoresJson['emailMail'])
                ->setBody($valoresJson['nameMail'].'<br/> '. $valoresJson['commentMail'], 'text/html');

            $this->get('mailer')->send($message);
        }
        return new JsonResponse('mail Succcessfully');
        
    }
    
    public function SearchIpAction($ip){
        
        $record = $this->get('geoip2.reader')->city($ip);

        $array = [
            'ip' => $record->country->name . ' ' .$record->city->name .' '. $record->country->isoCode
        ];
        
        return new JsonResponse($array);
    }
    
    // listar eps 
    public function EpsAction(Request $request){
        try {
        $getAllEps = $this->getDoctrine()->getRepository('zahiraBundle:Eps')->GetAllEps();
        
        return new JsonResponse($getAllEps);
        } catch (\Exception $e) {
            return $this->setStatusCode(WebService::CODE_ERR_NOT_FOUND)
                            ->respondWithError($e->getMessage()
                                    , WebService::CODE_ERR_NOT_FOUND, $this->getMeta($request));
        }
        
//        return $this->metaResponse($request
//            , $this->serializerAndTranslate($getAllYouth)
//            , WebService::CODE_OK_CREATED
//            , ["Daniel Merchan"]);  
    }
    
    public function RhAction(Request $request)
    {
        try {
        $getAllRh = $this->getDoctrine()->getRepository('zahiraBundle:Rh')->viewRh();
        
        return new JsonResponse($getAllRh);
        
//                //return $this->metaResponse($request
//            , $this->serializerAndTranslate($getAllRh)
//            , WebService::CODE_OK_CREATED
//            , ["Daniel Merchan"]); 
        
        } catch (\Exception $e) {
            return $this->setStatusCode(WebService::CODE_ERR_NOT_FOUND)
                            ->respondWithError($e->getMessage()
                                    , WebService::CODE_ERR_NOT_FOUND, $this->getMeta($request));
        }
    }
}
