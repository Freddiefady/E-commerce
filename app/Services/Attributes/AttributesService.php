<?php

namespace App\Services\Attributes;

use App\Repositories\Attributes\AttributesRepository;
use App\Repositories\Attributes\AttributeValuesRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AttributesService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AttributesRepository $attributesRepository,
        protected AttributeValuesRepository $attributeValuesRepository
    ) {
        //
    }

    public function getAttrById(string $id)
    {
        $attr = $this->attributesRepository->getAttrById($id);
        return $attr ?? abort(404, 'Attributes Not Found.');
    }

    public function getBrandsForDataTables()
    {
        $attr = $this->attributesRepository->getAttributes();

        return DataTables::of($attr)
            ->addIndexColumn()
            ->addColumn('name', function ($item) {
                return $item->getTranslation('name', app()->getLocale());
            })
            ->addColumn('attributeValues', function ($item) {
                return view('dashboard.attributes.datatables.attribute-value', compact('item'));
            })
            ->addColumn('action', function ($item) {
                return view('dashboard.attributes.datatables.yajra-action', compact('item'));
            })
            ->make(true);
    }

    public function createAttr(array $data)
    {
        try {
            DB::beginTransaction();
            $attribute = $this->attributesRepository->createAttribute($data);

            foreach ($data['value'] as $value) {
                $this->attributeValuesRepository->createAttributeValues($attribute, $value);
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("create attribute products failed " . $e->getMessage());
            return false;
        }
    }

    public function updateAttr($data, $id)
    {
        try {
        $attribute = self::getAttrById($id);
        DB::beginTransaction();

        $this->attributesRepository->updateAttribute($attribute, $data);
        $this->attributeValuesRepository->destroyAttributeValues($attribute);

        foreach ($data['value'] as $key => $value) {
            $this->attributeValuesRepository->updateAttributeValues($attribute, $key, $value);
        }
        DB::commit();
        return true;
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error("update attribute products failed " . $e->getMessage());
        return false;
        }
    }
    public function deleteAttr($id)
    {
        if (! $attribute = self::getAttrById($id)) {
            return false;
        }
        return $this->attributesRepository->destroyAttribute($attribute);
    }
}
