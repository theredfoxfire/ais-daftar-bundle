<?php

namespace Ais\DaftarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Ais\DaftarBundle\Exception\InvalidFormException;
use Ais\DaftarBundle\Form\DaftarType;
use Ais\DaftarBundle\Model\DaftarInterface;


class DaftarController extends FOSRestController
{
    /**
     * List all daftars.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing daftars.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many daftars to return.")
     *
     * @Annotations\View(
     *  templateVar="daftars"
     * )
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getDaftarsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 0 : $offset;
        $limit = $paramFetcher->get('limit');

        return $this->container->get('ais_daftar.daftar.handler')->all($limit, $offset);
    }

    /**
     * Get single Daftar.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a Daftar for a given id",
     *   output = "Ais\DaftarBundle\Entity\Daftar",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the daftar is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="daftar")
     *
     * @param int     $id      the daftar id
     *
     * @return array
     *
     * @throws NotFoundHttpException when daftar not exist
     */
    public function getDaftarAction($id)
    {
        $daftar = $this->getOr404($id);

        return $daftar;
    }

    /**
     * Presents the form to use to create a new daftar.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View(
     *  templateVar = "form"
     * )
     *
     * @return FormTypeInterface
     */
    public function newDaftarAction()
    {
        return $this->createForm(new DaftarType());
    }
    
    /**
     * Presents the form to use to edit daftar.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "AisDaftarBundle:Daftar:editDaftar.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the daftar id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when daftar not exist
     */
    public function editDaftarAction($id)
    {
		$daftar = $this->getDaftarAction($id);
		
        return array('form' => $this->createForm(new DaftarType(), $daftar), 'daftar' => $daftar);
    }

    /**
     * Create a Daftar from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new daftar from the submitted data.",
     *   input = "Ais\DaftarBundle\Form\DaftarType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "AisDaftarBundle:Daftar:newDaftar.html.twig",
     *  statusCode = Codes::HTTP_BAD_REQUEST,
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|View
     */
    public function postDaftarAction(Request $request)
    {
        try {
            $newDaftar = $this->container->get('ais_daftar.daftar.handler')->post(
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $newDaftar->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_daftar', $routeOptions, Codes::HTTP_CREATED);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Update existing daftar from the submitted data or create a new daftar at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Ais\DaftarBundle\Form\DaftarType",
     *   statusCodes = {
     *     201 = "Returned when the Daftar is created",
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "AisDaftarBundle:Daftar:editDaftar.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the daftar id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when daftar not exist
     */
    public function putDaftarAction(Request $request, $id)
    {
        try {
            if (!($daftar = $this->container->get('ais_daftar.daftar.handler')->get($id))) {
                $statusCode = Codes::HTTP_CREATED;
                $daftar = $this->container->get('ais_daftar.daftar.handler')->post(
                    $request->request->all()
                );
            } else {
                $statusCode = Codes::HTTP_NO_CONTENT;
                $daftar = $this->container->get('ais_daftar.daftar.handler')->put(
                    $daftar,
                    $request->request->all()
                );
            }

            $routeOptions = array(
                'id' => $daftar->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_daftar', $routeOptions, $statusCode);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Update existing daftar from the submitted data or create a new daftar at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Ais\DaftarBundle\Form\DaftarType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "AisDaftarBundle:Daftar:editDaftar.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the daftar id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when daftar not exist
     */
    public function patchDaftarAction(Request $request, $id)
    {
        try {
            $daftar = $this->container->get('ais_daftar.daftar.handler')->patch(
                $this->getOr404($id),
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $daftar->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_daftar', $routeOptions, Codes::HTTP_NO_CONTENT);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Fetch a Daftar or throw an 404 Exception.
     *
     * @param mixed $id
     *
     * @return DaftarInterface
     *
     * @throws NotFoundHttpException
     */
    protected function getOr404($id)
    {
        if (!($daftar = $this->container->get('ais_daftar.daftar.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }

        return $daftar;
    }
    
    public function postUpdateDaftarAction(Request $request, $id)
    {
		try {
            $daftar = $this->container->get('ais_daftar.daftar.handler')->patch(
                $this->getOr404($id),
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $daftar->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_daftar', $routeOptions, Codes::HTTP_NO_CONTENT);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
	}
}
