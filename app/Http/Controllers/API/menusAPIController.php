<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemenusAPIRequest;
use App\Http\Requests\API\UpdatemenusAPIRequest;
use App\Models\menus;
use App\Repositories\menusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class menusController
 * @package App\Http\Controllers\API
 */

class menusAPIController extends AppBaseController
{
    /** @var  menusRepository */
    private $menusRepository;

    public function __construct(menusRepository $menusRepo)
    {
        $this->menusRepository = $menusRepo;
    }

    /**
     * Display a listing of the menus.
     * GET|HEAD /menuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->menusRepository->pushCriteria(new RequestCriteria($request));
        $this->menusRepository->pushCriteria(new LimitOffsetCriteria($request));
        $menuses = $this->menusRepository->all();

        return $this->sendResponse($menuses->toArray(), 'Menuses retrieved successfully');
    }

    /**
     * Store a newly created menus in storage.
     * POST /menuses
     *
     * @param CreatemenusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemenusAPIRequest $request)
    {
        $input = $request->all();

        $menuses = $this->menusRepository->create($input);

        return $this->sendResponse($menuses->toArray(), 'Menus saved successfully');
    }

    /**
     * Display the specified menus.
     * GET|HEAD /menuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var menus $menus */
        $menus = $this->menusRepository->findWithoutFail($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        return $this->sendResponse($menus->toArray(), 'Menus retrieved successfully');
    }

    /**
     * Update the specified menus in storage.
     * PUT/PATCH /menuses/{id}
     *
     * @param  int $id
     * @param UpdatemenusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemenusAPIRequest $request)
    {
        $input = $request->all();

        /** @var menus $menus */
        $menus = $this->menusRepository->findWithoutFail($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        $menus = $this->menusRepository->update($input, $id);

        return $this->sendResponse($menus->toArray(), 'menus updated successfully');
    }

    /**
     * Remove the specified menus from storage.
     * DELETE /menuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var menus $menus */
        $menus = $this->menusRepository->findWithoutFail($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        $menus->delete();

        return $this->sendResponse($id, 'Menus deleted successfully');
    }
}
