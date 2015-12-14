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
     * @Route("/game/purchase/prepare")
     */
    public function prepareAction()
    {
        $gatewayName = 'paypal';

        $storage = $this->get('payum')->getStorage('Archmage\PaymentBundle\Entity\PaymentDetails');

        /** @var \Archmage\PaymentBundle\Entity\PaymentDetails $details */
        $details = $storage->create();
        $details['PAYMENTREQUEST_0_CURRENCYCODE'] = 'USD';
        $details['PAYMENTREQUEST_0_AMT'] = 1.23;
        $storage->update($details);

        $captureToken = $this->get('payum.security.token_factory')->createCaptureToken(
            $gatewayName,
            $details,
            'archmage_payment_purchase_done' // the route to redirect after capture;
        );

        return $this->redirect($captureToken->getTargetUrl());
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

        // Once you have token you can get the model from the storage directly.
        //$identity = $token->getDetails();
        //$payment = $payum->getStorage($identity->getClass())->find($identity);

        // or Payum can fetch the model for you while executing a request (Preferred).
        $gateway->execute($status = new GetHumanStatus($token));
        $details = $status->getFirstModel();

        // you have order and payment status
        // so you can do whatever you want for example you can just print status and payment details.

        return new JsonResponse(array(
            'status' => $status->getValue(),
            'details' => iterator_to_array($details),
        ));
    }
}
