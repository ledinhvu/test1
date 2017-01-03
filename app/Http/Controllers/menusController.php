<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemenusRequest;
use App\Http\Requests\UpdatemenusRequest;
use App\Repositories\menusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class menusController extends AppBaseController
{
    /** @var  menusRepository */
    private $menusRepository;

    public function __construct(menusRepository $menusRepo)
    {
        $this->menusRepository = $menusRepo;
    }

    /**
     * Display a listing of the menus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->menusRepository->pushCriteria(new RequestCriteria($request));
        $menuses = $this->menusRepository->all();

        return view('menuses.index')
            ->with('menuses', $menuses);
    }

    /**
     * Show the form for creating a new menus.
     *
     * @return Response
     */
    public function create()
    {
        return view('menuses.create');
    }

    /**
     * Store a newly created menus in storage.
     *
     * @param CreatemenusRequest $request
     *
     * @return Response
     */
    public function store(CreatemenusRequest $request)
    {
        $input = $request->all();

        $menus = $this->menusRepository->create($input);

        Flash::success('Menus saved successfully.');

        return redirect(route('menuses.index'));
    }

    /**
     * Display the specified menus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menus = $this->menusRepository->findWithoutFail($id);

        if (empty($menus)) {
            Flash::error('Menus not found');

            return redirect(route('menuses.index'));
        }

        return view('menuses.show')->with('menus', $menus);
    }

    /**
     * Show the form for editing the specified menus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menus = $this->menusRepository->findWithoutFail($id);

        if (empty($menus)) {
            Flash::error('Menus not found');

            return redirect(route('menuses.index'));
        }

        return view('menuses.edit')->with('menus', $menus);
    }

    /**
     * Update the specified menus in storage.
     *
     * @param  int              $id
     * @param UpdatemenusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemenusRequest $request)
    {
        $menus = $this->menusRepository->findWithoutFail($id);

        if (empty($menus)) {
            Flash::error('Menus not found');

            return redirect(route('menuses.index'));
        }

        $menus = $this->menusRepository->update($request->all(), $id);

        Flash::success('Menus updated successfully.');

        return redirect(route('menuses.index'));
    }

    /**
     * Remove the specified menus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menus = $this->menusRepository->findWithoutFail($id);

        if (empty($menus)) {
            Flash::error('Menus not found');

            return redirect(route('menuses.index'));
        }

        $this->menusRepository->delete($id);

        Flash::success('Menus deleted successfully.');

        return redirect(route('menuses.index'));
    }
}
