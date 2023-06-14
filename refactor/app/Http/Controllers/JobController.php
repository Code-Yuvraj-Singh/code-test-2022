<?php

namespace DTApi\Http\Controllers;

use DTApi\Http\Services\Job\JobService;
use DTApi\Http\Controllers\Controller;
use DTApi\Http\Services\ModelService;

class JobController extends Controller {

    // Initializing JobManage service
    public function __construct(protected JobService $service) {}
    
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        if (!$request->get('user_id')) {
            $response = $this->service->getUsersJobs($request);
        } else if (
            $request->__authenticatedUser->user_type == env('ADMIN_ROLE_ID') || 
            $request->__authenticatedUser->user_type == env('SUPERADMIN_ROLE_ID')
        ) {
            $response = $this->service->getAll($request);
        }

        return response($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function show(int $id) {
        $job = $this->service->show($id);
        return response($job);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request) {
        $response = $this->service->store($request);
        return response($response);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $cuser = $request->__authenticatedUser;
        $response = $this->service->updateJob($id, array_except($data, ['_token', 'submit']), $cuser);

        return response($response);
    }
}