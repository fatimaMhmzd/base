<?php

namespace Modules\Setting\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Repositories\SettingRepository;
use Modules\Setting\Http\Requests\setting\ValidateSettingRequest;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class SettingService
{
    public function __construct(public SettingRepository $settingRepositoryy)
    {
    }

    public function index($request)
    {
        $filter = [];
        if ($request->title) {
            $filter[] = (object)[
                "col" => "title",
                "value" => $request->title,
                "like" => true,
            ];
        }
        $all = $this->settingRepositoryy->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->settingRepositoryy->getByInput();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_setting_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_setting_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('image', function ($row) {
                $img = '';
                if ($row->image) {
                    $img = '<img src="/' . $row->image->url. '" class="danger w-25"/>';
                }

                return $img;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);;
    }

    public function find($id)
    {
        return $this->settingRepositoryy->find($id);
    }

    public function delete($id)
    {
        $item = $this->settingRepositoryy->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->settingRepositoryy->delete($item);
                DB::commit();
                return $itemDeleted;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.delete_failed"));
            }
        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }
    }

    public function update(ValidateSettingRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->settingRepositoryy->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->settingRepositoryy->update($totalUnitItem, $inputs);
                DB::commit();
                return $totalUnitItemUpdated;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }
        $image = $inputs["file"] ?? null;
        if ($image !== null) {
            foreach ($image as $item){
                $this->uploadImage($totalUnitsItem, $item);
            }

        }
        return $totalUnitsItem;
    }

    public function store(ValidateSettingRequest $request)
    {
        $inputs = $request->validated();

        [
            'key'=>'value',
            'value'=>'value',
            'label'=>'value',
            'file'=>'value',
        ];

        Setting::query()->create($inputs);

        $exist = $this->settingRepositoryy->findBy("key", $inputs["key"]);
        if (!$exist) {

            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->settingRepositoryy->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }
        } else {
            throw new \Exception(trans("custom.publicContent.item_already_exist"));
        }

        $image = $inputs["file"] ?? null;
        if ($image !== null) {
            foreach ($image as $item){
                $this->uploadImage($totalUnitsItem, $item);
            }

        }
        return $totalUnitsItem;

    }


    public function all(): \Illuminate\Support\Collection
    {
        return $this->settingRepositoryy->getByInput();
    }
    public function allAsObjet(): stdClass
    {
        $settings = $this->all();
        $setting = new stdClass;
        foreach ($settings as $item) {
            $key = $item->key;
            $value = $item->value;
            $setting->$key = $value;
        }
        return $setting;
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/setting/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

}
