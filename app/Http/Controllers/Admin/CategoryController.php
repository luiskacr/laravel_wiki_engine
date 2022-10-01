<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $categories = Category::all()->whereNotIn('id',1);

        return view('Admin.Category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();
        try{
            $categoryOrder = Category::all()->sortByDesc('position')->take(1);

            $newPosition = $categoryOrder->firstOrFail()->position + 10;

            $cateory = Category::create([
                'name'=> $request->request->get('name'),
                'parent_id' => 1,
                'is_enable' => 1,
                'position' => $newPosition,
            ]);

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->route('category.create')->with('error',$e->getMessage());
        }

        return redirect()->route('category.index')->with('success','Permission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('Admin.Category.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('Admin.Category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        DB::beginTransaction();
        try{

            $isActive = $request->request->get('active') == 'on' ? true : false;

            Category::whereId($id)->update([
                'name' => $request->request->get('name'),
                'is_enable'=>$isActive
            ]);

            DB::commit();
        }catch (\Exception $e){

            DB::rollback();

            return redirect()->route('category.edit',$id)->with('error',$e->getMessage());
        }
        return redirect()->route('category.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $categories = Category::all()->whereNotIn('id',1);

            foreach ($categories as $category)
            {
                if($category->id >= $id)
                {
                    if($category->id == $id)
                    {
                        $oldPosition = $category->position;
                        $category->delete();
                    }
                    else
                    {
                        $oldPosition = $oldPosition + 10;

                        $category->update([
                            'position' => $oldPosition
                        ]);
                    }
                }
            }
            DB::commit();
        }catch (\Exception $e){

            DB::rollback();

            return redirect()->route('category.edit',$id)->with('error',$e->getMessage());
        }
        return redirect()->route('category.index')->with('success','Category updated successfully');

    }

    // Sub Categories Options
}
