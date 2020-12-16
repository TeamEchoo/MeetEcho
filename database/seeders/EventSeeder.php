<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Event::factory(10)->create();
        $event01 = new Event();

        $event01->title = "Como sobrevivir en Factoria F5";
        $event01->description = "Es el bootcamp mas duro del mundo, con unos instructores que te haran morder el polvo...sobreviviras?";
        $event01->date = date(16/03/2021);
        $event01->type = "Presencial";
        $event01->category = "Supervivencia";
        $event01->capacity = 24;
        $event01->instructor = "Algún Ex-Coder que siga vivo.";
        $event01->link = "http://127.0.0.1:8000/events";
        $event01->highlighted = true;
        $event01->timedOut = false;

        $event01->save();

        $event02 = new Event();

        $event02->title = "Como llegar a formar parte de Echo Team";
        $event02->description = "Todo el mundo quiere ser del mejor equipo, aprende como!";
        $event02->date = date(16/03/2021);
        $event02->type = "Presencial";
        $event02->category = "Superación Personal";
        $event02->capacity = 24;
        $event02->instructor = "Lorena, la nueva Echo";
        $event02->link = "http://127.0.0.1:8000/events";
        $event02->highlighted = true;
        $event02->timedOut = false;

        $event02->save();

        $event03 = new Event();

        $event03->title = "Entender el Polimorfismo";
        $event03->description = "Curso avanzado de alritmos cánticos para lograr alguna cosa que no sirva para nada";
        $event03->date = date(16/03/2021);
        $event03->type = "Presencial";
        $event03->category = "Programación avanzada";
        $event03->capacity = 24;
        $event03->instructor = "E.T.";
        $event03->link = "http://127.0.0.1:8000/events";
        $event03->highlighted = false;
        $event03->timedOut = false;

        $event03->save();

        $event04 = new Event();

        $event04->title = "Ser papa y estudiar en Factoria";
        $event04->description = "Aprenderas a buscar tiempo dentro del propio tiempo, tiempo cuántico";
        $event04->date = date(16/03/2021);
        $event04->type = "Presencial";
        $event04->category = "Supervivencia";
        $event04->capacity = 24;
        $event04->instructor = "Quim";
        $event04->link = "http://127.0.0.1:8000/events";
        $event04->highlighted = false;
        $event04->timedOut = false;

        $event04->save();

        $event05 = new Event();

        $event05->title = "Las entregas de Simplon";
        $event05->description = "Aprenderas a enviar links a la primera, hay un secreto";
        $event05->date = date(16/03/2021);
        $event05->type = "Presencial";
        $event05->category = "Estudios";
        $event05->capacity = 24;
        $event05->instructor = "Vanessa";
        $event05->link = "http://127.0.0.1:8000/events";
        $event05->highlighted = false;
        $event05->timedOut = false;

        $event05->save();

        $event06 = new Event();

        $event06->title = "Presentar una Pildora";
        $event06->description = "Como aprender a sostener el silencio y las miradas perdidas mientras presento esta mierda de pildora que no entiendo ni yo...";
        $event06->date = date(16/03/2021);
        $event06->type = "Presencial";
        $event06->category = "Supervivencia";
        $event06->capacity = 24;
        $event06->instructor = "Quim";
        $event06->link = "http://127.0.0.1:8000/events";
        $event06->highlighted = false;
        $event06->timedOut = false;

        $event06->save();

        $event07 = new Event();

        $event07->title = "Rellenar eventos aleatorios";
        $event07->description = "El arte de inventarte chorradas según van llegando a tu mente";
        $event07->date = date(16/03/2021);
        $event07->type = "Presencial";
        $event07->category = "Artesania";
        $event07->capacity = 24;
        $event07->instructor = "Quim";
        $event07->link = "http://127.0.0.1:8000/events";
        $event07->highlighted = false;
        $event07->timedOut = false;

        $event07->save();

        $event08 = new Event();

        $event08->title = "Going with the Flow";
        $event08->description = "Aprender los primeros pasitos del superior Arte de no planear nada, nunca, never.";
        $event08->date = date(16/03/2021);
        $event08->type = "Presencial";
        $event08->category = "¿?";
        $event08->capacity = 24;
        $event08->instructor = "Equipo Echo";
        $event08->link = "http://127.0.0.1:8000/events";
        $event08->highlighted = true;
        $event08->timedOut = false;

        $event08->save();

        $event09 = new Event();

        $event09->title = "Workchop: Comer mientras los demas presentan Demo";
        $event09->description = "Compartiremos tenicas para que no se note mucho que comemos en clase mientras los otros presentan";
        $event09->date = date(16/03/2021);
        $event09->type = "Presencial";
        $event09->category = "Escaqueo";
        $event09->capacity = 24;
        $event09->instructor = "Carmen Perez";
        $event09->link = "http://127.0.0.1:8000/events";
        $event09->highlighted = false;
        $event09->timedOut = false;

        $event09->save();

        $event10 = new Event();

        $event10->title = "Encuentro de Coders en el Bar de Laura";
        $event10->description = "Nos prepararemos para el evento del año. Que llevar, como vestirse, etc...";
        $event10->date = date(16/03/2021);
        $event10->type = "Presencial";
        $event10->category = "Social";
        $event10->capacity = 24;
        $event10->instructor = "Laura Rodriguez";
        $event10->link = "http://127.0.0.1:8000/events";
        $event10->highlighted = true;
        $event10->timedOut = false;

        $event10->save();

        $event11 = new Event();

        $event11->title = "Viendo juntos The Mandalorian";
        $event11->description = "A quien le apetezca visionar, criticar, y llorar con este drama emotivo";
        $event11->date = date(16/03/2021);
        $event11->type = "Presencial";
        $event11->category = "Emocional";
        $event11->capacity = 24;
        $event11->instructor = "Isma";
        $event11->link = "http://127.0.0.1:8000/events";
        $event11->highlighted = false;
        $event11->timedOut = false;

        $event11->save();
    }
}

