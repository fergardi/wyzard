<?php

namespace Archmage\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Payum\Core\Request\GetHumanStatus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PurchaseController extends Controller
{
    /**
     * @Route("/game/purchase/prepare/{id}", requirements={"id" = "\d+"})
     */
    public function prepareAction($id = null)
    {
        $manager = $this->getDoctrine()->getManager();
        $pack = $manager->getRepository('ArchmagePaymentBundle:Pack')->find($id);

        if ($pack) {
            $gatewayName = 'paypal';
            $storage = $this->get('payum')->getStorage('Archmage\PaymentBundle\Entity\PaymentDetails');

            /** @var \Archmage\PaymentBundle\Entity\PaymentDetails $details */
            $details = $storage->create();
            $details['PAYMENTREQUEST_0_CURRENCYCODE'] = 'EUR';
            $details['PAYMENTREQUEST_0_AMT'] = $pack->getPrice();
            $details->setRunes($pack->getRunes());
            $storage->update($details);

            $captureToken = $this->get('payum.security.token_factory')->createCaptureToken(
                $gatewayName,
                $details,
                'archmage_payment_purchase_done'
            );
            return $this->redirect($captureToken->getTargetUrl());
        } else {
            $this->addFlash('danger', 'Ese Pack no existe!');
            return $this->redirect($this->generateUrl('archmage_game_kingdom_market'));
        }
    }

    /**
     * @Route("/game/purchase/done")
     */
    public function doneAction(Request $request)
    {
        $token = $this->get('payum.security.http_request_verifier')->verify($request);
        $gateway = $this->get('payum')->getGateway($token->getGatewayName());

        // you can invalidate the token. The url could not be requested any more.
        $this->get('payum.security.http_request_verifier')->invalidate($token);

        // or Payum can fetch the model for you while executing a request (Preferred).
        $gateway->execute($status = new GetHumanStatus($token));
        $details = $status->getFirstModel();

        //ladybug_dump_die($details);

        return new JsonResponse(array(
            'status' => $status->getValue(),
            'details' => iterator_to_array($details),
        ));
    }
}
