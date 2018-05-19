<?php

namespace Zahira\ZahiraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zahira\ZahiraBundle\Security\WebService;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Clase principal con el esquema para control general api
 * @author Luis Enrique Robledo Lopez <lrobledo@kijho.com> 07/09/2017
 * @author Luis Fernando <lgranados@kijho.com> 07/09/2017
 * 
 */

class SecurityController extends Controller
{
    
    /**
     * Esta variable permite controlar el codigo http de respuesta 
     * @var integer codigo http
     */
    protected $statusCode = WebService::CODE_OK;

    public function meta(Request $request, $metaArray = null, $paginatorArray = null) {
        $uri = $request->getPathInfo();

        if ($request->getMethod() == 'GET' && !empty($request->query->all())) {
            $extraParamas = $request->query->all();

            foreach ($extraParamas as $keyValue => $value) {
                if (strpos($uri, "?")) {
                    $uri .= "&$keyValue=$value";
                } else {
                    $uri .= "?$keyValue=$value";
                }
            }
        }

        $this->meta['links']['self'] = $uri;

        if (empty($metaArray)) {
            return $this->meta;
        }

        $customMetaArray = $this->meta;
        $customMetaArray['meta']['authors'] = $metaArray;

        if (!empty($paginatorArray)) {
            $customMetaArray = $this->paginationForMeta($customMetaArray, $paginatorArray);
        }

        if (!isset($customMetaArray['meta']) || !isset($customMetaArray['meta']['copyright']) || !isset($customMetaArray['meta']['authors'])) {
            return $this->setStatusCode(WebService::HTTP_CODE_RESPONSE_BAD_FORMAT)
                            ->respondWithError('Meta data bad formated', WebService::CODE_BAD_FORMAT, $this->meta);
        }

        return $customMetaArray;
    }
    
    
    /**
     * Esta funcion permite comvertir en formato JSON un arreglo recibido
     * como parametro, para luego construir la respuesta que se le 
     * enviara al cliente
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @param array $array
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondWithArray(array $array, $headers = [], $message = 'Done') {


        $resp = new Response(json_encode($array));

        $resp->headers->set('Content-Type', 'application/json');

        $resp->headers->set('Access-Control-Allow-Origin', '*');

        if (!empty($headers)) {
            foreach ($headers as $key => $value) {
                $resp->headers->set($key, $value);
            }
        }

        return $resp;
    }
    
    
    /**
     * Permite enviar al usuario quien realiza la peticion un mensaje de error
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @param string $message mensaje de error
     * @param integer $errorCode codigo correspondiente al error indicado
     * @return Response JSON con el mensaje de error
     */
    public function respondWithError($message, $errorCode, $metaArray) {
        if ($this->statusCode === WebService::CODE_OK) {
            trigger_error(
                    "You better have a really good reason for erroring on a 200...", E_USER_WARNING
            );
        }
        $metaArray['errors'] = [
            'status' => $this->statusCode,
            'message' => $message,
        ];

        return $this->respondWithArray($metaArray);
    }
    
    
    /**
     * Esta funcion permite enviar una respuesta con un mensaje simple
     * a peticiones
     * @param string $message mensaje que se quiere mandar
     * @param integer $code codigo del mensaje
     * @return type
     */
    protected function respondWithMessage($message, $code = WebService::CODE_OK, $data = null) {

        if ($data != null) {
            return $this->respondWithArray([
                        'data' => [
                            'data' => $data,
                            'code' => $code,
                            'httpCode' => $this->statusCode,
                            'message' => $message,
                        ]
            ]);
        }

        return $this->respondWithArray([
                    'data' => [
                        'code' => $code,
                        'httpCode' => $this->statusCode,
                        'message' => $message,
                    ]
        ]);
    }
    
    /**
     * Funcion para que retorna la respuesta del webservice, configurable
     * @param type $request
     * @param type $data array o string con los datos a enviar en la respuesta
     * @param type $code el codigo que tendra la respuesta
     * @return JsonResponse
     */
    public function metaResponse($request, $data, $code, $metaArray = [], $paginatorArray = []) {

        $metaResult = $this->meta($request, $metaArray, $paginatorArray = []);

        if (is_array($metaResult)) {
            $metaResult['data'] = $data;

            return new JsonResponse($metaResult, $code);
        } else {
            return $metaResult;
        }
    }
    
    
    /**
     * Generates a Response with a 403 HTTP header and a given message.
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @return Response
     */
    public function errorForbidden($message = 'Forbidden') {
        return $this->setStatusCode(WebService::HTTP_CODE_FORBIDDEN)->respondWithError($message, WebService::CODE_UNAUTHORIZED);
    }

    /**
     * Generates a Response with a 500 HTTP header and a given message.
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @return Response
     */
    public function errorInternalError($message = 'Internal Error') {
        return $this->setStatusCode(WebService::HTTP_CODE_INTERNAL_ERROR)->respondWithError($message, WebService::CODE_INTERNAL_ERROR);
    }

    /**
     * Generates a Response with a 404 HTTP header and a given message.
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @return Response
     */
    public function errorNotFound($message = 'Resource Not Found') {
        return $this->setStatusCode(WebService::HTTP_CODE_NOT_FOUND)->respondWithError($message, WebService::CODE_OBJECT_NOT_FOUND);
    }

