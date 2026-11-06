<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use App\Models\Event;

class EventController extends BaseController
{

    public function index(Request $request): Response
    {
        $events = Event::getAll(); // Statická metóda getAll() vytiahne záznamy z tabuľky events

        return $this->html([
            'events' => $events
        ]);
    }

    public function detail(Request $request): Response
    {
        $id = (int) $request->value('id');
        $event = Event::getOne($id);

        if (!$event) {
            return $this->redirect('?c=home');
        }

        return $this->html([
            'event' => $event
        ]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'event' => new Event()
        ]);
    }

    /**
     * Spracuje formulár a uloží podujatie do DB (aj s obrázkom).
     */
    public function save(Request $request): Response
    {
        $id = (int) $request->value('id');
        $event = $id > 0 ? Event::getOne($id) : new Event();

        $event->setTitle($request->value('title'));
        $event->setDescription($request->value('description'));
        $event->setDate($request->value('date'));
        $event->setLocation($request->value('location'));
        $event->setPrice((float) $request->value('price'));

        // Zjednodušený upload obrázka
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileName = time() . '_' . basename($_FILES['image']['name']);
            $targetDir = __DIR__ . '/../../public/images/';

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $fileName)) {
                $event->setImage('images/' . $fileName);
            }
        }

        $event->save();

        return $this->redirect($this->url('home.index'));
    }

    public function edit(Request $request): Response
    {
        $id = (int) $request->value('id');
        $event = Event::getOne($id);

        if (!$event) {
            return $this->redirect($this->url('home.index'));
        }

        // Znovu použijeme pohľad add.view.php, keďže formulár je rovnaký
        return $this->html([
            'event' => $event
        ], 'add');
    }

    /**
     * Vymaže podujatie z databázy a odstráni jeho obrázok z disku.
     */
    public function delete(Request $request): Response
    {
        $id = (int) $request->value('id');
        $event = Event::getOne($id);

        if ($event) {
            // Vymazanie fyzického obrázka z public/images/, ak existuje
            if ($event->getImage() && file_exists($event->getImage())) {
                unlink($event->getImage());
            }

            $event->delete();
        }

        return $this->redirect($this->url('home.index'));
    }
}