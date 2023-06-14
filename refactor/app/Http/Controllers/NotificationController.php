<?php
namespace DTApi\Http\Controllers;

use DTApi\Http\Services\NotificationService;
use Illuminate\Http\Request;


// This controller will deal with all the Notification requests
class NotificationController extends Controller {

    // Initializing Notification service
    public function __construct(protected NotificationService $service) {}

    /**
     * Sends SMS to Translator
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function resendSMSNotifications(Request $request) {
        $response = $this->service->resendSMSNotifications($request);
        return response($response);
    }
    
    
    /**
     * Resend notifications to Translator
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function resendNotifications(Request $request)
    {
        $response = $this->service->resendNotifications($request);
        return response($response);
    }

}
