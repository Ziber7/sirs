<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRuangRequest;
use App\Http\Requests\UpdateRuangRequest;
use App\Repositories\RuangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RuangController extends AppBaseController
{
    /** @var  RuangRepository */
    private $ruangRepository;

    public function __construct(RuangRepository $ruangRepo)
    {
        $this->ruangRepository = $ruangRepo;
    }

    /**
     * Display a listing of the Ruang.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ruangs = $this->ruangRepository->all();

        return view('ruangs.index')
            ->with('ruangs', $ruangs);
    }

    /**
     * Show the form for creating a new Ruang.
     *
     * @return Response
     */
    public function create()
    {
        return view('ruangs.create');
    }

    /**
     * Store a newly created Ruang in storage.
     *
     * @param CreateRuangRequest $request
     *
     * @return Response
     */
    public function store(CreateRuangRequest $request)
    {
        $input = $request->all();

        $ruang = $this->ruangRepository->create($input);

        Flash::success('Ruang saved successfully.');

        return redirect(route('ruangs.index'));
    }

    /**
     * Display the specified Ruang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ruang = $this->ruangRepository->find($id);

        if (empty($ruang)) {
            Flash::error('Ruang not found');

            return redirect(route('ruangs.index'));
        }

        return view('ruangs.show')->with('ruang', $ruang);
    }

    /**
     * Show the form for editing the specified Ruang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ruang = $this->ruangRepository->find($id);

        if (empty($ruang)) {
            Flash::error('Ruang not found');

            return redirect(route('ruangs.index'));
        }

        return view('ruangs.edit')->with('ruang', $ruang);
    }

    /**
     * Update the specified Ruang in storage.
     *
     * @param int $id
     * @param UpdateRuangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRuangRequest $request)
    {
        $ruang = $this->ruangRepository->find($id);

        if (empty($ruang)) {
            Flash::error('Ruang not found');

            return redirect(route('ruangs.index'));
        }

        $ruang = $this->ruangRepository->update($request->all(), $id);

        Flash::success('Ruang updated successfully.');

        return redirect(route('ruangs.index'));
    }

    /**
     * Remove the specified Ruang from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ruang = $this->ruangRepository->find($id);

        if (empty($ruang)) {
            Flash::error('Ruang not found');

            return redirect(route('ruangs.index'));
        }

        $this->ruangRepository->delete($id);

        Flash::success('Ruang deleted successfully.');

        return redirect(route('ruangs.index'));
    }
}