    /**
     * Generates a Response with a 401 HTTP header and a given message.
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @return Response
     */
    public function errorUnauthorized($message = 'Unauthorized') {
        return $this->setStatusCode(WebService::HTTP_CODE_UNAUTHORIZED)->respondWithError($message, WebService::CODE_UNAUTHORIZED);
    }

    /**
     * Generates a Response with a 400 HTTP header and a given message.
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @return Response
     */
    public function errorWrongArgs($message = 'Wrong Arguments') {
        return $this->setStatusCode(WebService::HTTP_CODE_BAD_REQUEST)->respondWithError($message, WebService::CODE_WRONG_ARGUMENTS);
    }

    /**
     * Generates a Response with a 400 HTTP header and a given message.
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @return Response
     */
    public function errorNotAllowedMethod($message = 'Not Allowed Method') {
        return $this->setStatusCode(WebService::HTTP_CODE_BAD_REQUEST)->respondWithError($message, WebService::CODE_NOT_ALLOWED_METHOD);
    }

    /**
     * Generates a Response with a 400 HTTP header and a given message.
     * @author Cesar Giraldo <cnaranjo@kijho.com> 09/10/2014
     * @return Response
     */
    public function errorNotConnetHost($message = 'Can not connect to server') {
        return $this->setStatusCode(WebService::CODE_HOST_NOT_CONNECT)->respondWithError($message, WebService::CODE_HOST_NOT_CONNECT);
    }
    
    public function getStatusCode() {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getMeta(Request $request = null, $metaArray = null) {
        if ($request) {
            $this->meta['links']['self'] = $request->getPathInfo();
        }

        if (empty($metaArray)) {
            return $this->meta;
        }

        $this->meta['meta']['authors'] = $metaArray;
        return $this->meta;
    }

    public function getContentInRequest($request) {
        $params = json_decode($request->getContent(), true);
        return $params;
    }
    
    
    /**
     * Permite validar una serie de parámetros en el objeto request, para identificar si no llego alguno de ellos
     * @param $request
     * @param $requiredFields
     * @param $returnParams
     * @return boolean
     */
    public function validateParams(Request $request, $requiredFields, $returnParams = false) {
        $translator = $this->container->get('translator');
        $params = $this->getContentInRequest($request);
        if ($params) {
            foreach ($requiredFields as $value) {
                if (!isset($params[$value]) || $params[$value] === '') {
                    return $translator->trans('errors_wrong_arguments') . " : " . $value . " " . $translator->trans('errors_is_required');
                }
            }

            if ($returnParams) {
                return $params;
            } else {
                return true;
            }
        }
        return $translator->trans('errors_empty_request');
    }
    
    /**
     * Permite validar una serie de parámetros enviados por GET en la Url de la peticion
     * @param req
     * @param requiredFields
     * @return {boolean}
     */
    public function validateQueryParams($request, $requiredFields) {
        $params = $request->attributes->all();
        if ($params) {
            $totalFields = count($requiredFields);
            for ($i = 0; $i < $totalFields; $i++) {
                if (!isset($params[$requiredFields[$i]]) || $params[$requiredFields[$i]] === '') {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
    
    /**
     * Permite validar si el host de la peticion se encuentra entre los
     * Hosts permitidos por el sistema
     * @return boolean
     */
    public function isValidHost($host) {
        if (array_search($host, $this->getEnabledHost()) !== false) {
            return true;
        }
        return false;
    }

    function getEnabledHost() {
        return $this->enabledHost;
    }
    
    
    /**
     * Funcion generica para serializar (convertir a array) y traducir elementos 
     * si es requerido
     * @param type $object el objeto a serializar
     * @param type $translate variable boolen default false,
     * si se envia true se analizaran los elementos del arreglo luego de serializarse para ser traducidos si es el caso.
     * @author Luis Fernando Granados 09/10/2017
     * @return array|[]
     */
    public function serializerAndTranslate($object, $translate = false) {

        $serializer = $this->container->get('jms_serializer');
        $arrayData = $serializer->toArray($object);

        /**
         * Pasamos el resultado a la funcion filterAndTranslateArrayQueyResult 
         * para traducir los atributos que se requieran 
         */
        if ($translate) {
            $arrayData = $this->filterAndTranslateArrayQueryResult($arrayData);
        }

        return $arrayData;
    }
    
    
    /**
     * Funcion que permite agregar el atributo path a las consultas manuales.
     * Pasando el array con los datos de la imagen
     * @param type $data array con los datos de la imagen
     * @param type $pathOnline path aws
     * @param type $pathLocal path local
     * @return array con el key path en su interior
     */
    public function addPathImage($data, $pathOnline, $pathLocal) {
        return Util::addPathImageInUtil($data, $pathOnline, $pathLocal);
    }

    public function errorResponse($request, $result) {

        $data = json_decode($result->getContent(), true);

        if (isset($data['errors'])) {
            return $this->setStatusCode($data['errors']['status'])
                            ->respondWithError($data['errors']['message']
                                    , $data['errors']['status']
                                    , $this->getMeta($request));
        }
    }
}
