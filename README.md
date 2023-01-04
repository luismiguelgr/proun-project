# proun-project
Api Proun

Correr el comando: docker-compose up -d b--build
Una vez finalice todo el proceso anterior entrar en la consola de docker: docker exec -it proun-php bash
			
Una vez metido en la terminal ejecutar los siguientes comandos en orden: php bin/console doctrine:database:create 
 									 bin/console make:migration 
									 bin/console doctrine:migrations:migrate

También correr el siguiente comando para tener algunos datos: php bin/console doctrine:fixtures:load

Rutas disponibles:                        
		sonata_admin_dashboard                     ANY      ANY      ANY    /admin/dashboard 
		index                                      ANY      ANY      ANY    /                                                   
		register                                   POST     ANY      ANY    /register                                           
		api_login_check                            POST     ANY      ANY    /api/login_check                                    
		get_all_trips                              GET      ANY      ANY    /api/trips                                          
		get_trip_by_uuid                           GET      ANY      ANY    /api/trip/{id}                                      
		get_trip_by_pickup_point                   GET      ANY      ANY    /api/trip/pickup_point/{id}                         
		get_trip_by_destination_point              GET      ANY      ANY    /api/trip/destination_point/{id}                    
		get_trip_by_service_locator                GET      ANY      ANY    /api/trip/service_locator/{id}                      
		get_trip_by_type_vehicle                   GET      ANY      ANY    /api/trip/type_vehicle/{id}                         
		add_trip                                   POST     ANY      ANY    /api/trip/add                                       
		delete_trip                                DELETE   ANY      ANY    /api/trip/{id}                                      
		update_trip                                PUT      ANY      ANY    /api/trip/{id}                                      
		get_all_points                             GET      ANY      ANY    /api/points 
