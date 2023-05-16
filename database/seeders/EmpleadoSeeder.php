<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create([
            'clave' => '0101',
            'nombre' => 'Mariana',
            'apellido_paterno' => 'Arzapalo',
            'apellido_materno' => 'Medina',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Arquitecto 2',
            'sueldo_base' => '16000',
            'modo_pago' => 'Cheque',
            'correo' => 'mariana@mail.com'
        ]);

        Empleado::create([
            'clave' => '0102',
            'nombre' => 'Tadeo',
            'apellido_paterno' => 'Garcia',
            'apellido_materno' => 'Beltran',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Intendente',
            'sueldo_base' => '8000',
            'modo_pago' => 'Transferencia',
            'correo' => 'tadeo@mail.com'
        ]);

        Empleado::create([
            'clave' => '0103',
            'nombre' => 'Angie',
            'apellido_paterno' => 'Lopez',
            'apellido_materno' => 'Quintero',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Arquitecto 1',
            'sueldo_base' => '16000',
            'modo_pago' => 'Efectivo',
            'correo' => 'angie@mail.com'
        ]);

        Empleado::create([
            'clave' => '0104',
            'nombre' => 'Abraham',
            'apellido_paterno' => 'Perez',
            'apellido_materno' => 'Castro',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Diseñador 2',
            'sueldo_base' => '10000',
            'modo_pago' => 'Cheque',
            'correo' => 'abraham@mail.com'
        ]);

        Empleado::create([
            'clave' => '0105',
            'nombre' => 'Luisa',
            'apellido_paterno' => 'Martinez',
            'apellido_materno' => 'Gomez',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Gerente 2',
            'sueldo_base' => '25000',
            'modo_pago' => 'Transferencia',
            'correo' => 'luisa@mail.com'
        ]);

        Empleado::create([
            'clave' => '0106',
            'nombre' => 'Javier',
            'apellido_paterno' => 'Sánchez',
            'apellido_materno' => 'Ruiz',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Diseñador 1',
            'sueldo_base' => '10000',
            'modo_pago' => 'Efectivo',
            'correo' => 'javier@mail.com'
        ]);

        Empleado::create([
            'clave' => '0107',
            'nombre' => 'Carlos',
            'apellido_paterno' => 'Ortega',
            'apellido_materno' => 'Vargas',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Lider de Proyecto',
            'sueldo_base' => '19000',
            'modo_pago' => 'Efectivo',
            'correo' => 'carlos@mail.com'
        ]);

        Empleado::create([
            'clave' => '0108',
            'nombre' => 'Daniela',
            'apellido_paterno' => 'Torres',
            'apellido_materno' => 'Morales',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Desarrollador 2',
            'sueldo_base' => '17000',
            'modo_pago' => 'Cheque',
            'correo' => 'daniela@mail.com'
        ]);

        Empleado::create([
            'clave' => '0109',
            'nombre' => 'Pedro',
            'apellido_paterno' => 'Ramirez',
            'apellido_materno' => 'Cruz',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Desarrollador 1',
            'sueldo_base' => '15000',
            'modo_pago' => 'Transferencia',
            'correo' => 'pedro@mail.com'
        ]);

        Empleado::create([
            'clave' => '0110',
            'nombre' => 'Laura',
            'apellido_paterno' => 'Hernández',
            'apellido_materno' => 'Morales',
            'numero_ss' => '123456789',
            'rfc' => 'RFCUSUARIOPRUEBA',
            'puesto' => 'Gerente 1',
            'sueldo_base' => '26000',
            'modo_pago' => 'Efectivo',
            'correo' => 'laura@mail.com'
        ]);
    }
}
