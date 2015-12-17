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
            $details['METHOD'] = 'SetExpressCheckout';
            $details['ALLOWNOTE'] = '0';
            $details['CARTBORDERCOLOR'] = '3E444C';
            $details['LOCALECODE'] = 'ES';

            $details['PAYMENTREQUEST_0_PAYMENTACTION'] = 'Sale';
            $details['L_PAYMENTREQUEST_0_NAME0'] = 'Pack de Runas';
            $details['L_PAYMENTREQUEST_0_NUMBER0'] = $pack->getId();
            $details['L_PAYMENTREQUEST_0_DESC0'] = $pack->getRunes().' Runas';
            $details->setRunes($pack->getRunes());
            $details['L_PAYMENTREQUEST_0_AMT0'] = $pack->getPrice();
            $details['L_PAYMENTREQUEST_0_QTY0'] = 1;
            $details['PAYMENTREQUEST_0_ITEMAMT'] = $pack->getPrice();
            $details['PAYMENTREQUEST_0_TAXAMT'] = 0;
            /*
            $details['PAYMENTREQUEST_0_HANDLINGAMT'] = '0.00';
            $details['PAYMENTREQUEST_0_SHIPPINGAMT'] = '0.00';
            $details['PAYMENTREQUEST_0_SHIPDISCAMT'] = '-0.00';
            $details['PAYMENTREQUEST_0_INSURANCEAMT'] = '0.00';
            */
            $details['PAYMENTREQUEST_0_CURRENCYCODE'] = 'EUR';
            $details['PAYMENTREQUEST_0_AMT'] = $pack->getPrice();
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
        $manager = $this->getDoctrine()->getManager();

        $token = $this->get('payum.security.http_request_verifier')->verify($request);
        $gateway = $this->get('payum')->getGateway($token->getGatewayName());

        // you can invalidate the token. The url could not be requested any more.
        $this->get('payum.security.http_request_verifier')->invalidate($token);

        // or Payum can fetch the model for you while executing a request (Preferred).
        $gateway->execute($status = new GetHumanStatus($token));
        $details = $status->getModel();

        //ladybug_dump_die($details);

        if ($status->isCaptured()) {
            $runes = $details->getRunes();
            $player = $this->getUser()->getPlayer();
            $player->setRunes($player->getRunes() + $runes);
            $manager->persist($player);
            $manager->flush();
            $this->addFlash('success', 'Gracias por tu compra! Has recibido '.$runes.' <span class="label label-artifact">Runas</span>.');
        } else {
            $this->addFlash('danger', 'Ha ocurrido un error con la pasarela de pago, vuelve a intentarlo.');
        }

        /*
        return new JsonResponse(array(
            'status' => $status->getValue(),
            'details' => iterator_to_array($details),
        ));
        */
        return $this->redirect($this->generateUrl('archmage_game_kingdom_market'));
    }
}
