<?php


namespace App\UseCase\Trip;


use App\Entity\ServiceLocator;
use App\Entity\Trip;
use App\Repository\PointRepository;
use App\Repository\ServiceLocatorRepository;
use App\Repository\TripRepository;

class CreateTripUseCase
{

    private TripRepository $tripRepository;
    private ServiceLocatorRepository $serviceLocatorRepository;
    private PointRepository $pointRepository;

    public function __construct(
        TripRepository $tripRepository,
        ServiceLocatorRepository $serviceLocatorRepository,
        PointRepository $pointRepository
    ){
        $this->tripRepository           = $tripRepository;
        $this->serviceLocatorRepository = $serviceLocatorRepository;
        $this->pointRepository          = $pointRepository;
    }

    public function __invoke($data): ?Trip
    {
        /** @var Trip $trip */
        $trip = new Trip();

        if(key_exists('pickupPoint', $data) && empty(!$data['pickupPoint'])){
            $pickupPoint = $this->pointRepository->findOneBy(['id' => $data['pickupPoint']]);

            if(is_null($pickupPoint)){
                throw new \Exception('No se puede añadir, el punto de recogida no existe.');
            }
            $trip->setPickupPoint($pickupPoint);
        }

        if(key_exists('destinationPoint', $data) && empty(!$data['destinationPoint'])){
            $destinationPoint = $this->pointRepository->findOneBy(['id' => $data['destinationPoint']]);
            if(is_null($destinationPoint)){
                throw new \Exception('No se puede añadir, el punto de destino no existe.');
            }
            $trip->setDestinationPoint($destinationPoint);
        }

        if(key_exists('serviceLocator', $data) && empty(!$data['serviceLocator'])){
            $serviceLocator = $this->serviceLocatorRepository->findOneBy(['id' => $data['serviceLocator']]);
            if(is_null($serviceLocator)){
                throw new \Exception('No se puede añadir, no existe el localizador de servicio.');
            }

            $trip->setServiceLocator($serviceLocator);
        }else{
            $serviceLocator = new ServiceLocator();
            $serviceLocator->setName(sprintf("autogenerado_%s", rand(1, 999)));
            $this->serviceLocatorRepository->addServiceLocator($serviceLocator);
            $trip->setServiceLocator($serviceLocator);
        }

        key_exists('typeVehicle', $data) && empty(!$data['typeVehicle']) ? $trip->setTypeVehicle($data['typeVehicle']) : true;

        $this->tripRepository->addTrip($trip, true);

        return $trip;
    }
}