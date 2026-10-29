<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 0. Default Administrator User
        User::firstOrCreate(
            ['email' => 'admin@eutex.com'],
            [
                'name' => 'Administrador EUTEX',
                'password' => Hash::make('admin1234'),
            ]
        );

        // 1. Categories
        $categories = [
            [
                'name' => 'Polos Industriales & Corporativos',
                'slug' => 'polos-industriales',
                'description' => 'Polos manga larga y corta en algodón de primera calidad, cuello redondo y piqué, diseñados para trabajo pesado y uso corporativo con bordado personalizado.',
                'icon' => 'shirt',
                'image' => '/images/products/polo-manga-larga-cuello-redondo.jpg',
                'order' => 1,
            ],
            [
                'name' => 'Chalecos de Seguridad & Geólogo',
                'slug' => 'chalecos-seguridad',
                'description' => 'Chalecos de alta visibilidad con cintas reflectivas certificadas de 5 cm, multibolsillos funcionales, cierre frontal y acabados de alta resistencia.',
                'icon' => 'shield',
                'image' => '/images/products/chaleco-seguridad-geologo.jpg',
                'order' => 2,
            ],
            [
                'name' => 'Jeans & Pantalones Cargo',
                'slug' => 'pantalones-jeans',
                'description' => 'Jeans industriales 14 oz y pantalones cargo en drill con cintas reflectivas 3M, triple costura de seguridad y bolsillos utilitarios reforzados.',
                'icon' => 'layers',
                'image' => '/images/products/pantalon-jean-industrial-14oz.jpg',
                'order' => 3,
            ],
            [
                'name' => 'Mamelucos & Overoles Industriales',
                'slug' => 'mamelucos-overoles',
                'description' => 'Overoles enteros en drill y telas especiales ignífugas con bandas reflectivas 360°, cierres doble sentido y ajuste ergonómico para faenas mineras y operativas.',
                'icon' => 'user-check',
                'image' => '/images/products/mameluco-industrial-drill.jpg',
                'order' => 4,
            ],
            [
                'name' => 'Casacas Térmicas & Ropa Impermeable',
                'slug' => 'casacas-ropa-termica',
                'description' => 'Casacas acolchadas impermeables, cortavientos térmicos y ropa de protección para climas extremos en campamentos mineros y construcción.',
                'icon' => 'sun',
                'image' => '/images/products/casaca-termica-impermeable-minera.jpg',
                'order' => 5,
            ],
            [
                'name' => 'Equipos de Protección Personal (EPP)',
                'slug' => 'epp-seguridad',
                'description' => 'Complementos de seguridad integral: cascos normados, guantes de maniobra en badana y nitrilo, lentes de policarbonato y calzado de seguridad con puntera de acero.',
                'icon' => 'hard-hat',
                'image' => '/images/products/kit-proteccion-personal-epp.jpg',
                'order' => 6,
            ],
        ];

        $categoryModels = [];
        foreach ($categories as $catData) {
            $categoryModels[$catData['slug']] = Category::firstOrCreate(['slug' => $catData['slug']], $catData);
        }

        // 2. Products
        $products = [
            [
                'category_id' => $categoryModels['polos-industriales']->id,
                'name' => 'Polo Manga Larga Cuello Redondo Reforzado',
                'slug' => 'polo-manga-larga-industrial-cuello-redondo',
                'sku' => 'ETX-PML-01',
                'short_description' => 'Polo industrial de manga larga en 100% algodón jersey peinado de alta durabilidad, cuello reforzado y puños en rib.',
                'description' => 'Diseñado especialmente para personal de planta, almacén, logística y supervisión operativa. Fabricado con hilado de algodón seleccionado que garantiza suavidad al contacto, frescura en jornadas extenuantes y alta resistencia frente al desgaste mecánico y lavados frecuentes. Cuenta con cuello redondo reforzado con cinta tapacostura de hombro a hombro, puños elásticos en rib para ajuste ergonómico y basta con doble pespunte.',
                'features' => [
                    'Cuello redondo reforzado con tapacostura interior para mayor comodidad',
                    'Puños tejidos en rib que proporcionan ajuste firme y evitan atrapamientos',
                    'Tela 100% algodón peinado 24/1 o 30/1 suave, transpirable y resistente',
                    'Basta de cintura con costura doble de máxima resistencia al lavado',
                    'Apto para estampado serigráfico y bordado computarizado de alta definición'
                ],
                'specs' => [
                    'Composición' => '100% Algodón Peinado Jersey (200 gr/m²)',
                    'Tejido' => 'Punto liso de alta densidad anti-pilling',
                    'Costuras' => 'Hilos de poliéster 100% de alta tenacidad calibre 40/2',
                    'Tallas Disponibles' => 'S, M, L, XL, XXL (Tallas especiales sobre pedido)',
                    'Colores Disponibles' => '10 colores en stock continuo (Blanco, Negro, Azul Marino, Azul Rey, Rojo, Gris Jaspe, Plomo, Verde Oliva, Beige, Amarillo Neón)',
                    'Uso Recomendado' => 'Industria, talleres, logística, construcción, eventos y empresas'
                ],
                'colors' => ['Blanco', 'Negro', 'Azul Marino', 'Azul Rey', 'Rojo', 'Gris Jaspe', 'Plomo', 'Verde Oliva', 'Beige', 'Amarillo Neón'],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'image' => '/images/products/polo-manga-larga-cuello-redondo.jpg',
                'gallery' => [
                    '/images/products/polo-manga-larga-cuello-redondo.jpg',
                    '/images/eutex/polos_manga_larga.png'
                ],
                'badge' => 'Más Vendido • 10 Colores',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['chalecos-seguridad']->id,
                'name' => 'Chaleco de Seguridad Tipo Geólogo Multibolsillos',
                'slug' => 'chaleco-seguridad-tipo-geologo-multibolsillos',
                'sku' => 'ETX-CHG-02',
                'short_description' => 'Chaleco de alta visibilidad con cinta reflectiva de 5 cm, cierre frontal tractor y compartimentos multifuncionales.',
                'description' => 'Chaleco industrial de alta visibilidad tipo geólogo, confeccionado con tela drill pesado y acabados de primera calidad. Incorpora cintas reflectivas de 5 cm de ancho con grado de retro-reflexión certificada de alta visibilidad diurna y nocturna conforme a la Norma Técnica Peruana y ANSI/ISEA 107. Cuenta con cierre de cremallera frontal reforzado, múltiples bolsillos portaherramientas con tapa y broche, porta-lapiceros, anillo porta-fotocheck tipo D-ring y espalda con ventilación.',
                'features' => [
                    'Cinta reflectiva de alta visibilidad diurna y nocturna en torso y espalda',
                    'Bolsillos funcionales con cierre y velcro para herramientas y radio',
                    'Tela resistente y transpirable de alto rendimiento',
                    'Ideal para trabajos industriales, construcción y minería',
                    'Cómodos, funcionales y de gran durabilidad'
                ],
                'specs' => [
                    'Material' => 'Drill San Jacinto / Oxford impermeable de alto tráfico',
                    'Reflectivo' => 'Cinta reflectiva 3M / Textil gris plata de 50 mm (ANSI 107 Class 2)',
                    'Cierre' => 'Cremallera tipo tractor nylon #5 de alta durabilidad',
                    'Bolsillos' => '4 bolsillos inferiores con tapa + 2 superiores porta-objetos y lapicero',
                    'Colores' => 'Azul Marino, Amarillo Flúor, Naranja, Verde Botella, Rojo',
                    'Normativa' => 'Cumplimiento ANSI/ISEA 107-2020 y Norma Técnica Peruana'
                ],
                'colors' => ['Azul Marino', 'Amarillo Flúor', 'Naranja', 'Verde Botella', 'Rojo'],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'image' => '/images/products/chaleco-geologo-industrial-colores.jpg',
                'gallery' => [
                    '/images/products/chaleco-geologo-industrial-colores.jpg',
                    '/images/products/chaleco-seguridad-geologo.jpg',
                    '/images/eutex/chalecos_seguridad.png'
                ],
                'badge' => '5 Colores • Cinta Reflectiva',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['pantalones-jeans']->id,
                'name' => 'Pantalón en Jean Azul Industrial 14 oz con Cinta Reflectiva',
                'slug' => 'pantalon-jean-industrial-14oz-cinta-reflectiva',
                'sku' => 'ETX-JIN-03',
                'short_description' => 'Pantalón en jean azul industrial en denim pesado de 14 oz con cinta reflectiva de alta visibilidad y costuras de alta resistencia.',
                'description' => "Pantalón en jean azul industrial confeccionado en denim rígido pesado de 14 onzas 100% algodón prelavado, especialmente diseñado para minería, construcción y trabajo rudo.\n\nCuenta con cintas reflectivas de alta visibilidad en las piernas, cintura con botón remachado y pasadores resistentes, bolsillos delanteros profundos con bolsillo relojera, y bolsillos posteriores con pespunte reforzado. Brinda protección contra el roce, la abrasión y chispas de soldadura moderadas.",
                'features' => [
                    'Denim pesado de 14 oz de máxima resistencia a la fricción y desgarro',
                    'Cinta reflectiva de alta visibilidad en contorno de piernas (360°)',
                    'Cintura con botón metálico remachado, cierre y pasadores anchos',
                    'Bolsillos delanteros profundos con relojera y bolsillos posteriores reforzados',
                    'Triple costura de seguridad en tiro y entrepierna para faena pesada',
                    'Corte recto industrial diseñado para uso con botas de seguridad'
                ],
                'specs' => [
                    'Material' => 'Denim Pesado 14 Onzas (100% Algodón prelavado de alta resistencia)',
                    'Color' => 'Azul Índigo / Azul Clásico',
                    'Reflectivo' => 'Cinta reflectiva de alta visibilidad de 2 pulgadas en ambas piernas',
                    'Costuras' => 'Triple costura reforzada en tiro y entrepierna',
                    'Cierre' => 'Botón metálico de golpe y cremallera de alta resistencia',
                    'Bolsillos' => '5 bolsillos: delanteros, relojera y posteriores reforzados',
                    'Corte' => 'Corte recto ergonómico con caída adecuada sobre calzado de seguridad',
                    'Tallas' => '28, 30, 32, 34, 36, 38, 40, 42'
                ],
                'colors' => ['Azul Clásico', 'Azul Índigo'],
                'sizes' => ['28', '30', '32', '34', '36', '38', '40', '42'],
                'image' => '/images/products/pantalon-jean-azul-industrial-reflectivo.png',
                'gallery' => [
                    '/images/products/pantalon-jean-azul-industrial-reflectivo.png',
                    '/images/products/pantalon-jean-industrial-14oz.jpg'
                ],
                'badge' => 'Denim 14 oz • Cinta Reflectiva',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['pantalones-jeans']->id,
                'name' => 'Pantalón Cargo Industrial en Drill Azul con Cinta Reflectiva',
                'slug' => 'pantalon-cargo-industrial-drill-cinta-reflectiva',
                'sku' => 'ETX-PCG-04',
                'short_description' => 'Pantalón en drill azul tecnológico con cinta reflectiva de alta visibilidad, multibolsillos funcionales y costuras reforzadas.',
                'description' => "Pantalón industrial confeccionado en tela drill tecnológica de excelente calidad y alta resistencia al trabajo diario. Su diseño de corte recto ofrece máxima comodidad y libertad de movimiento durante todas las actividades laborales.\n\nCuenta con costuras reforzadas para mayor durabilidad, bolsillos laterales tipo cargo con tapa, bolsillos delanteros profundos y bolsillos posteriores para máxima practicidad. Equipado con cinta reflectiva de alta visibilidad en ambas piernas para faenas en exteriores, minería y plantas industriales.",
                'features' => [
                    'Material: Tela drill tecnológica, resistente y de excelente calidad',
                    'Cinta reflectiva de alta visibilidad en ambas piernas para seguridad 360°',
                    'Bolsillos laterales tipo cargo, delanteros y posteriores para mayor practicidad',
                    'Cintura con botón de alta resistencia y pasadores anchos',
                    'Costuras reforzadas para mayor durabilidad y resistencia al desgaste continuo',
                    'Diseño de corte recto: cómodo, ergonómico y permite libertad de movimiento'
                ],
                'specs' => [
                    'Material' => 'Tela drill tecnológica, resistente y de excelente calidad',
                    'Color' => 'Azul Marino / Azul Industrial',
                    'Diseño' => 'Corte recto, cómodo y funcional para actividades laborales',
                    'Costuras' => 'Reforzadas de seguridad para mayor resistencia y durabilidad',
                    'Bolsillos' => 'Laterales tipo cargo, delanteros y posteriores funcionales',
                    'Cintura' => 'Pretina reforzada con botón de impacto y pasadores para cinturón',
                    'Seguridad' => 'Cinta reflectiva de alta visibilidad homologada en piernas',
                    'Comodidad' => 'Permite total libertad de movimiento en faenas exigentes',
                    'Tallas' => '28, 30, 32, 34, 36, 38, 40, 42'
                ],
                'colors' => ['Azul Marino', 'Azul Noche'],
                'sizes' => ['28', '30', '32', '34', '36', '38', '40', '42'],
                'image' => '/images/products/pantalon-drill-azul-cargo-reflectivo.png',
                'gallery' => [
                    '/images/products/pantalon-drill-azul-cargo-reflectivo.png',
                    '/images/products/pantalon-drill-ficha-tecnica.png',
                    '/images/products/pantalon-cargo-industrial-drill.jpg'
                ],
                'badge' => 'Drill Tecnológico • Cinta Reflectiva',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['polos-industriales']->id,
                'name' => 'Polera Industrial Manga Larga con Cinta Reflectiva 3M',
                'slug' => 'polo-manga-larga-alta-visibilidad-reflectivo',
                'sku' => 'ETX-PAV-05',
                'short_description' => 'Polera industrial manga larga en algodón peinado con cinta reflectiva 3M en ambos brazos, cuello redondo reforzado y alta durabilidad.',
                'description' => "Polera industrial manga larga confeccionada en algodón peinado de alta densidad con cinta reflectiva 3M certificada en ambos brazos (una vuelta).\n\nOfrece mayor visibilidad y seguridad en condiciones de baja iluminación o labores a la intemperie. Diseñada con cuello redondo de costura reforzada que mantiene su forma lavado tras lavado. Ideal para minería, hidrocarburos, logística, supervisores de campo y trabajos en exteriores.",
                'features' => [
                    'Cinta reflectiva 3M de alta visibilidad en ambos brazos (una vuelta)',
                    'Cuello redondo con costura reforzada anti-deformación',
                    '100% Algodón peinado de primera calidad, suave y transpirable',
                    'Mayor visibilidad y seguridad para labores diurnas y nocturnas',
                    'Alta durabilidad frente a lavados industriales frecuentes',
                    'Disponible en 3 colores de alta demanda: Azul Marino, Verde Botella y Rojo'
                ],
                'specs' => [
                    'Material' => '100% Algodón Peinado 24/1 o franela/algodón de alta densidad',
                    'Cinta Reflectiva' => 'Cinta reflectiva 3M™ Scotchlite™ original termosellada en ambos brazos',
                    'Colores' => 'Azul Marino, Verde Botella, Rojo',
                    'Cuello' => 'Cuello redondo con costura reforzada indeformable',
                    'Puños' => 'Puños en rib elástico de ajuste cómodo',
                    'Uso Recomendado' => 'Ideal para trabajos en exteriores, minería, construcción y logística',
                    'Tallas' => 'S, M, L, XL, XXL'
                ],
                'colors' => ['Azul Marino', 'Verde Botella', 'Rojo'],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'image' => '/images/products/polera-manga-larga-industrial-cinta-3m.png',
                'gallery' => [
                    '/images/products/polera-manga-larga-industrial-cinta-3m.png',
                    '/images/products/polo-alta-visibilidad-reflectivo.jpg',
                    '/images/eutex/polos_manga_larga.png'
                ],
                'badge' => 'Cinta 3M • 3 Colores',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['polos-industriales']->id,
                'name' => 'Polo Piqué Ejecutivo Corporativo EUTEX',
                'slug' => 'polo-pique-ejecutivo-corporativo',
                'sku' => 'ETX-PPQ-06',
                'short_description' => 'Polo corporativo en algodón piqué peinado 24/1 con cuello tejido y pechera reforzada para bordado de logotipo.',
                'description' => 'Polo institucional de porte elegante y confección impecable, ideal para personal administrativo, ejecutivos de ventas, ingenieros de campo y supervisores. Tejido piqué peinado de tacto suave y cuerpo consistente que mantiene el color y forma tras múltiples lavados. Listo para personalizar con el logo bordado de su empresa.',
                'features' => [
                    'Cuello y puños en tejido rectilíneo que no se dobla ni deforma',
                    'Abertura de pechera con 2 o 3 botones a tono pulidos',
                    'Aberturas laterales en basta reforzadas con cinta de espiga',
                    'Algodón 100% de exportación con tratamiento anti-encogimiento',
                    'Acabado premium para bordado de alta fidelidad'
                ],
                'specs' => [
                    'Composición' => '100% Algodón Peinado Piqué 24/1 (220 gr/m²)',
                    'Teñido' => 'Reactivo de alta solidez al lavado y exposición solar',
                    'Colores' => 'Gris Jaspe, Azul Rey, Azul Marino, Blanco, Negro, Rojo',
                    'Tallas' => 'XS, S, M, L, XL, XXL',
                    'Personalización' => 'Bordado computarizado o estampado transfer de alta definición'
                ],
                'colors' => ['Gris Melange', 'Azul Rey', 'Azul Marino', 'Blanco', 'Negro'],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'image' => '/images/products/polo-pique-ejecutivo.jpg',
                'gallery' => [
                    '/images/products/polo-pique-ejecutivo.jpg'
                ],
                'badge' => 'Línea Corporativa • Piqué 24/1',
                'is_featured' => false,
            ],
            [
                'category_id' => $categoryModels['mamelucos-overoles']->id,
                'name' => 'Mameluco Industrial en Drill con Cintas Reflectivas 3M',
                'slug' => 'mameluco-industrial-drill-reflectivo',
                'sku' => 'ETX-MAM-07',
                'short_description' => 'Overol completo con cierre doble vía, elástico en espalda y cintas reflectivas 360° para minería e industria.',
                'description' => 'Mameluco de trabajo integral confeccionado bajo estrictos estándares de seguridad y confort ergonómico. Fabricado en dril 100% algodón nacional o importado con tratamiento retardante al fuego o antiestático a solicitud. Equipado con cintas reflectivas homologadas de 2 pulgadas dispuestas en cruz en espalda, pecho, brazos y piernas. Cierre frontal de nylon o bronce de doble cursor oculto con tapeta y broches de presión.',
                'features' => [
                    'Cintas reflectivas de alta intensidad en hombros, brazos, cintura y botapies',
                    'Cierre de cremallera de doble vía para fácil colocación y desahogo rápido',
                    'Elástico de ajuste en la cintura trasera para silueta anatómica y confort',
                    'Bolsillos en pecho con cierre, bolsillos laterales pasamanos y bolsillo para metro',
                    'Costuras dobles y triples en zonas de alto esfuerzo'
                ],
                'specs' => [
                    'Material' => 'Drill 100% Algodón pesado (8 a 10 oz) / Opcional ignífugo',
                    'Cintas Reflectivas' => '3M Scotchlite 8910 de 2 pulgadas o textil plata homologado',
                    'Cierre' => 'Cremallera reforzada doble sentido con tapa de seguridad',
                    'Colores' => 'Azul Marino, Naranja Rescate, Azul Rey, Rojo, Gris Plomo',
                    'Tallas' => 'S, M, L, XL, XXL, XXXL'
                ],
                'colors' => ['Azul Marino', 'Naranja', 'Azul Rey', 'Rojo'],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'image' => '/images/products/mameluco-industrial-drill.jpg',
                'gallery' => [
                    '/images/products/mameluco-industrial-drill.jpg'
                ],
                'badge' => 'Minería & Construcción • 360° Reflectivo',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['casacas-ropa-termica']->id,
                'name' => 'Casaca Térmica e Impermeable Minera Acolchada',
                'slug' => 'casaca-termica-impermeable-minera-acolchada',
                'sku' => 'ETX-CSK-08',
                'short_description' => 'Casaca técnica con forro térmico acolchado, membrana impermeable y cintas reflectivas para zonas de frío extremo.',
                'description' => 'Prenda técnica de abrigo diseñada para soportar las temperaturas extremas de los andes y campamentos mineros por encima de los 4,000 m.s.n.m. Exterior confeccionado en tela impermeable Taslan o Oxford con recubrimiento de poliuretano, interior con fibra térmica siliconada de 200 gramos y forro polar micropolar antialérgico. Incorpora cintas reflectivas termoselladas de 5 cm de visibilidad 360°.',
                'features' => [
                    'Membrana exterior impermeable y cortavientos con costuras termoselladas',
                    'Relleno térmico siliconado ultra liviano y forro polar cálido',
                    'Capucha ajustable y desmontable con cordón elástico',
                    'Cintas reflectivas 3M en pecho, espalda y mangas',
                    'Bolsillos internos seguros para celular/documentos y bolsillos calientamanos'
                ],
                'specs' => [
                    'Exterior' => 'Oxford 300D / Taslan impermeable 3000 mm H2O',
                    'Relleno' => 'Guata siliconada 200 gr/m² + Polar interior',
                    'Reflectivo' => 'Cinta reflectiva plata de 50 mm resistente a bajas temperaturas',
                    'Colores' => 'Azul Marino con Naranja, Negro con Amarillo Neón, Azul Marino completo',
                    'Tallas' => 'S, M, L, XL, XXL'
                ],
                'colors' => ['Azul Marino con Naranja', 'Negro con Amarillo Neón', 'Azul Marino'],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'image' => '/images/products/casaca-termica-impermeable-minera.jpg',
                'gallery' => [
                    '/images/products/casaca-termica-impermeable-minera.jpg'
                ],
                'badge' => 'Térmica & Impermeable • Alto Frío',
                'is_featured' => false,
            ],
            [
                'category_id' => $categoryModels['epp-seguridad']->id,
                'name' => 'Kit de Protección Personal EPP Completo',
                'slug' => 'kit-proteccion-personal-epp-completo',
                'sku' => 'ETX-EPP-09',
                'short_description' => 'Pack de seguridad: Casco normado con arnés de 4 puntos, guantes de badana/nitrilo, lentes de policarbonato y tapones auditivos.',
                'description' => 'Solución integral de protección personal para dotación inmediata a nuevos colaboradores en proyectos de obra, talleres y operaciones industriales. Incluye elementos certificados bajo normas internacionales ANSI y CE para garantizar la integridad física del trabajador frente a riesgos mecánicos, impactos y deslumbramiento.',
                'features' => [
                    'Casco de seguridad de alta densidad dieléctrico Clase E con suspensión ajustable',
                    'Lentes de policarbonato con tratamiento antiempañante y filtro UV 400',
                    'Guantes de cuero badana seleccionada o nitrilo anticorte para maniobra segura',
                    'Tapones auditivos de espuma viscoelástica reutilizables con cordón',
                    'Certificaciones ANSI Z89.1, ANSI Z87.1 y CE EN 388'
                ],
                'specs' => [
                    'Normas' => 'ANSI Z89.1 (Cascos) / ANSI Z87.1 (Lentes) / EN 388 (Guantes)',
                    'Presentación' => 'Pack individual en bolsa sellada o por mayor en cajas de 50 unidades',
                    'Colores de Casco' => 'Blanco, Amarillo, Azul, Rojo, Verde, Naranja',
                    'Garantía' => 'Certificado de calidad del fabricante y ficha técnica oficial'
                ],
                'colors' => ['Blanco', 'Amarillo', 'Azul', 'Naranja'],
                'sizes' => ['Estándar regulable'],
                'image' => '/images/products/kit-proteccion-personal-epp.jpg',
                'gallery' => [
                    '/images/products/kit-proteccion-personal-epp.jpg'
                ],
                'badge' => 'Certificación ANSI • Entrega Inmediata',
                'is_featured' => false,
            ]
        ];

        foreach ($products as $prod) {
            Product::firstOrCreate(['slug' => $prod['slug']], $prod);
        }

        // 3. Blog Posts
        $posts = [
            [
                'title' => 'Guía de Selección de Ropa de Alta Visibilidad: Normas ANSI y NTP en Perú',
                'slug' => 'guia-seleccion-ropa-alta-visibilidad-normas-ansi-ntp-peru',
                'summary' => 'Conozca las diferencias entre las clases de visibilidad diurna y nocturna, el tipo de cinta reflectiva recomendado y las obligaciones normativas para empresas.',
                'content' => "En sectores como minería, construcción y logística, la ropa de alta visibilidad es la primera línea de defensa para prevenir accidentes mortales por atropello o falta de visión en condiciones de baja luminosidad.\n\n### 1. ¿Qué exige la normativa peruana?\nLa Norma Técnica Peruana (NTP) y el estándar internacional ANSI/ISEA 107 establecen tres clases de prendas:\n- **Clase 1:** Para entornos donde la velocidad vehicular no supera los 40 km/h y el trabajador cuenta con separación física del tráfico.\n- **Clase 2:** Obligatoria para personal de construcción en vías, operadores de maquinaria y personal de almacén con movimiento constante de montacargas. Requiere al menos 0.13 m² de material de fondo fluorescente y 0.05 m² de material retrorreflectante.\n- **Clase 3:** Nivel máximo para personal en carreteras de alta velocidad o faenas nocturnas extremas. Requiere chalecos o polos de manga larga con reflectivos continuos en extremidades y torso.\n\n### 2. Cuidado de las Cintas Reflectivas\nPara prolongar la vida útil de los reflectivos 3M, evite el uso de lejía o cloro y lave las prendas al revés con detergentes neutros y secado a la sombra.",
                'author' => 'Ing. Textil & Seguridad EUTEX',
                'category' => 'Normativa & Seguridad',
                'image' => '/images/eutex/chalecos_seguridad.png',
                'read_time' => '5 min',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Algodón Peinado vs Algodón Cardado: ¿Por qué influye en la durabilidad del uniforme?',
                'slug' => 'algodon-peinado-vs-cardado-durabilidad-uniforme-industrial',
                'summary' => 'Descubra por qué el tipo de hilado define la resistencia a las motas (pilling), la firmeza del color y la comodidad de su personal en campo.',
                'content' => "Cuando una empresa adquiere uniformes industriales en volumen, el costo por uso es el factor más determinante. Un polo económico que pierde su forma tras 5 lavadas termina costando el doble que una prenda confeccionada con algodón peinado de calidad superior.\n\n### El Proceso de Peinado\nEl hilado peinado pasa por una fase mecánica adicional donde se eliminan las fibras cortas e impurezas del algodón, dejando únicamente las fibras largas y alineadas. Esto genera:\n- Cero desprendimiento de motas o pelusas.\n- Mayor resistencia a la tracción y rozamiento continuo.\n- Superficie lisa y uniforme ideal para estampados nítidos y bordados que no se deforman.\n\nEn **EUTEX**, confeccionamos nuestros polos industriales con algodón 100% peinado 24/1 y 30/1 directamente en nuestros talleres de Gamarra.",
                'author' => 'Área de Calidad Textil EUTEX',
                'category' => 'Calidad Textil',
                'image' => '/images/eutex/polos_manga_larga.png',
                'read_time' => '4 min',
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Jeans Industriales de 14 oz: Resistencia y Protección en Faenas Exigentes',
                'slug' => 'jeans-industriales-14oz-resistencia-proteccion-faenas-exigentes',
                'summary' => 'Por qué el denim pesado con triple costura y cinta reflectiva se ha convertido en el estándar de seguridad para minería y metalmecánica.',
                'content' => "El pantalón jean no es solo una prenda de vestir; en el entorno industrial es un equipo de protección contra astillas metálicas, calor moderado, fricción con herramientas y abrasión del terreno.\n\n### Características clave de un Jean Industrial:\n1. **Gramaje de 14 Onzas:** Densidad requerida para resistir el trato rudo sin rasgarse.\n2. **Triple Costura de Cadeneta:** Las uniones en entrepierna y laterales deben resistir flexiones forzadas sin descoserse.\n3. **Cintas Reflectivas de Alta Visibilidad:** Aplicadas a 5 cm de la rodilla para señalizar la posición del trabajador en túneles o talleres oscuros.\n\nEn **EUTEX** personalizamos los pantalones con la medida y cintas que su empresa requiera.",
                'author' => 'Equipo Técnico EUTEX',
                'category' => 'Equipos de Trabajo',
                'image' => '/images/eutex/jeans_industriales.png',
                'read_time' => '6 min',
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($posts as $p) {
            BlogPost::firstOrCreate(['slug' => $p['slug']], $p);
        }

        // 4. Default Site Settings
        SiteSetting::set('contact_phone', '920 783 202', 'contacto');
        SiteSetting::set('contact_whatsapp', '920783202', 'contacto');
        SiteSetting::set('contact_whatsapp_text', 'Hola EUTEX, deseo información y cotización de uniformes industriales.', 'contacto');
        SiteSetting::set('contact_email', 'eutex@ventas.com', 'contacto');
        SiteSetting::set('contact_address', 'Gamarra, La Victoria, Lima - Perú', 'contacto');
        SiteSetting::set('contact_schedule', 'Lunes a Sábado: 8:00 AM - 7:00 PM', 'contacto');
        SiteSetting::set('contact_maps_url', 'https://maps.google.com/?q=Gamarra+La+Victoria+Lima', 'contacto');

        SiteSetting::set('home_banners', [
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
            ]
        ], 'home');

        SiteSetting::set('nosotros_title', 'EUTEX: Pasión y Calidad en Confección Textil Industrial', 'nosotros');
        SiteSetting::set('nosotros_story', "Con más de una década en el emporio comercial de Gamarra, EUTEX se ha consolidado como fabricante líder de uniformes industriales, ropa de trabajo pesado y dotaciones para minería, hidrocarburos, construcción y logística.\n\nNuestros talleres propios en Gamarra, La Victoria cuentan con maquinaria de última generación para patronaje, corte de precisión, confección con costura de cadeneta reforzada y bordado computarizado.", 'nosotros');
        SiteSetting::set('nosotros_mission', 'Proteger y uniformar al trabajador peruano con prendas duraderas, seguras y de máxima comodidad, brindando precios directos de fábrica sin intermediarios.', 'nosotros');
        SiteSetting::set('nosotros_vision', 'Ser la empresa referente nacional e internacional en fabricación y distribución de uniformes técnicos industriales y corporativos.', 'nosotros');
        SiteSetting::set('nosotros_experience_years', '10+', 'nosotros');
        SiteSetting::set('nosotros_completed_orders', '50,000+', 'nosotros');
        SiteSetting::set('nosotros_corporate_clients', '250+', 'nosotros');
        SiteSetting::set('nosotros_satisfaction_rate', '99.8%', 'nosotros');
        SiteSetting::set('nosotros_image', '/images/eutex/tarjeta_contacto.png', 'nosotros');
    }
}
