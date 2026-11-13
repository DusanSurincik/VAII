<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use App\Models\Category;
use App\Models\Event;

class CategoryController extends BaseController
{

    /**
     * @inheritDoc
     */
    public function index(Request $request): Response
    {
        return $this->html([
            'categories' => Category::getAll()
        ]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'category' => new Category()
        ]);
    }

    public function edit(Request $request): Response
    {
        $id = (int) $request->value('id');
        $category = Category::getOne($id);

        if (!$category) {
            return $this->redirect($this->url('category.index'));
        }

        return $this->html([
            'category' => $category
        ], 'add');
    }

    public function save(Request $request): Response
    {
        $id = (int) $request->value('id');
        $category = $id > 0 ? Category::getOne($id) : new Category();

        $category->setName($request->value('name'));
        $category->setDescription($request->value('description'));
        $category->save();

        return $this->redirect($this->url('category.index'));
    }

    public function delete(Request $request): Response
    {
        $id = (int) $request->value('id');
        $category = Category::getOne($id);

        if ($category) {
            $category->delete();
        }

        return $this->redirect($this->url('category.index'));
    }

    public function detail(Request $request): Response
    {
        $id = (int) $request->value('id');
        $category = Category::getOne($id);

        if (!$category) {
            return $this->redirect($this->url('category.index'));
        }

        $otherEvents = Event::getAll('category_id IS NULL');

        return $this->html([
            'category' => $category,
            'events' => $category->getEvents(),
            'otherEvents' => $otherEvents,
            'error' => $request->value('error')
        ]);
    }

    public function assignEvent(Request $request): Response
    {
        $categoryId = (int) $request->value('category_id');
        $eventId = (int) $request->value('event_id');

        $event = Event::getOne($eventId);
        if ($event && $categoryId > 0) {
            // Kontrola 1:N: podujatie už patrí do inej kategórie
            if ($event->getCategoryId() !== null) {
                $existingCategory = $event->getCategory();
                $catName = $existingCategory ? $existingCategory->getName() : 'inej kategórie';
                $msg = "Podujatie „{$event->getTitle()}“ už je priradené v kategórii {$catName}. Každé podujatie môže mať iba jednu kategóriu.";

                return $this->redirect($this->url('category.detail', [
                    'id' => $categoryId,
                    'error' => $msg
                ]));
            }

            $event->setCategoryId($categoryId);
            $event->save();
        }

        return $this->redirect($this->url('category.detail', ['id' => $categoryId]));
    }

    public function removeEvent(Request $request): Response
    {
        $categoryId = (int) $request->value('category_id');
        $eventId = (int) $request->value('event_id');

        $event = Event::getOne($eventId);
        if ($event) {
            $event->setCategoryId(null);
            $event->save();
        }

        return $this->redirect($this->url('category.detail', ['id' => $categoryId]));
    }
}