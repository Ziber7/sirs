<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRuangAPIRequest;
use App\Http\Requests\API\UpdateRuangAPIRequest;
use App\Models\Ruang;
use App\Repositories\RuangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RuangController
 * @package App\Http\Controllers\API
 */

class RuangAPIController extends AppBaseController
{
    /** @var  RuangRepository */
    private $ruangRepository;

    public function __construct(RuangRepository $ruangRepo)
    {
        $this->ruangRepository = $ruangRepo;
    }

    /**
     * Display a listing of the Ruang.
     * GET|HEAD /ruangs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ruangs = $this->ruangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ruangs->toArray(), 'Ruangs retrieved successfully');
    }

    /**
     * Store a newly created Ruang in storage.
     * POST /ruangs
     *
     * @param CreateRuangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRuangAPIRequest $request)
    {
        $input = $request->all();

        $ruang = $this->ruangRepository->create($input);

        return $this->sendResponse($ruang->toArray(), 'Ruang saved successfully');
    }

    /**
     * Display the specified Ruang.
     * GET|HEAD /ruangs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ruang $ruang */
        $ruang = $this->ruangRepository->find($id);

        if (empty($ruang)) {
            return $this->sendError('Ruang not found');
        }

        return $this->sendResponse($ruang->toArray(), 'Ruang retrieved successfully');
    }

    /**
     * Update the specified Ruang in storage.
     * PUT/PATCH /ruangs/{id}
     *
     * @param int $id
     * @param UpdateRuangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRuangAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ruang $ruang */
        $ruang = $this->ruangRepository->find($id);

        if (empty($ruang)) {
            return $this->sendError('Ruang not found');
        }

        $ruang = $this->ruangRepository->update($input, $id);

        return $this->sendResponse($ruang->toArray(), 'Ruang updated successfully');
    }

    /**
     * Remove the specified Ruang from storage.
     * DELETE /ruangs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ruang $ruang */
        $ruang = $this->ruangRepository->find($id);

        if (empty($ruang)) {
            return $this->sendError('Ruang not found');
        }

        $ruang->delete();

        return $this->sendSuccess('Ruang deleted successfully');
    }
}
