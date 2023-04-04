<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms=ContactForm::all();
        $data=["forms"=>$forms,"recursos"=>[]];
      //  return $data;
        return view("contactForm",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //return $r;
        $f = new ContactForm();
        $f->nombre=$r->nombre;
        $f->email=$r->email;
        $f->telefono=$r->telefono;
        $f->contenido=$r->contenido;
        $f->save();
        return response()->json([
            'message' => 'Fromulario enviado con exito',
            'data' => $f,
            'status' => 200,
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function show(ContactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactForm $contactForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactForm $contactForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = ContactForm::find($id);
        $c->delete();
        return response()->json([
            'message' => 'Contacto Elimando con exito',
            'data' => [],
            'status' => 200,
        ],200);
    }
}
