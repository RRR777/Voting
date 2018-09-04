<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use App\Models\Nomination;
use App\Models\NominationUser;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Voting;
use App\Models\Category;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->all();

        if (Auth::user()->role_id == 4) {
            return view('categories.election_index', compact('categories'));
        }
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048'
        ]);
        
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            //get the name of the image
            $input['imagename'] = $image->getClientOriginalName();
            $data['image'] = $input['imagename'];
        }

        $categoryUpload = Category::create($data);

        if ($categoryUpload) {
            if ($request->file('image')) {
                //choose where to save it in our Laravel app
                $destinationPath = public_path('/storage/upload/images/categories/' . $categoryUpload->id . '/');
                $image->move($destinationPath, $input['imagename']);
            }
        }
        //$category = $this->categoryRepository->create($input);

        Flash::success('Category submitted successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $nominations = Nomination::where('category_id', $category->id)->get();
        $nominationSelecteds = Nomination::where('category_id', $category->id)
            ->where('is_admin_selected', 1)
            ->get();

        //check if this viewer has nominated someone in this category before
        // A user ca only nominate one person per category
        $hasNominatedBefore = 0;
        $nomination = 0;
        $nominationUser = NominationUser::where('user_id', Auth::user()->id)
            ->where('category_id', $id)->first();

        if ($nominationUser) {
            $hasNominatedBefore = 1;
            //get details the nomination they made
            $nomination = Nomination::find($nominationUser->nomination_id);

            Flash::success('You have already nominated some one in this category.');
        }

        //check if the user already voted in this category before?
        $checkVote = Voting::where('user_id', Auth::user()->id)
            ->where('category_id', $category->id)
            ->first();

        if ($checkVote) {
            Flash::success('You have already voted before.');
        }

        $nextCategory = Category::where('id', '>' ,$category->id)->first();
        $previousCategory = Category::where('id', '<' ,$category->id)->first();

        $totalNominees = Nomination::where('category_id', $category->id)->count();
        $totalSelectedNominees = Nomination::where('category_id', $category->id)
            ->where('is_admin_selected', '1')
            ->count();

        if (Auth::user()->role_id == 4) {
            return view('categories.election_show', compact(
                'category',
                'nomination',
                'hasNominatedBefore',
                'nominations',
                'nominationSelecteds',
                'checkVote',
                'nextCategory',
                'previousCategory'
            ));
        }
        return view('categories.show', compact(
            'category',
            'nomination',
            'hasNominatedBefore',
            'nominations',
            'nominationSelecteds',
            'checkVote',
            'nextCategory',
            'previousCategory',
            'totalNominees',
            'totalSelectedNominees'
        ));
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}
