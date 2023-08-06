<?php

namespace Modules\Product\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Color\Services\ColorService;
use Modules\Comment\Entities\Comment;
use Modules\Polymorphism\Entities\Images;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Repositories\SuggestProductRepository;
use Modules\Product\Http\Requests\product\ValidateProductRequest;
use Modules\Product\Services\ProductGroupService;
use Modules\Product\Services\ProductService;
use Modules\Product\Services\SuggestService;
use Modules\Size\Entities\Size;
use Modules\Size\Services\SizeService;
use Modules\Unit\Services\UnitService;
use Yajra\DataTables\Facades\DataTables;

class ProductDashboardController extends Controller
{
    public function __construct(public ProductService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::dashboard.product.list');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $group = resolve(ProductGroupService::class)->all();
        $unit = resolve(UnitService::class)->all();
        $suggests = resolve(SuggestService::class)->all();
        return view('product::dashboard.product.add', compact('group' ,'unit','suggests'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidateProductRequest $request)
    {
        try {
            $result = $this->service->store($request);
            $message = trans("custom.defaults.store_success");
            return back()->with('success', true)->with('message', $message);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return back()->with('error', true)->with('message', $message);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showComments($id)
    {
        $comments = $this->service->find($id)->comments;
        return view('product::dashboard.product.comments' , compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = $this->service->productEditPage($id);
        return view('product::dashboard.product.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     */
    public function update(ValidateProductRequest $request, $id)
    {
        try {
             $this->service->update($request, $id);
            $message = trans("custom.defaults.update_success");
            return back()->with('success', true)->with('message', $message);

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return back()->with('error', true)->with('message', $message);

        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $this->service->delete($id);
            /* $message = "انجام شد";*/
            $message = trans("custom.defaults.delete_success");
            return back()->with('success', true)->with('message', $message);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return back()->with('error', true)->with('message', $message);
        }
    }

    public function ajax()
    {
        $data = $this->service->ajax();
        return $data;
    }
    public function deleteImage($id)
    {
        $data = Images::where('id',$id)->delete();
        return back()->with('success', true)->with('message', 'اطلاعات با حذف شد');
    }
    public function deleteComments($id)
    {
        $data = Comment::where('id',$id)->delete();
        return back();
    }
    public function statusComments($id,$status)
    {
        $data = Comment::query()->where('id',$id)->update(['status'=>$status]);
        return back();
    }
    public function status($id,$status)
    {
        $data = Product::query()->where('id',$id)->update(['status'=>$status]);
        return back();
    }

}
