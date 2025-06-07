<?php

namespace App\Http\Controllers;

use App\Models\Reto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class RetoController extends Controller
{
    /**
     * Display the reto-30dias page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Obtener el reto activo del usuario si existe (basado en la sesión o cookie)
        $reto = null;
        $email = session('user_email');
        
        if ($email) {
            $reto = Reto::where('correo', $email)
                ->where('completado', false)
                ->orderBy('created_at', 'desc')
                ->first();
                
            if ($reto) {
                // Calcular el progreso basado en los días transcurridos
                $fechaInicio = Carbon::parse($reto->fecha_inicio);
                $fechaFin = Carbon::parse($reto->fecha_fin);
                $hoy = Carbon::now();
                
                // Si aún no ha comenzado, progreso es 0
                if ($hoy->lt($fechaInicio)) {
                    $reto->progreso = 0;
                } 
                // Si ya terminó, progreso es 100
                elseif ($hoy->gte($fechaFin)) {
                    $reto->progreso = 100;
                } 
                // En progreso
                else {
                    $totalDias = $fechaInicio->diffInDays($fechaFin);
                    $diasTranscurridos = $fechaInicio->diffInDays($hoy);
                    $reto->progreso = round(($diasTranscurridos / $totalDias) * 100);
                }
                
                // Formatear el objetivo para mostrar
                $reto->objetivo_formateado = strtoupper(str_replace('_', ' ', $reto->objetivo));
            }
        }
        
        return view('reto-30dias', compact('reto'));
    }

    /**
     * Process the form submission and redirect to reto-30dias page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'ciudad' => 'required|string|max:255',
            'altura' => 'required|numeric|min:100|max:250',
            'peso' => 'required|numeric|min:30|max:200',
            'objetivo' => 'required|string|max:255',
            'terminos' => 'required',
        ]);
    
        $retoData = $validatedData;
        $retoData['terminos'] = true;
        $retoData['fecha_inicio'] = Carbon::now();
        $retoData['fecha_fin'] = Carbon::now()->addDays(30);
    
        try {
            $reto = Reto::create($retoData);
    
            session(['user_email' => $request->correo]);
            session(['objetivo' => $request->objetivo]);
    
            return redirect()->route('reto-30dias')
                ->with('success', '¡Te has inscrito exitosamente al reto de 30 días!');
        } catch (QueryException $e) {
            // Enviar correo con el error
            Mail::raw('Error al registrar usuario: ' . $e->getMessage(), function ($message) {
                $message->to('tu-email@dominio.com')
                        ->subject('Error en inscripción al reto');
            });
    
            // Redirigir con mensaje de error
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Ocurrió un error al procesar tu inscripción. Por favor intenta de nuevo.']);
        }
    }

    /**
     * Display a listing of all retos (admin function).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $retos = Reto::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.retos.index', compact('retos'));
    }

    /**
     * Show the form for editing the specified reto (admin function).
     *
     * @param  \App\Models\Reto  $reto
     * @return \Illuminate\View\View
     */
    public function edit(Reto $reto)
    {
        return view('admin.retos.edit', compact('reto'));
    }

    /**
     * Update the specified reto in storage (admin function).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reto  $reto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Reto $reto)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'ciudad' => 'required|string|max:255',
            'altura' => 'required|numeric|min:100|max:250',
            'peso' => 'required|numeric|min:30|max:200',
            'objetivo' => 'required|string|max:255',
            'completado' => 'boolean',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after:fecha_inicio',
            'notas' => 'nullable|string',
        ]);

        $reto->update($validatedData);

        return redirect()->route('admin.retos.index')
            ->with('success', 'Reto actualizado exitosamente.');
    }

    /**
     * Remove the specified reto from storage (admin function).
     *
     * @param  \App\Models\Reto  $reto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reto $reto)
    {
        $reto->delete();

        return redirect()->route('admin.retos.index')
            ->with('success', 'Reto eliminado exitosamente.');
    }
}