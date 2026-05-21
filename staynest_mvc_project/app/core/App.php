<?php

class App
{

    public function run()
    {

        session_start();

        require_once "../config/database.php";

        require_once "../app/core/Database.php";
        require_once "../app/core/Model.php";
        require_once "../app/core/Controller.php";
        require_once "../app/core/Router.php";

        require_once "../app/models/User.php";
        require_once "../app/models/Property.php";
        require_once "../app/models/Booking.php";
        require_once "../app/models/Host.php";
        require_once "../app/models/Location.php";

        require_once "../app/controllers/HomeController.php";
        require_once "../app/controllers/AuthController.php";
        require_once "../app/controllers/DashboardController.php";
        require_once "../app/controllers/BookingController.php";
        require_once "../app/controllers/PropertyController.php";
        require_once "../app/controllers/HostController.php";
        require_once "../app/controllers/LocationController.php";
        require_once "../app/controllers/UserController.php";

        $router = new Router();

        require_once "../routes/web.php";

        $router->dispatch();

    }

}
?>