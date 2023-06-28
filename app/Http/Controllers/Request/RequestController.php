<?php

namespace App\Http\Controllers\Request;

use App\Http\Filters\RequestFilter;
use App\Http\Requests\Request\IndexRequest;
use App\Http\Requests\Request\StoreRequest;
use App\Http\Requests\Request\UpdateClientRequest;
use App\Http\Requests\Request\UpdateLawyerRequest;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RequestController extends BaseController
{
    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Database\Eloquent\Collection|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        if (Gate::allows('can-get-all-client-requests', Request::class)) {
            return $this->service->getAllClientRequests(Auth::user(), $request->validated());
        } elseif (Gate::allows('can-get-all-lawyer-requests', Request::class)) {
            return $this->service->getAllLawyerRequests(Auth::user(), $request->validated());
        }

        return response('Unauthorized', 403);
    }

    public function randomIndexClient(IndexRequest $request)
    {
        return $this->service->getRandomRequests(Auth::user(), $request->validated());
    }

    /**
     * @param RequestFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function filterIndex(RequestFilter $filter)
    {
        return $this->service->getAllLawyerRequestsByFilter(Auth::user(), $filter);
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        return $this->service->store(Auth::user(), $request->validated());
    }

    public function show()
    {
    }

    /**
     * @param Request $modelRequest
     * @param UpdateLawyerRequest $requestLawyer
     * @return bool|void
     */
    public function updateLawyer(Request $modelRequest, UpdateLawyerRequest $requestLawyer)
    {
        if (Gate::allows('can-lawyer-update-requests', Request::class)) {
            return $this->service->updateLawyerRequest(Auth::user(), $modelRequest, $requestLawyer->validated());
        }
    }

    /**
     * @param Request $modelRequest
     * @param UpdateClientRequest $requestClient
     * @return bool|void
     */
    public function updateClient(Request $modelRequest, UpdateClientRequest $requestClient)
    {
        if (Gate::allows('can-client-update-requests', Request::class)) {
            return $this->service->updateClientRequest($modelRequest, $requestClient->validated());
        }
    }

    public function destroy()
    {
    }
}
