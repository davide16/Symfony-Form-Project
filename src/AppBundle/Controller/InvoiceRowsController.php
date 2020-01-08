<?php
// src/AppBundle/Controller/InvoiceRowsController.php
namespace AppBundle\Controller;

use AppBundle\Entity\InvoiceRows;
use AppBundle\Form\InvoiceRowsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceRowsController extends Controller
{
    /**
     * @Route("/invoiceRows", name="create_invoice_rows")
     */
    public function registerAction(Request $request)
    {
        // 1) build the form
        $invoice_rows= new InvoiceRows();
        $form = $this->createForm(InvoiceRowsType::class, $invoice_rows);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) save the rows of the invoice!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invoice_rows);
            $entityManager->flush();

            // return in the first invoice page


            return $this->redirectToRoute('create_invoice');
        }

        return $this->render(
            'registration/invoiceRows.html.twig',
            ['form' => $form->createView()]
        );
    }
}
