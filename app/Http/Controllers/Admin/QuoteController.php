<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $query = QuoteRequest::with('product')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('product_name', 'like', "%{$search}%");
            });
        }

        $quotes = $query->paginate(15)->withQueryString();

        $stats = [
            'total' => QuoteRequest::count(),
            'pending' => QuoteRequest::where('status', 'pending')->count(),
            'contacted' => QuoteRequest::where('status', 'contacted')->count(),
            'closed' => QuoteRequest::where('status', 'closed')->count(),
        ];

        return view('admin.quotes.index', compact('quotes', 'stats'));
    }

    public function show(QuoteRequest $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    public function updateStatus(Request $request, QuoteRequest $quote)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,contacted,closed'],
        ]);

        $quote->update(['status' => $validated['status']]);

        return back()->with('success', 'Estado de la cotización #' . $quote->id . ' actualizado a: ' . ucfirst($quote->status));
    }

    public function destroy(QuoteRequest $quote)
    {
        $id = $quote->id;
        $quote->delete();

        return redirect()->route('admin.quotes.index')
            ->with('success', 'Cotización #' . $id . ' eliminada correctamente.');
    }
}
