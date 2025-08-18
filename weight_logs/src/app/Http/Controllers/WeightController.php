<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class WeightController extends Controller
{ 

    public function log()
    {
        $weight_logs = WeightLog::all();
        $perPage = 8;
        $page = Paginator::resolveCurrentPage('page');
        $pageData = $weight_logs->slice(($page -1) * $perPage, $perPage);
        $options = [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'Page'
        ];

        $weight_logs = new LengthAwarePaginator($pageData, $weight_logs->count(),$perPage,$page,$options);

        return view('log', compact('weight_logs'));

        $weight_targets = new LengthAwarePaginator($pageData, $weight_targets->count(),$perPage,$page,$options);

        return $weight_targets->orderBy('created_at','weight')->take($count);
        return view('log', compact('weight_targets'));
    }

    public function search(Request $request)
    {
        if ($request->has('reset')) {
            return redirect('/weight_logs')->withInput();
        }
        $query = WeightLog::query();

        $query = $this->getSearchQuery($request, $query);

        $WeightLogs = $query->paginate(7);
        $csvData = $query->get();
        $weight_targets = WeightTarget::all();
        return view('/weight_logs/search', compact('WeightLog', 'weight_targets', 'csvData'));
    }

    public function getId()
    {
        return view('detail');
    }

    public function store(WeightRequest $request,
    CreatesNewUsers $creator): WeightResponse
    {
        event(new Registered($user = $creator->create($request->all())));

        $this->guard->login($user);

        return app(WeightResponse::class);
    }

    public function postDelete($user_id)
    {
        $weight_logs = WeightLog::find($user_id);
        $weight_logs->delete();
        WeightLog::find($request->id)->delete();
        return redirect('/Weight_logs')->with(compact('weight_logs','message'));
    }


    public function postUpdate(WeightRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/weight_logs');
    }

    public function postCreate(WeightRequest $request)
    {
        $form = $request->all();
        Author::create($form);
        return redirect('/weight_logs');
    }

    public function postGoal()
    {
        return redirect('/weight_logs');
    }
}
