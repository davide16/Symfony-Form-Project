<?php
// src/AppBundle/Controller/InvoiceController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Invoice;
use AppBundle\Form\InvoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends Controller
{
    /**
     * @Route("/invoice", name="create_invoice")
     */
    public function registerAction(Request $request)
    {
        // 1) build the form
        $invoice = new Invoice();
        $form = $this->createForm(InvoiceType::class, $invoice);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) save the invoice!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invoice);
            $entityManager->flush();

            // redirect to next part of the form to create invoice rows
           

            return $this->redirectToRoute('create_invoice_rows'); 
        }

        return $this->render(
            'registration/register.html.twig',
            ['form' => $form->createView()]
        );
    }
}
