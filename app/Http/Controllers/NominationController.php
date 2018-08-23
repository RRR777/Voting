<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateNominationRequest;
use App\Http\Requests\UpdateNominationRequest;
use App\Models\Nomination;
use App\Models\NominationUser;
use App\Repositories\NominationRepository;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Voting;

class NominationController extends AppBaseController
{
    /** @var  NominationRepository */
    private $nominationRepository;

    public function __construct(NominationRepository $nominationRepo)
    {
        $this->nominationRepository = $nominationRepo;
    }

    /**
     * Display a listing of the Nomination.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nominationRepository->pushCriteria(new RequestCriteria($request));
        $nominations = $this->nominationRepository->all();

        return view('nominations.index')
            ->with('nominations', $nominations);
    }

    /**
     * Show the form for creating a new Nomination.
     *
     * @return Response
     */
    public function create()
    {
        return view('nominations.create');
    }

    /**
     * Store a newly created Nomination in storage.
     *
     * @param CreateNominationRequest $request
     *
     * @return Response
     */
    public function store(CreateNominationRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        //check database if nomination already exist, then add 1
        $nominationsCheck = Nomination::where('name', $request->input('name'))->first();
        if ($nominationsCheck) {
            if ($nominationsCheck->user_id != Auth::user()->id) {
                $no_of_nominations = $nominationsCheck->no_of_nominations;
                $input['no_of_nominations'] = $no_of_nominations + 1;
                $this->nominationRepository->
                    update(['no_of_nominations' => $input['no_of_nominations']], $nominationsCheck->id);

                NominationUser::create([
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->input('category_id'),
                    'nomination_id' => $nominationsCheck->id,

                ]);
            } else {
                Flash::success('This nomination already exist.');
            }
        } else {
            $input['no_of_nominations'] = 1;
            $nomination = $this->nominationRepository->create($input);

            NominationUser::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->input('category_id'),
                'nomination_id' => $nomination->id,
            ]);
        }

        Flash::success('Nomination submited successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Nomination.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        return view('nominations.show')->with('nomination', $nomination);
    }

    /**
     * Show the form for editing the specified Nomination.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        return view('nominations.edit')->with('nomination', $nomination);
    }

    /**
     * Update the specified Nomination in storage.
     *
     * @param  int              $id
     * @param UpdateNominationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNominationRequest $request)
    {
        $category_id = $request->category_id;
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        $nomination = $this->nominationRepository->update($request->all(), $id);

        Flash::success('Nomination updated successfully.');

        return redirect(route('categories.show', compact('category_id')));
    }

    /**
     * Remove the specified Nomination from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        $this->nominationRepository->delete($id);

        Flash::success('Nomination deleted successfully.');

        return redirect(route('nominations.index'));
    }

    public function vote(Request $request)
    {
        //create vote
        //update nomination vote count
        //redirect
        if (Auth::check()) {
            //check if the user already voted?
            $checkVote = Voting::where('user_id', Auth::user()->id)
                ->where('nomination_id', $request->nomination_id)
                ->where('category_id', $request->category_id)
                ->first();
            if ($checkVote) {
                Flash::success('You have already voted before.');

                return redirect()->back();
            } else {
                $voting = Voting::create([
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'nomination_id' => $request->nomination_id,
                ]);

                $getNomination = Nomination::where('id', $request->nomination_id)->first();

                
                $nomination = Nomination::where('id', $request->nomination_id)->update([
                    'no_of_votes' => $getNomination->no_of_votes + 1,
                ]);

                if ($nomination) {
                    Flash::success('You have voted succesfully.');

                    return redirect()->back();
                }
            }
        }
    }
}
