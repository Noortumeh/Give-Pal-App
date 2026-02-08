<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use App\Facades\{ResponseMessage, StoreFile};
use App\Http\Requests\{SectionContentRequest, SectionRequest};
use App\Http\Resources\ContentHomeResource;
use App\Models\Sections;
use Exception;

class ContentHomeService
{
    public function getSectionsData()
    {
        try {
            $content = ContentHomeResource::collection(
                Sections::whereNull('parent_id')
                    ->where('active', true)
                    ->with(['translation', 'childrenRecursive'])
                    ->get()
            );

            if ($content->isNotEmpty()) {
                return ResponseMessage::responseSuccess($content, __('home.displayData'));
            }

            return ResponseMessage::responseError(__('home.noContent'), 404);
        } catch (Exception $error) {
            return ResponseMessage::responseError('Server Error', $error, 500);
        }
    }

    public function addSections(SectionRequest $request)
    {
        try {
            $section = $request->validated();
            Sections::create($section);

            $title = 'Section';
            if (App::isLocale('ar')) {
                $title = 'عنوان القسم';
            }

            return ResponseMessage::responseSuccess($section, __('home.createdSuccess', ['title' => $title]));
        } catch (Exception $error) {
            return ResponseMessage::responseError('Server Error', $error, 500);
        }
    }

    public function addSectionContent(SectionContentRequest $request)
    {
        try {
            $content = $request->validated();
            $parent = Sections::where('section', $content['section'])->where('type', 'section')->firstOrFail();
            $content['parent_id'] = $parent->id;

            if ($request->hasFile('file_path')) {
                $content['file_path'] = StoreFile::storeFile($request->file_path, $content['section'] . '-files');
            }

            Sections::create($content);

            $title = 'Section Content';
            if (App::isLocale('ar')) {
                $title = 'محتوى القسم';
            }

            return ResponseMessage::responseSuccess($content, __('home.createdSuccess', ['title' => $title]));
        } catch (Exception $error) {
            return ResponseMessage::responseError('Server Error', $error, 500);
        }
    }

    public function deleteSection($id)
    {
        try {
            $section = Sections::find($id);
            $section->active = false;
            $section->save();
            $section->delete();

            $title = 'Section';
            if (App::isLocale('ar')) {
                $title = 'القسم';
            }

            return ResponseMessage::responseSuccess($section, __('home.deletedMessage', ['title' => $title]));
        } catch (Exception $error) {
            return ResponseMessage::responseError('Server Error', $error, 500);
        }
    }

    public function search(string $keyword)
    {
        try {
            $locale = app()->getLocale();

            $sections = Sections::whereHas('translations', function ($q) use ($keyword, $locale) {
                $q->where('locale', $locale)
                    ->where(function ($query) use ($keyword) {
                        $query->where('title', 'LIKE', "%{$keyword}%")
                            ->orWhere('subtitle', 'LIKE', "%{$keyword}%")
                            ->orWhere('description', 'LIKE', "%{$keyword}%")
                            ->orWhere('address', 'LIKE', "%{$keyword}%")
                            ->orWhere('date', 'LIKE', "%{$keyword}%");
                    });
            })
                ->where('active', true)
                ->with([
                    'translation',
                    'childrenRecursive.translation'
                ])
                ->get();

            if ($sections->isEmpty()) {
                return ResponseMessage::responseError(__('home.noContent'), 404);
            }

            return ResponseMessage::responseSuccess(ContentHomeResource::collection($sections), __('home.displayData'));
        } catch (Exception $e) {
            return ResponseMessage::responseError('Server Error', $e);
        }
    }
}
