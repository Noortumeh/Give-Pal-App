<?php

namespace App\Http\Controllers;

use App\Http\Requests\{SectionContentRequest, SectionRequest};
use App\Http\Resources\ContentHomeResource;
use App\Models\Sections;
use Exception;

class SectionsController extends Controller
{
    public function getSectionsData()
    {
        try {
            $content = ContentHomeResource::collection(
                Sections::whereNull('parent_id')
                    ->where('active', true)
                    ->with('childrenRecursive')
                    ->get()
            );
            if ($content) {
                return response()->json(['message: ' => 'Returned Sections Content Successfuly', 'data' => $content], 200);
            }
            return response()->json(['message: ' => 'There is no Content'], 404);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function addSections(SectionRequest $request)
    {
        try {
            $section = $request->validated();
            Sections::create($section);

            return response()->json(['message: ' => 'Section Created Successfuly', 'data: ' => $section], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function addSectionContent(SectionContentRequest $request)
    {
        try {
            $content = $request->validated();
            $parent = Sections::where('section', $content['section'])->where('type', 'section')->firstOrFail();
            $content['parent_id'] = $parent->id;
            Sections::create($content);

            return response()->json(['message: ' => 'Section Content Created Successfuly', 'data: ' => $content], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function deleteSection($id)
    {
        try {
            $section = Sections::find($id);
            $section->active = false;
            $section->save();
            $section->delete();

            return response()->json(['message: ' => 'Section Deleted Successfuly', 'Section Deleted: ' => $section], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
}
