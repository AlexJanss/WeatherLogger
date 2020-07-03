<?php

namespace App\Controller;

use App\Entity\WeatherData;
use App\Form\WeatherDataType;
use App\Repository\WeatherDataRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/weather/data")
 */
class WeatherDataController extends AbstractController
{
    /**
     * @Route("/", name="weather_data_index", methods={"GET"})
     */
    public function index(WeatherDataRepository $weatherDataRepository): Response
    {
        return $this->render('weather_data/index.html.twig', [
            'weather_datas' => $weatherDataRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="weather_data_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $weatherDatum = new WeatherData();
        $form = $this->createForm(WeatherDataType::class, $weatherDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($weatherDatum);
            $entityManager->flush();

            return $this->redirectToRoute('weather_data_index');
        }

        return $this->render('weather_data/new.html.twig', [
            'weather_datum' => $weatherDatum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="weather_data_show", methods={"GET"})
     */
    public function show(WeatherData $weatherDatum): Response
    {
        return $this->render('weather_data/show.html.twig', [
            'weather_datum' => $weatherDatum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="weather_data_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, WeatherData $weatherDatum): Response
    {
        $form = $this->createForm(WeatherDataType::class, $weatherDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('weather_data_index');
        }

        return $this->render('weather_data/edit.html.twig', [
            'weather_datum' => $weatherDatum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="weather_data_delete", methods={"DELETE"})
     */
    public function delete(Request $request, WeatherData $weatherDatum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$weatherDatum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($weatherDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('weather_data_index');
    }
}
