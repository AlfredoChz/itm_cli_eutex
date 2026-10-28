<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function nosotros()
    {
        $stats = [
            ['number' => '+10', 'label' => 'Años en el Mercado Textil'],
            ['number' => '+50,000', 'label' => 'Prendas Entregadas'],
            ['number' => '100%', 'label' => 'Cumplimiento de Plazos'],
            ['number' => '24/7', 'label' => 'Atención al Cliente'],
        ];

        return view('pages.nosotros', compact('stats'));
    }

    public function servicios()
    {
        $services = [
            [
                'title' => 'Confección Industrial a Medida',
                'icon' => 'scissors',
                'description' => 'Desarrollo y patronaje computarizado de uniformes personalizados según los requerimientos operativos y colores corporativos de su empresa.',
                'benefits' => [
                    'Variedad de telas de alto tráfico (Drill, Ripstop, Gabardina, Oxford)',
                    'Tallas completas y tallas especiales sobre pedido (XS hasta 4XL)',
                    'Triple costura de seguridad y refuerzo en puntos críticos',
                    'Asesoría en ergonomía y confort para el trabajador'
                ]
            ],
            [
                'title' => 'Bordado Computarizado & Estampado Textil',
                'icon' => 'sparkles',
                'description' => 'Personalice sus uniformes con logotipos empresariales de alta precisión que resisten el lavado industrial sin desgastarse.',
                'benefits' => [
                    'Bordadoras automáticas multicabezal de alta definición',
                    'Hilos resistentes al cloro y la exposición solar continua',
                    'Estampado en serigrafía plastisol y vinil textil termo-fijado',
                    'Muestra virtual previa antes de la producción masiva'
                ]
            ],
            [
                'title' => 'Asesoría Técnica en Normas de Seguridad',
                'icon' => 'shield-check',
                'description' => 'Orientación técnica para que la dotación de su personal cumpla a cabalidad con la Ley de Seguridad y Salud en el Trabajo (Ley 29783) y normas ANSI.',
                'benefits' => [
                    'Selección de niveles de retrorreflexión (Clase 1, 2 y 3 ANSI 107)',
                    'Detección de necesidades de protección contra calor o químicos',
                    'Fichas técnicas y certificados de calidad para auditorías de seguridad',
                    'Kits integrales de EPP homologados'
                ]
            ],
            [
                'title' => 'Distribución y Despacho a Nivel Nacional',
                'icon' => 'truck',
                'description' => 'Envíos rápidos y seguros a todo el Perú desde nuestro centro de distribución en Gamarra, Lima hacia todas las provincias y proyectos mineros.',
                'benefits' => [
                    'Embalaje sellado e identificado por áreas de trabajo o tallas',
                    'Alianzas con las principales agencias de transporte (Shalom, Marvisur, Olva, etc.)',
                    'Seguimiento en tiempo real del despacho',
                    'Entregas directas en Lima Metropolitana'
                ]
            ],
        ];

        return view('pages.servicios', compact('services'));
    }

    public function libroReclamaciones()
    {
        return view('pages.libro-reclamaciones');
    }

    public function storeLibroReclamaciones(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:200',
            'tipo_doc' => 'required|string',
            'num_doc' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'direccion' => 'required|string|max:250',
            'tipo' => 'required|in:Queja,Reclamo',
            'monto' => 'nullable|numeric',
            'detalle' => 'required|string|max:2000',
            'pedido' => 'required|string|max:1000',
        ]);

        $ticketCode = 'REC-' . strtoupper(uniqid());

        return back()->with('success', "Su reclamo ha sido registrado exitosamente con el código: {$ticketCode}. En un plazo máximo de 15 días hábiles recibirá respuesta a su correo.");
    }

    public function politicas()
    {
        return view('pages.politicas');
    }

    public function terminos()
    {
        return view('pages.terminos');
    }
}
