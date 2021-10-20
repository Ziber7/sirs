<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDokumen_RSAPIRequest;
use App\Http\Requests\API\UpdateDokumen_RSAPIRequest;
use App\Models\Dokumen_RS;
use App\Repositories\Dokumen_RSRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Dokumen_RSController
 * @package App\Http\Controllers\API
 */

class Dokumen_RSAPIController extends AppBaseController
{
    /** @var  Dokumen_RSRepository */
    private $dokumenRSRepository;

    public function __construct(Dokumen_RSRepository $dokumenRSRepo)
    {
        $this->dokumenRSRepository = $dokumenRSRepo;
    }

    /**
     * Display a listing of the Dokumen_RS.
     * GET|HEAD /dokumenRs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dokumenRs = $this->dokumenRSRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dokumenRs->toArray(), 'Dokumen  Rs retrieved successfully');
    }

    /**
     * Store a newly created Dokumen_RS in storage.
     * POST /dokumenRs
     *
     * @param CreateDokumen_RSAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDokumen_RSAPIRequest $request)
    {
        $input = $request->all();

        $dokumenRS = $this->dokumenRSRepository->create($input);

        return $this->sendResponse($dokumenRS->toArray(), 'Dokumen  R S saved successfully');
    }

    /**
     * Display the specified Dokumen_RS.
     * GET|HEAD /dokumenRs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dokumen_RS $dokumenRS */
        $dokumenRS = $this->dokumenRSRepository->find($id);

        if (empty($dokumenRS)) {
            return $this->sendError('Dokumen  R S not found');
        }

        return $this->sendResponse($dokumenRS->toArray(), 'Dokumen  R S retrieved successfully');
    }

    /**
     * Update the specified Dokumen_RS in storage.
     * PUT/PATCH /dokumenRs/{id}
     *
     * @param int $id
     * @param UpdateDokumen_RSAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDokumen_RSAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dokumen_RS $dokumenRS */
        $dokumenRS = $this->dokumenRSRepository->find($id);

        if (empty($dokumenRS)) {
            return $this->sendError('Dokumen  R S not found');
        }

        $dokumenRS = $this->dokumenRSRepository->update($input, $id);

        return $this->sendResponse($dokumenRS->toArray(), 'Dokumen_RS updated successfully');
    }

    /**
     * Remove the specified Dokumen_RS from storage.
     * DELETE /dokumenRs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dokumen_RS $dokumenRS */
        $dokumenRS = $this->dokumenRSRepository->find($id);

        if (empty($dokumenRS)) {
            return $this->sendError('Dokumen  R S not found');
        }

        $dokumenRS->delete();

        return $this->sendSuccess('Dokumen  R S deleted successfully');
    }
}
