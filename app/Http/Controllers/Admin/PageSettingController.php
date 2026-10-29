<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageSettingController extends Controller
{
    /**
     * Mostrar la interfaz unificada de administración de contenidos y páginas.
     */
    public function index(Request $request)
    {
        $activeTab = $request->get('tab', 'banners');

        // Banners
        $banners = SiteSetting::get('home_banners', [
            [
                'image' => '/images/eutex/banner_principal.png',
                'title' => 'Fabricantes Directos de Uniformes Industriales',
                'subtitle' => 'Precios por mayor, confección pesada en Gamarra y envíos a todo el Perú.',
                'link' => 'https://wa.me/51920783202?text=Hola%20EUTEX,%20deseo%20cotizar%20uniformes%20industriales%20al%20por%20mayor',
                'link_text' => 'Cotizar al WhatsApp',
                'badge' => 'Gamarra • Lima - Perú',
                'is_active' => true,
            ],
            [
                'image' => '/images/eutex/banner_mineria_visibilidad.jpg',
                'title' => 'Indumentaria de Alta Visibilidad & Minería Pesada',
                'subtitle' => 'Overoles, mamelucos y casacas térmicas con cintas reflectivas 3M certificadas ANSI/ISEA.',
                'link' => '/productos?categoria=mamelucos-overoles',
                'link_text' => 'Ver Línea Minera',
                'badge' => 'Minería & Construcción • Normas 3M',
                'is_active' => true,
            ],
            [
                'image' => '/images/eutex/banner_confeccion_polos.jpg',
                'title' => 'Polos Industriales & Bordados Computarizados',
                'subtitle' => '100% Algodón peinado 24/1 y 30/1 en más de 10 colores con bordado de alta precisión.',
                'link' => '/productos?categoria=polos-industriales',
                'link_text' => 'Ver Polos Industriales',
                'badge' => 'Stock Permanente • 10 Colores',
                'is_active' => true,
            ],
            [
                'image' => '/images/eutex/banner_dotacion_epp.jpg',
                'title' => 'Dotación Corporativa Integral & Suministro de EPP',
                'subtitle' => 'Pantalones cargo, jeans 14 oz, cascos, lentes y calzado de seguridad para su empresa.',
                'link' => 'https://wa.me/51920783202?text=Hola%20EUTEX,%20deseo%20una%20cotizacion%20de%20dotacion%20completa%20y%20EPP',
                'link_text' => 'Solicitar Cotización',
                'badge' => 'Dotación Completa • Envíos a Todo el Perú',
                'is_active' => true,
            ],
        ]);

        // Contacto
        $contact = [
            'phone' => SiteSetting::get('contact_phone', '920 783 202'),
            'whatsapp' => SiteSetting::get('contact_whatsapp', '920783202'),
            'whatsapp_text' => SiteSetting::get('contact_whatsapp_text', 'Hola EUTEX, deseo información y cotización de uniformes industriales.'),
            'email' => SiteSetting::get('contact_email', 'eutex@ventas.com'),
            'address' => SiteSetting::get('contact_address', 'Gamarra, La Victoria, Lima - Perú'),
            'schedule' => SiteSetting::get('contact_schedule', 'Lunes a Sábado: 8:00 AM - 7:00 PM'),
            'maps_url' => SiteSetting::get('contact_maps_url', 'https://maps.google.com/?q=Gamarra+La+Victoria+Lima'),
        ];

        // Nosotros
        $nosotros = [
            'title' => SiteSetting::get('nosotros_title', 'EUTEX: Pasión y Calidad en Confección Textil Industrial'),
            'story' => SiteSetting::get('nosotros_story', 'Con más de una década en el emporio comercial de Gamarra, EUTEX se ha consolidado como fabricante líder de uniformes industriales, ropa de trabajo pesado y dotaciones para minería, hidrocarburos, construcción y logística.'),
            'mission' => SiteSetting::get('nosotros_mission', 'Proteger y uniformar al trabajador peruano con prendas duraderas, seguras y de máxima comodidad, brindando precios directos de fábrica sin intermediarios.'),
            'vision' => SiteSetting::get('nosotros_vision', 'Ser la empresa referente nacional e internacional en fabricación y distribución de uniformes técnicos industriales y corporativos.'),
            'years' => SiteSetting::get('nosotros_experience_years', '10+'),
            'completed' => SiteSetting::get('nosotros_completed_orders', '50,000+'),
            'clients' => SiteSetting::get('nosotros_corporate_clients', '250+'),
            'satisfaction' => SiteSetting::get('nosotros_satisfaction_rate', '99.8%'),
            'image' => SiteSetting::get('nosotros_image', '/images/eutex/tarjeta_contacto.png'),
        ];

        // Servicios
        $servicios = SiteSetting::get('servicios_items', [
            [
                'title' => 'Fabricación al Por Mayor',
                'icon' => 'factory',
                'badge' => 'Precios de Taller',
                'description' => 'Producción a gran escala de polos, chalecos, pantalones y mamelucos con estándares técnicos para empresas mineras, constructoras y logísticas.',
                'features' => ['Precios escalonados por volumen', 'Telas nacionales y de exportación', 'Entrega puntual programada']
            ],
            [
                'title' => 'Bordado Computarizado & Serigrafía',
                'icon' => 'sparkles',
                'badge' => 'Alta Definición',
                'description' => 'Personalizamos cada prenda con el logotipo institucional de su empresa usando hilos resistentes al lavado continuo y serigrafía plastisol de alta duración.',
                'features' => ['Bordados en pecho, espalda y mangas', 'Muestras previas de aprobación', 'Fidelidad exacta de colores Pantone']
            ],
            [
                'title' => 'Cintas Reflectivas Normadas 3M',
                'icon' => 'shield',
                'badge' => 'Seguridad Certificada',
                'description' => 'Aplicación de cintas de alta visibilidad conforme a las normativas ANSI/ISEA 107 y Norma Técnica Peruana (NTP) para faenas diurnas y nocturnas.',
                'features' => ['Cintas 3M Scotchlite de 2 pulgadas', 'Cintas ignífugas para hidrocarburos', 'Visibilidad reflectiva de 360 grados']
            ],
            [
                'title' => 'Envíos Rápidos a Nivel Nacional',
                'icon' => 'truck',
                'badge' => 'Todo el Perú',
                'description' => 'Despachamos diariamente pedidos a todas las regiones y unidades mineras del Perú a través de las principales agencias de transporte terrestre y aéreo.',
                'features' => ['Embalaje de seguridad hermético', 'Guía de remisión y factura electrónica', 'Seguimiento en tiempo real del despacho']
            ]
        ]);

        // Redes Sociales y Footer
        $redes = [
            'facebook' => SiteSetting::get('social_facebook', 'https://facebook.com/eutex'),
            'instagram' => SiteSetting::get('social_instagram', 'https://instagram.com/eutex'),
            'tiktok' => SiteSetting::get('social_tiktok', 'https://tiktok.com/@eutex'),
            'linkedin' => SiteSetting::get('social_linkedin', 'https://linkedin.com/company/eutex'),
            'footer_bio' => SiteSetting::get('footer_bio', 'Fabricantes directos de uniformes industriales, ropa de trabajo y prendas de seguridad en Gamarra. Confección pesada con cintas reflectivas 3M y bordados computarizados.'),
        ];

        return view('admin.pages.index', compact('activeTab', 'banners', 'contact', 'nosotros', 'servicios', 'redes'));
    }

    /**
     * Procesar actualización por sección.
     */
    public function update(Request $request, string $section)
    {
        switch ($section) {
            case 'banners':
                return $this->updateBanners($request);

            case 'contacto':
                return $this->updateContacto($request);

            case 'nosotros':
                return $this->updateNosotros($request);

            case 'servicios':
                return $this->updateServicios($request);

            case 'redes':
                return $this->updateRedes($request);

            default:
                return redirect()->route('admin.pages.index')
                    ->with('error', 'Sección no reconocida.');
        }
    }

    /**
     * Actualizar o agregar banners de inicio.
     */
    protected function updateBanners(Request $request)
    {
        $action = $request->input('action', 'save_all');

        $banners = SiteSetting::get('home_banners', []);
        if (!is_array($banners)) {
            $banners = [];
        }

        if ($action === 'add') {
            $request->validate([
                'new_banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
                'new_banner_url' => ['nullable', 'string'],
                'new_banner_title' => ['required', 'string', 'max:255'],
                'new_banner_subtitle' => ['nullable', 'string', 'max:500'],
                'new_banner_link' => ['nullable', 'string'],
                'new_banner_link_text' => ['nullable', 'string', 'max:50'],
                'new_banner_badge' => ['nullable', 'string', 'max:100'],
            ]);

            $imagePath = $request->input('new_banner_url');
            if ($request->hasFile('new_banner_image')) {
                $file = $request->file('new_banner_image');
                $filename = 'banner-' . time() . '-' . Str::random(6) . '.' . $file->getClientOriginalExtension();
                $dest = public_path('images/eutex');
                if (!file_exists($dest)) {
                    mkdir($dest, 0755, true);
                }
                $file->move($dest, $filename);
                $imagePath = '/images/eutex/' . $filename;
            }

            if (!$imagePath) {
                return redirect()->route('admin.pages.index', ['tab' => 'banners'])
                    ->with('error', 'Debes subir una imagen o ingresar la URL de la imagen para el nuevo banner.');
            }

            $banners[] = [
                'image' => $imagePath,
                'title' => $request->input('new_banner_title'),
                'subtitle' => $request->input('new_banner_subtitle'),
                'link' => $request->input('new_banner_link') ?: 'https://wa.me/' . SiteSetting::get('contact_whatsapp', '51920783202'),
                'link_text' => $request->input('new_banner_link_text', 'Cotizar al WhatsApp'),
                'badge' => $request->input('new_banner_badge', 'Fabricación Directa'),
                'is_active' => true,
            ];

            SiteSetting::set('home_banners', $banners, 'home');

            return redirect()->route('admin.pages.index', ['tab' => 'banners'])
                ->with('success', '¡Nuevo banner agregado con éxito!');
        }

        if ($action === 'delete') {
            $index = (int)$request->input('banner_index', -1);
            if (isset($banners[$index])) {
                array_splice($banners, $index, 1);
                $banners = array_values($banners);
                SiteSetting::set('home_banners', $banners, 'home');
                return redirect()->route('admin.pages.index', ['tab' => 'banners'])
                    ->with('success', 'Banner eliminado correctamente.');
            }

            return redirect()->route('admin.pages.index', ['tab' => 'banners'])
                ->with('error', 'No se encontró el banner seleccionado para eliminar.');
        }

        if ($action === 'save_all') {
            $submittedBanners = $request->input('banners', []);
            $cleaned = [];

            foreach ($submittedBanners as $idx => $b) {
                // Manejar reemplazo de imagen por archivo si se subió
                $imagePath = $b['image'] ?? '';
                $fileKey = "banner_file_{$idx}";
                if ($request->hasFile($fileKey)) {
                    $file = $request->file($fileKey);
                    $filename = 'banner-' . time() . "-{$idx}." . $file->getClientOriginalExtension();
                    $dest = public_path('images/eutex');
                    if (!file_exists($dest)) {
                        mkdir($dest, 0755, true);
                    }
                    $file->move($dest, $filename);
                    $imagePath = '/images/eutex/' . $filename;
                }

                $cleaned[] = [
                    'image' => $imagePath,
                    'title' => $b['title'] ?? '',
                    'subtitle' => $b['subtitle'] ?? '',
                    'link' => $b['link'] ?? '',
                    'link_text' => $b['link_text'] ?? 'Cotizar',
                    'badge' => $b['badge'] ?? '',
                    'is_active' => isset($b['is_active']),
                ];
            }

            SiteSetting::set('home_banners', $cleaned, 'home');

            return redirect()->route('admin.pages.index', ['tab' => 'banners'])
                ->with('success', 'Banners principales actualizados correctamente.');
        }

        return redirect()->route('admin.pages.index', ['tab' => 'banners']);
    }

    /**
     * Actualizar datos centrales de contacto.
     */
    protected function updateContacto(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:50'],
            'whatsapp' => ['required', 'string', 'max:50'],
            'whatsapp_text' => ['required', 'string', 'max:500'],
            'email' => ['required', 'email', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'schedule' => ['required', 'string', 'max:255'],
            'maps_url' => ['nullable', 'string', 'max:500'],
        ]);

        // Limpiar el número de WhatsApp para enlaces (solo dígitos)
        $cleanWhatsapp = preg_replace('/[^0-9]/', '', $validated['whatsapp']);

        SiteSetting::set('contact_phone', $validated['phone'], 'contacto');
        SiteSetting::set('contact_whatsapp', $cleanWhatsapp, 'contacto');
        SiteSetting::set('contact_whatsapp_text', $validated['whatsapp_text'], 'contacto');
        SiteSetting::set('contact_email', $validated['email'], 'contacto');
        SiteSetting::set('contact_address', $validated['address'], 'contacto');
        SiteSetting::set('contact_schedule', $validated['schedule'], 'contacto');
        SiteSetting::set('contact_maps_url', $validated['maps_url'] ?? '', 'contacto');

        return redirect()->route('admin.pages.index', ['tab' => 'contacto'])
            ->with('success', 'Datos de contacto y WhatsApp actualizados en todo el sitio web.');
    }

    /**
     * Actualizar página Nosotros e Historia.
     */
    protected function updateNosotros(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'story' => ['required', 'string'],
            'mission' => ['required', 'string'],
            'vision' => ['required', 'string'],
            'years' => ['required', 'string', 'max:50'],
            'completed' => ['required', 'string', 'max:50'],
            'clients' => ['required', 'string', 'max:50'],
            'satisfaction' => ['required', 'string', 'max:50'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'image_url' => ['nullable', 'string'],
        ]);

        $imagePath = $validated['image_url'] ?? SiteSetting::get('nosotros_image', '/images/eutex/tarjeta_contacto.png');

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'nosotros-' . time() . '.' . $file->getClientOriginalExtension();
            $dest = public_path('images/eutex');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $imagePath = '/images/eutex/' . $filename;
        }

        SiteSetting::set('nosotros_title', $validated['title'], 'nosotros');
        SiteSetting::set('nosotros_story', $validated['story'], 'nosotros');
        SiteSetting::set('nosotros_mission', $validated['mission'], 'nosotros');
        SiteSetting::set('nosotros_vision', $validated['vision'], 'nosotros');
        SiteSetting::set('nosotros_experience_years', $validated['years'], 'nosotros');
        SiteSetting::set('nosotros_completed_orders', $validated['completed'], 'nosotros');
        SiteSetting::set('nosotros_corporate_clients', $validated['clients'], 'nosotros');
        SiteSetting::set('nosotros_satisfaction_rate', $validated['satisfaction'], 'nosotros');
        SiteSetting::set('nosotros_image', $imagePath, 'nosotros');

        return redirect()->route('admin.pages.index', ['tab' => 'nosotros'])
            ->with('success', 'Contenido de la página "Nosotros" y estadísticas actualizado.');
    }

    /**
     * Actualizar página de Servicios.
     */
    protected function updateServicios(Request $request)
    {
        $items = $request->input('servicios', []);
        $cleaned = [];

        foreach ($items as $item) {
            if (!empty($item['title'])) {
                // Separar features por saltos de línea si vienen como texto
                $features = [];
                if (!empty($item['features_text'])) {
                    $features = array_filter(array_map('trim', explode("\n", $item['features_text'])));
                } elseif (!empty($item['features']) && is_array($item['features'])) {
                    $features = $item['features'];
                }

                $cleaned[] = [
                    'title' => $item['title'],
                    'badge' => $item['badge'] ?? '',
                    'icon' => $item['icon'] ?? 'shield',
                    'description' => $item['description'] ?? '',
                    'features' => array_values($features),
                ];
            }
        }

        SiteSetting::set('servicios_items', $cleaned, 'servicios');

        return redirect()->route('admin.pages.index', ['tab' => 'servicios'])
            ->with('success', 'Lista de servicios y beneficios actualizada.');
    }

    /**
     * Actualizar Redes Sociales y Footer.
     */
    protected function updateRedes(Request $request)
    {
        $validated = $request->validate([
            'facebook' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'tiktok' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'footer_bio' => ['required', 'string', 'max:500'],
        ]);

        SiteSetting::set('social_facebook', $validated['facebook'] ?? '', 'social');
        SiteSetting::set('social_instagram', $validated['instagram'] ?? '', 'social');
        SiteSetting::set('social_tiktok', $validated['tiktok'] ?? '', 'social');
        SiteSetting::set('social_linkedin', $validated['linkedin'] ?? '', 'social');
        SiteSetting::set('footer_bio', $validated['footer_bio'], 'social');

        return redirect()->route('admin.pages.index', ['tab' => 'redes'])
            ->with('success', 'Redes sociales y pie de página actualizados.');
    }
}
