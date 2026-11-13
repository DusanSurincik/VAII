<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use App\Models\Event;
use App\Models\Category;

class HomeController extends BaseController
{
    /**
     * Povolí prístup ku všetkým akciám v tomto kontroléri.
     */
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Zobrazí hlavnú stránku (načíta App/Views/Home/index.view.php)
     */
    public function index(Request $request): Response
    {
        $categories = Category::getAll();
        $categoryId = (int) $request->value('category_id');
        $selectedCategory = null;

        if ($categoryId > 0) {
            $selectedCategory = Category::getOne($categoryId);
            $events = Event::getAll('category_id = ?', [$categoryId]);
        } else {
            $events = Event::getAll();
        }

        return $this->html([
            'events' => $events,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory
        ]);

    }

    /**
     * Zobrazí detail podujatia (načíta App/Views/Home/detail.view.php)
     */
    public function detail(Request $request): Response
    {
        return $this->html();
    }
}