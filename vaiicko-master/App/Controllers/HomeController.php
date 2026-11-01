<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

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
        return $this->html();
    }

    /**
     * Zobrazí detail podujatia (načíta App/Views/Home/detail.view.php)
     */
    public function detail(Request $request): Response
    {
        return $this->html();
    }
}