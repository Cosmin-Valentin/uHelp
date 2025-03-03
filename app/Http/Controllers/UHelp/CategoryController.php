<?php

namespace App\Http\Controllers\UHelp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UHelp\TicketCategory;

class CategoryController extends Controller
{
    public function create() {
        $categories = TicketCategory::all();
        
        return view('uhelp.sections.category', [
            'user' => auth()->user(),
            'categories' => $categories
        ]);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required|string'
        ]);

        TicketCategory::create($attributes);
        return back();
    }

    public function destroy(TicketCategory $ticketCategory) {
        $ticketCategory->delete();
        return back();
    }

    public function update(TicketCategory $ticketCategory) {
        request()->merge(['status' => request()->has('status')]);
        $attributes = request()->validate([
            'name' => 'required|string',
            'status' => 'boolean'
        ]);

        $ticketCategory->update($attributes);
        return back();
    }
}
