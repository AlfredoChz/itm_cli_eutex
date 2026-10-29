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
                    'Cinta reflectiva de alta visibilidad de 5 cm dispuesta en H en pecho y espalda',
                    'Cierre frontal de alta resistencia tipo tractor para apertura rápida y duradera',
                    'Bolsillos funcionales con tapa, fuelles y porta-lapiceros integrados',
                    'Aro porta-fotocheck / radio D-ring metálico o reforzado',
                    'Confeccionado en tela drill o gabardina con costuras de seguridad'
                ],
                'specs' => [
                    'Material' => 'Drill San Jacinto / Oxford impermeable de alto tráfico',
                    'Reflectivo' => 'Cinta reflectiva 3M / Textil gris plata de 50 mm (ANSI 107 Class 2)',
                    'Cierre' => 'Cremallera tipo tractor nylon #5 de alta durabilidad',
                    'Bolsillos' => '4 bolsillos inferiores con tapa + 2 superiores porta-objetos y lapicero',
                    'Colores' => 'Naranja (Alta visibilidad), Amarillo Neón, Azul Marino, Negro',
                    'Normativa' => 'Cumplimiento ANSI/ISEA 107-2020 y Norma Técnica Peruana'
                ],
                'colors' => ['Naranja', 'Amarillo Neón', 'Azul Marino', 'Negro'],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'image' => '/images/products/chaleco-seguridad-geologo.jpg',
                'gallery' => [
                    '/images/products/chaleco-seguridad-geologo.jpg',
                    '/images/eutex/chalecos_seguridad.png'
                ],
                'badge' => 'Norma ANSI 107 • Alta Visibilidad',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['pantalones-jeans']->id,
                'name' => 'Pantalón Jean Industrial 14 oz con Cinta Reflectiva',
                'slug' => 'pantalon-jean-industrial-14oz-cinta-reflectiva',
                'sku' => 'ETX-JIN-03',
                'short_description' => 'Jean de trabajo en denim 100% algodón de 14 oz con cintas reflectivas en piernas y triple costura de seguridad.',
                'description' => 'Pantalón vaquero industrial diseñado para faenas exigentes en minería, metalmecánica, construcción civil y mantenimiento. Elaborado en tejido denim rígido de 14 onzas 100% algodón de alta resistencia a la abrasión y chispas. Equipado con cintas reflectivas de 2 pulgadas homologadas a la altura de la rodilla con visibilidad 360 grados. Posee pretina reforzada con 7 pasadores resistentes, cremallera metálica de bronce, botón remachado y bolsillos profundos con remaches de seguridad en zonas de tensión.',
                'features' => [
                    'Cinta reflectiva gris de alta visibilidad 3M en ambas piernas (visibilidad 360°)',
                    'Cintura con botón metálico indestructible y cierre de bronce reforzado',
                    'Bolsillos delanteros profundos con forro de drill reforzado',
                    'Bolsillos posteriores amplios con doble pespunte',
                    'Triple costura de cadeneta en laterales y entrepierna para evitar desgarros'
                ],
                'specs' => [
                    'Tejido' => 'Denim 14 Onzas (100% Algodón pesado prelavado)',
                    'Reflectivo' => 'Cinta microprismática / textil de 2 pulgadas resistente al lavado',
                    'Costuras' => 'Costura triple reforzada en entrepierna con hilo de poliéster calibre 20/3',
                    'Herrajes' => 'Botón metálico de golpe y remaches de refuerzo en bolsillos',
                    'Tallas' => '28, 30, 32, 34, 36, 38, 40, 42',
                    'Aplicación' => 'Operaciones mineras, hidrocarburos, construcción y talleres'
                ],
                'colors' => ['Azul Denim Clásico', 'Azul Índigo Oscuro'],
                'sizes' => ['28', '30', '32', '34', '36', '38', '40', '42'],
                'image' => '/images/products/pantalon-jean-industrial-14oz.jpg',
                'gallery' => [
                    '/images/products/pantalon-jean-industrial-14oz.jpg',
                    '/images/eutex/jeans_industriales.png'
                ],
                'badge' => 'Denim 14 oz • Triple Costura',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['pantalones-jeans']->id,
                'name' => 'Pantalón Cargo Industrial Drill con Cinta Reflectiva',
                'slug' => 'pantalon-cargo-industrial-drill-cinta-reflectiva',
                'sku' => 'ETX-PCG-04',
                'short_description' => 'Pantalón cargo en drill pesado con 6 bolsillos y cinta reflectiva 3M en botapié para faena industrial.',
                'description' => 'Pantalón de trabajo multipropósito con corte ergonómico que facilita la movilidad. Confeccionado en tela drill pesado San Jacinto 100% algodón o mezcla ripstop de máxima resistencia. Incluye 6 bolsillos estratégicamente ubicados: 2 frontales diagonales, 2 posteriores con tapa y 2 laterales tipo fuelle con broches de seguridad. Botapiés con cintas reflectivas de 2 pulgadas.',
                'features' => [
                    '6 bolsillos utilitarios con tapas y velcros de ajuste seguro',
                    'Cinta reflectiva homologada de 2 pulgadas en ambas pantorrillas',
                    'Refuerzo doble en fondillo y rodillas para máxima durabilidad',
                    'Tela drill de alta resistencia al desgarro y fricción constante',
                    'Pretina con pasadores anchos para cinturón de seguridad o herramientas'
                ],
                'specs' => [
                    'Tela' => 'Drill Tecnología 100% Algodón o Ripstop (260 gr/m²)',
                    'Reflectivo' => 'Banda reflectiva gris plata de 5 cm de alta visibilidad',
                    'Colores' => 'Azul Marino, Azul Rey, Negro, Verde Militar, Caqui',
                    'Tallas' => '28 a 42',
                    'Certificación' => 'Cumple especificaciones de seguridad industrial para contratistas'
                ],
                'colors' => ['Azul Marino', 'Azul Rey', 'Negro', 'Caqui'],
                'sizes' => ['28', '30', '32', '34', '36', '38', '40'],
                'image' => '/images/products/pantalon-cargo-industrial-drill.jpg',
                'gallery' => [
                    '/images/products/pantalon-cargo-industrial-drill.jpg',
                    '/images/eutex/jeans_industriales.png'
                ],
                'badge' => '6 Bolsillos • Drill Pesado',
                'is_featured' => true,
            ],
            [
                'category_id' => $categoryModels['polos-industriales']->id,
                'name' => 'Polo Manga Larga de Alta Visibilidad con Reflectivo',
                'slug' => 'polo-manga-larga-alta-visibilidad-reflectivo',
                'sku' => 'ETX-PAV-05',
                'short_description' => 'Polo manga larga color naranja o amarillo fluorescente con cintas reflectivas para máxima visibilidad en vía y mina.',
                'description' => 'Prenda técnica de alta visibilidad diseñada para personal de tránsito, carreteras, obras viales, minería de tajo abierto y almacenes con tránsito vehicular. Confeccionado en tejido fluorescente con protección solar UPF 50+, combinado con bandas reflectivas segmentadas o continuas para mantener la elasticidad y transpirabilidad.',
                'features' => [
                    'Color fluorescente de alta visibilidad diurna para máxima detección visual',
                    'Bandas reflectivas de 2 pulgadas en torso y mangas para visibilidad nocturna',
                    'Tejido con tecnología transpirable y secado rápido',
                    'Cuello redondo y puños con tejido rib elástico anti-deformación',
                    'Costuras reforzadas con hilo industrial'
                ],
                'specs' => [
                    'Material' => 'Poliéster / Algodón con tecnología Dry-Cool y filtro UPF 50+',
                    'Reflectivo' => 'Cinta reflectiva microesferas de vidrio de alta densidad de luz',
                    'Colores' => 'Naranja Fluorescente, Amarillo Neón',
                    'Tallas' => 'S, M, L, XL, XXL',
                    'Norma' => 'Conforme a ANSI/ISEA 107-2020 Clase 3'
                ],
                'colors' => ['Naranja Neón', 'Amarillo Neón'],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'image' => '/images/products/polo-alta-visibilidad-reflectivo.jpg',
                'gallery' => [
                    '/images/products/polo-alta-visibilidad-reflectivo.jpg',
                    '/images/eutex/polos_manga_larga.png'
                ],
                'badge' => 'Clase 3 • Filtro UPF 50+',
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
                'image' => '/images/eutex/polos_manga_larga.png',
                'title' => 'Polos Manga Larga Industriales en 10 Colores',
                'subtitle' => '100% Algodón peinado de primera calidad, cuello reforzado y puños en rib.',
                'link' => '/productos/polo-manga-larga-industrial-cuello-redondo',
                'link_text' => 'Ver Producto',
                'badge' => 'Más Vendido • 10 Colores',
                'is_active' => true,
            ],
            [
                'image' => '/images/eutex/chalecos_seguridad.png',
                'title' => 'Chalecos de Seguridad y Geólogo de Alta Visibilidad',
                'subtitle' => 'Cintas reflectivas certificadas 3M de 5 cm, multibolsillos y cierre tractor.',
                'link' => '/productos/chaleco-seguridad-tipo-geologo-multibolsillos',
                'link_text' => 'Ver Chaleco',
                'badge' => 'Norma ANSI 107',
                'is_active' => true,
            ],
            [
                'image' => '/images/eutex/jeans_industriales.png',
                'title' => 'Jeans Industriales 14 oz con Triple Costura',
                'subtitle' => 'Denim resistente con cinta reflectiva en piernas para minería y construcción.',
                'link' => '/productos/pantalon-jean-industrial-14oz-cinta-reflectiva',
                'link_text' => 'Ver Jean 14 oz',
                'badge' => 'Denim Pesado 14 oz',
                'is_active' => true,
            ],
            [
                'image' => '/images/eutex/tarjeta_contacto.png',
                'title' => 'Atención Corporativa y Cotizaciones Inmediatas',
                'subtitle' => 'Envíos a todo el Perú, muestras físicas y facturación electrónica.',
                'link' => 'https://wa.me/51920783202?text=Hola%20EUTEX,%20deseo%20informacion',
                'link_text' => 'Contactar Asesor',
                'badge' => 'Atención Inmediata',
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
