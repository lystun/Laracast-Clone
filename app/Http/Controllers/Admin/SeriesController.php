<?php

namespace LaracastClone\Http\Controllers\Admin;

use LaracastClone\Http\Controllers\Controller;
use LaracastClone\Http\Requests\CreateSeriesRequest;
use LaracastClone\Http\Requests\UpdateSeriesRequest;
use LaracastClone\Series;
use Illuminate\Http\Request;

/**
 * @property string fileName
 */
class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Series::all();
        return view('admin.series.all', ['series'=>$series]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSeriesRequest $request)
    {

        return $request->uploadSeriesImage()->storeSeries();

    }

    /**
     * Display the specified resource.
     *
     * @param  \LaracastClone\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        return view('admin.series.index')->withSeries($series);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LaracastClone\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        return view('admin.series.edit', ['series'=> $series]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \LaracastClone\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeriesRequest $request, Series $series)
    {

        $request->updateSeries($series);

        session()->flash('success', 'Series Updated Successfully');

        return redirect()->route('series.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LaracastClone\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        //
    }
}
