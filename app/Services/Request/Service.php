<?php

namespace App\Services\Request;

use App\Http\Filters\RequestFilter;
use App\Http\Resources\Request\RequestResource;
use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class Service
{

    /**
     * @param User $user
     * @param $params
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllClientRequests(User $user, $params)
    {
        $requests = $user->clientRequests()
            ->orderBy('created_at')
            ->limit($params['limit'])
            ->offset($params['offset'])
            ->get();

        return RequestResource::collection($requests);
    }

    /**
     * @param User $user
     * @param $data
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllLawyerRequests(User $user, $data)
    {
        $requests = $user->lawyerRequests()
            ->orWhere('status', Request::NEW)
            ->orderBy('created_at')
            ->limit($data['limit'])
            ->offset($data['offset'])
            ->get();

        return RequestResource::collection($requests);
    }

    /**
     * @param User $user
     * @param RequestFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllLawyerRequestsByFilter(User $user, RequestFilter $filter)
    {
        $requests = Request::filter($filter)->get();

        return RequestResource::collection($requests);
    }

    /**
     * @param User $authUser
     * @param $data
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getRandomRequests(User $authUser, $data)
    {
        $users = User::where('id', '!=', $authUser->id)
            ->orWhere('role_id', User::CLIENT)
            ->orderBy('created_at')
            ->inRandomOrder()
            ->limit($data['limit'])
            ->offset($data['offset'])
            ->get();

        $randomRequests = [];
        foreach ($users as $user) {
            /** @var User $user */
            if ($user->clientRequests()->first()) {
                array_push($randomRequests, $user->clientRequests()->first());
            }
        }

        $filteredArray = array_filter($randomRequests, function ($value) {
            return !empty($value);
        });

        return RequestResource::collection($filteredArray);
    }

    /**
     * @param User $user
     * @param $data
     * @return mixed
     */
    public function store(User $user, $data)
    {
        $image = $data['image'];
        if ($image) {
            $path = $image->store('images', 'public');
        }

        return Request::create([
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'client_id' => $user->id,
            'status' => Request::NEW,
            'img_path' => $path
        ]);
    }

    public function show()
    {
    }

    /**
     * @param User $user
     * @param Request $request
     * @param $data
     * @return bool
     */
    public function updateLawyerRequest(User $user, Request $request, $data)
    {
        return $request->update([
            'answer' => $data['answer'],
            'lawyer_id' => $user->id,
            'status' => Request::PENDING
        ]);
    }

    /**
     * @param Request $request
     * @param $data
     * @return bool
     */
    public function updateClientRequest(Request $request, $data)
    {
        return $request->update([
            'status' => Request::COMPLETED,
            'comment' => $data['comment']
        ]);
    }

    public function destroy()
    {
    }
}
