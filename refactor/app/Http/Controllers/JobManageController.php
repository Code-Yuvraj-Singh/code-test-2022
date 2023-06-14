<?php
namespace DTApi\Http\Controllers;

use Illuminate\Http\Request;
use DTApi\Http\Services\Job\JobManageService;
use DTApi\Http\Controllers\Controller;

// This controller will deal with all the Job requests
class JobController extends Controller {

    // Initializing JobManage service
    public function __construct(protected JobManageService $service) {}

    /**
     * Reopen job
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function reopen(Request $request) {
        $response = $this->service->reopen($request);
        return response($response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getPotentialJobs(Request $request) {
        $response = $this->service->getPotentialJobs($request);
        return response($response);
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function customerNotCall(Request $request) {
        $response = $this->service->customerNotCall($request);
        return response($response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function endJob(Request $request) {
        $response = $this->service->endJob($request);
        return response($response);
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function cancelJob(Request $request) {
        $response = $this->service->cancelJobAjax($request);
        return response($response);
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function acceptJobWithId(Request $request) {
        $response = $this->service->acceptJobWithId($request);
        return response($response);
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function acceptJob(Request $request) {
        $response = $this->service->acceptJob($request);
        return response($response);
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getHistory(Request $request) {
        if(!$request->get('user_id')) return; 
        
        $response = $this->service->getUsersJobsHistory($request);
        return response($response);
        
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function immediateJobEmail(Request $request) {
        $response = $this->service->storeJobEmail($request);
        return response($response);
    }

}
