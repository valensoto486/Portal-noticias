<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notices')->insert([
            'title' => 'Medellín respira más limpio: Nueva estrategia para reducir la contaminación del aire',
            'description' => 'La Alcaldía de Medellín presentó un ambicioso plan para mejorar la calidad del aire y reducir las emisiones contaminantes. Conozca las medidas que se implementarán para tener una ciudad más verde y saludable.',
            'content' => '
                <p><strong>La Alcaldía de Medellín</strong> ha dado un paso firme hacia la mejora de la calidad del aire con la presentación de un plan ambicioso destinado a reducir las emisiones contaminantes en la ciudad. El objetivo principal de este plan es crear un entorno más saludable para los habitantes, mejorando el bienestar general y contribuyendo a la lucha contra el cambio climático. Según las autoridades, la calidad del aire es uno de los problemas más graves que enfrenta la ciudad, y este proyecto busca abordar de manera efectiva esas dificultades.</p>

                <h2>Medidas para reducir las emisiones</h2>

                <p>El plan contempla diversas acciones que impactarán directamente en la disminución de los contaminantes atmosféricos. Una de las principales estrategias es la <strong>reducción de las emisiones vehiculares</strong>, que actualmente representan una de las mayores fuentes de contaminación. Para lograrlo, la ciudad aumentará la inversión en tecnologías limpias para el transporte público y fomentará el uso de vehículos eléctricos entre la ciudadanía.</p>

                <p>Además, se está considerando la implementación de nuevas normativas que regularán el uso de vehículos altamente contaminantes. Estas medidas incluirán restricciones de circulación durante días críticos y la promoción de revisiones técnicas más rigurosas para asegurar que los autos que circulen en la ciudad cumplan con los estándares ambientales.</p>

                <h2>Fomento del uso de transporte sostenible</h2>

                <p>Otra de las iniciativas claves es la <strong>promoción del transporte sostenible</strong>. Para ello, la Alcaldía ampliará las redes de ciclorrutas y optimizará el servicio de transporte público masivo. De hecho, se planea una renovación de la flota de buses y la construcción de estaciones de bicicletas en puntos estratégicos de la ciudad. Además, se ofrecerán incentivos a quienes opten por alternativas más ecológicas como caminar, andar en bicicleta o usar el sistema de transporte público.</p>

                <h2>Creación de más espacios verdes</h2>

                <p>En cuanto a la infraestructura urbana, se destinarán recursos para la creación y expansión de áreas verdes. Parques, jardines y corredores ecológicos no solo ayudarán a reducir el dióxido de carbono en la atmósfera, sino que también ofrecerán a los ciudadanos espacios de recreación y bienestar.</p>

                <h2>Concientización y educación ambiental</h2>

                <p>La educación también es un pilar importante del plan. Se llevará a cabo una amplia campaña de concientización para informar a la población sobre la importancia de reducir su huella de carbono y adoptar prácticas más sostenibles en la vida diaria. Las escuelas y universidades jugarán un rol fundamental en la implementación de programas educativos centrados en el cuidado del medio ambiente y el uso responsable de los recursos.</p>

                <p>Con este conjunto de acciones, Medellín busca no solo mejorar la calidad del aire, sino también convertirse en un referente de sostenibilidad para otras ciudades del país y la región. La Alcaldía ha dejado claro que este proyecto es solo el comienzo y que el compromiso a largo plazo será clave para lograr una Medellín más verde y habitable para todos.</p>
            ',
            'author' => 'Alcaldía de Medellín',
            'banner_image' => 'resources/images/calidad-aire-medellin.webp',
        ]);

        DB::table('notices')->insert([
            'title' => 'Medellín se expande: Nuevo proyecto de vivienda social beneficiará a miles de familias',
            'description' => 'La ciudad de la eterna primavera sigue creciendo. Un nuevo proyecto de vivienda social ofrecerá soluciones habitacionales a miles de familias, generando un impacto positivo en la calidad de vida de los ciudadanos.',
            'content' => '
                        <p><strong>La ciudad de la eterna primavera</strong>, Medellín, sigue mostrando su crecimiento sostenido, no solo en términos de infraestructura, sino también en su compromiso social con los ciudadanos más vulnerables. Recientemente, se ha dado a conocer un <strong>nuevo proyecto de vivienda social</strong> que ofrecerá soluciones habitacionales a miles de familias en situación de necesidad, generando un impacto positivo en su calidad de vida.</p>

                        <h2>Un proyecto con impacto social</h2>

                        <p>Este nuevo proyecto busca reducir el déficit habitacional que aún afecta a varios sectores de la población, especialmente a aquellos con menores ingresos. A través de esta iniciativa, la Alcaldía de Medellín y varios entes gubernamentales pretenden construir <strong>más de 5.000 viviendas de interés social</strong> distribuidas en diferentes comunas de la ciudad. Se espera que estas unidades no solo proporcionen un techo seguro, sino que también ofrezcan acceso a servicios básicos como agua potable, electricidad y saneamiento.</p>

                        <p>Las familias beneficiarias serán seleccionadas mediante un riguroso proceso de evaluación socioeconómica, asegurando que las viviendas lleguen a quienes más las necesitan. Además, el proyecto incluirá la construcción de <strong>infraestructura complementaria</strong>, como parques, áreas recreativas y equipamientos comunitarios que fomenten el sentido de comunidad y contribuyan al bienestar integral de los residentes.</p>

                        <h2>Diseño moderno y sostenible</h2>

                        <p>El diseño arquitectónico del proyecto ha sido concebido para maximizar el uso de recursos sostenibles. Las nuevas viviendas contarán con <strong>tecnologías ecoeficientes</strong>, como paneles solares para reducir el consumo de energía, sistemas de recolección de agua lluvia y materiales de construcción reciclables, lo que refleja un compromiso con el medio ambiente y la sostenibilidad a largo plazo.</p>

                        <p>Además, la ubicación de estas nuevas viviendas ha sido cuidadosamente planeada para que los residentes tengan fácil acceso a transporte público, colegios, centros de salud y comercios, facilitando así su integración a la vida urbana. Esto es especialmente importante para las familias de bajos recursos, ya que reduce los costos y tiempos de desplazamiento, mejorando su calidad de vida.</p>

                        <h2>Beneficios para la comunidad</h2>

                        <p>Con este proyecto, Medellín no solo busca ofrecer una solución a la falta de vivienda, sino también <strong>fortalecer el tejido social</strong> en las comunidades. Al ofrecer espacios adecuados para la recreación, la educación y el desarrollo comunitario, la Alcaldía está invirtiendo en el bienestar a largo plazo de las familias y en el crecimiento equitativo de la ciudad.</p>

                        <p>Este es solo uno de los muchos proyectos sociales en marcha que buscan hacer de Medellín una ciudad más inclusiva y equitativa. La apuesta por la vivienda social es una pieza clave en la construcción de un futuro más prometedor para todos los ciudadanos.</p>
                    ',
            'author' => 'Alcaldía de Medellín',
            'banner_image' => 'resources/images/vivienda-social-medellin.webp',
        ]);
    }
}
