<?php


namespace App\UseCase\Trip;


use App\Entity\Trip;
use App\Repository\PointRepository;
use App\Repository\ServiceLocatorRepository;
use App\Repository\TripRepository;
use Symfony\Component\HttpFoundation\Request;

class UpdateTripUseCase
{

    private TripRepository $tripRepository;
    private PointRepository $pointRepository;
    private ServiceLocatorRepository $serviceLocatorRepository;

    public function __construct(
        TripRepository $tripRepository,
        PointRepository $pointRepository,
        ServiceLocatorRepository $serviceLocatorRepository
    ){
        $this->tripRepository           = $tripRepository;
        $this->pointRepository          = $pointRepository;
        $this->serviceLocatorRepository = $serviceLocatorRepository;
    }

    public function __invoke(string $id, Request $request): ?Trip
    {
        /** @var Trip $trip */
        $trip = $this->tripRepository->findOneBy(['id' => $id]);

        if(is_null($trip)){
            throw new \Exception('No se pudo actualizar por que el objeto no existe');
        }

        $data = json_decode($request->getContent(), true);

        if(key_exists('pickupPoint', $data) && empty(!$data['pickupPoint'])){
            $pickupPoint = $this->pointRepository->findOneBy(['id' => $data['pickupPoint']]);
            $trip->setPickupPoint($pickupPoint);
        }

        if(key_exists('destinationPoint', $data) && empty(!$data['destinationPoint'])){
            $destinationPoint = $this->pointRepository->findOneBy(['id' => $data['destinationPoint']]);
            $trip->setDestinationPoint($destinationPoint);
        }

        if(key_exists('serviceLocator', $data) && empty(!$data['serviceLocator'])){
            $serviceLocator = $this->serviceLocatorRepository->findOneBy(['id' => $data['serviceLocator']]);
            $trip->setServiceLocator($serviceLocator);
        }

        key_exists('typeVehicle', $data) && empty(!$data['typeVehicle']) ? $trip->setTypeVehicle($data['typeVehicle']) : true;

        return $this->tripRepository->update($trip);
    }
}