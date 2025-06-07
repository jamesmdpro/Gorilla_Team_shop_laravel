<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:1000',
            'source' => 'nullable|string|max:50'
        ]);

        try {
            DB::beginTransaction();

            Lead::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'source' => $request->source ?? 'contact_form',
                'status' => 'new'
            ]);

            DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => '¡Gracias por contactarnos! Te responderemos pronto.'
                ]);
            }

            return redirect()->back()->with('success', '¡Gracias por contactarnos! Te responderemos pronto.');

        } catch (\Exception $e) {
            DB::rollback();

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al enviar el mensaje. Inténtalo de nuevo.'
                ], 500);
            }

            return redirect()->back()->with('error', 'Error al enviar el mensaje. Inténtalo de nuevo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        return view('admin.leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:1000',
            'status' => 'required|in:new,contacted,converted,lost'
        ]);

        try {
            DB::beginTransaction();

            $lead->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'status' => $request->status
            ]);

            DB::commit();

            return redirect()->route('leads.show', $lead)->with('success', 'Lead actualizado correctamente.');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al actualizar el lead.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        try {
            $lead->delete();
            return redirect()->route('leads.index')->with('success', 'Lead eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el lead.');
        }
    }

    /**
     * Update lead status
     */
    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,converted,lost'
        ]);

        try {
            $lead->update(['status' => $request->status]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Estado actualizado correctamente.'
                ]);
            }

            return redirect()->back()->with('success', 'Estado actualizado correctamente.');

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al actualizar el estado.'
                ], 500);
            }

            return redirect()->back()->with('error', 'Error al actualizar el estado.');
        }
    }
}