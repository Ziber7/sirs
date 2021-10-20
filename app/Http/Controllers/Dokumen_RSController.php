<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDokumen_RSRequest;
use App\Http\Requests\UpdateDokumen_RSRequest;
use App\Repositories\Dokumen_RSRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Dokumen_RSController extends AppBaseController
{
    /** @var  Dokumen_RSRepository */
    private $dokumenRSRepository;

    public function __construct(Dokumen_RSRepository $dokumenRSRepo)
    {
        $this->dokumenRSRepository = $dokumenRSRepo;
    }

    /**
     * Display a listing of the Dokumen_RS.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $dokumenRs = $this->dokumenRSRepository->all();

        return view('dokumen__rs.index')
            ->with('dokumenRs', $dokumenRs);
    }

    /**
     * Show the form for creating a new Dokumen_RS.
     *
     * @return Response
     */
    public function create()
    {
        return view('dokumen__rs.create');
    }

    /**
     * Store a newly created Dokumen_RS in storage.
     *
     * @param CreateDokumen_RSRequest $request
     *
     * @return Response
     */
    public function store(CreateDokumen_RSRequest $request)
    {
        $input = $request->all();

        $dokumenRS = $this->dokumenRSRepository->create($input);

        Flash::success('Dokumen  R S saved successfully.');

        return redirect(route('dokumenRs.index'));
    }

    /**
     * Display the specified Dokumen_RS.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dokumenRS = $this->dokumenRSRepository->find($id);

        if (empty($dokumenRS)) {
            Flash::error('Dokumen  R S not found');

            return redirect(route('dokumenRs.index'));
        }

        return view('dokumen__rs.show')->with('dokumenRS', $dokumenRS);
    }

    /**
     * Show the form for editing the specified Dokumen_RS.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dokumenRS = $this->dokumenRSRepository->find($id);

        if (empty($dokumenRS)) {
            Flash::error('Dokumen  R S not found');

            return redirect(route('dokumenRs.index'));
        }

        return view('dokumen__rs.edit')->with('dokumenRS', $dokumenRS);
    }

    /**
     * Update the specified Dokumen_RS in storage.
     *
     * @param int $id
     * @param UpdateDokumen_RSRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDokumen_RSRequest $request)
    {
        $dokumenRS = $this->dokumenRSRepository->find($id);

        if (empty($dokumenRS)) {
            Flash::error('Dokumen  R S not found');

            return redirect(route('dokumenRs.index'));
        }

        $dokumenRS = $this->dokumenRSRepository->update($request->all(), $id);

        Flash::success('Dokumen  R S updated successfully.');

        return redirect(route('dokumenRs.index'));
    }

    /**
     * Remove the specified Dokumen_RS from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dokumenRS = $this->dokumenRSRepository->find($id);

        if (empty($dokumenRS)) {
            Flash::error('Dokumen  R S not found');

            return redirect(route('dokumenRs.index'));
        }

        $this->dokumenRSRepository->delete($id);

        Flash::success('Dokumen  R S deleted successfully.');

        return redirect(route('dokumenRs.index'));
    }
}
