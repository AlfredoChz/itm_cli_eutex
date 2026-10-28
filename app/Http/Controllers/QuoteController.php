<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'company' => 'nullable|string|max:150',
            'ruc' => 'nullable|string|max:20',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:30',
            'city' => 'nullable|string|max:100',
            'product_id' => 'nullable|exists:products,id',
            'product_name' => 'nullable|string|max:200',
            'quantity' => 'nullable|integer|min:1',
            'color' => 'nullable|string|max:50',
            'size' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:2000',
        ]);

        $productName = $request->product_name;
        if ($request->filled('product_id')) {
            $product = Product::find($request->product_id);
            if ($product) {
                $productName = $product->name;
            }
        }

        $quote = QuoteRequest::create([
            'name' => $validated['name'],
            'company' => $validated['company'] ?? null,
            'ruc' => $validated['ruc'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'city' => $validated['city'] ?? 'Lima',
            'product_id' => $validated['product_id'] ?? null,
            'product_name' => $productName,
            'quantity' => $validated['quantity'] ?? 12,
            'message' => ($validated['message'] ?? '') . 
                ($request->filled('color') ? " | Color: " . $request->color : '') . 
                ($request->filled('size') ? " | Talla: " . $request->size : ''),
            'status' => 'pending',
        ]);

        // WhatsApp direct message composition
        $waText = "¡Hola EUTEX! Deseo solicitar una cotización formal:\n";
        $waText .= "• *Cliente:* " . $validated['name'] . "\n";
        if (!empty($validated['company'])) {
            $waText .= "• *Empresa:* " . $validated['company'] . "\n";
        }
        if (!empty($validated['ruc'])) {
            $waText .= "• *RUC:* " . $validated['ruc'] . "\n";
        }
        $waText .= "• *Teléfono:* " . $validated['phone'] . "\n";
        $waText .= "• *Correo:* " . $validated['email'] . "\n";
        if ($productName) {
            $waText .= "• *Producto:* " . $productName . "\n";
        }
        if ($request->filled('quantity')) {
            $waText .= "• *Cantidad:* " . $request->quantity . " unidades\n";
        }
        if ($request->filled('color')) {
            $waText .= "• *Color elegido:* " . $request->color . "\n";
        }
        if ($request->filled('size')) {
            $waText .= "• *Talla:* " . $request->size . "\n";
        }
        if (!empty($validated['message'])) {
            $waText .= "• *Detalles:* " . $validated['message'] . "\n";
        }

        $waUrl = "https://wa.me/51920783202?text=" . urlencode($waText);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => '¡Cotización registrada con éxito! En breve nuestro equipo de ventas se pondrá en contacto.',
                'whatsapp_url' => $waUrl,
            ]);
        }

        return redirect()->away($waUrl);
    }
}
