<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Leads - GORILLA TEAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Oxanium', sans-serif; }
        .badge-new { background-color: #28a745; }
        .badge-contacted { background-color: #007bff; }
        .badge-converted { background-color: #ffc107; color: #000; }
        .badge-lost { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Gestión de Leads</h1>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Volver al sitio</a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Lista de Leads ({{ $leads->total() }})</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Origen</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($leads as $lead)
                                        <tr>
                                            <td>{{ $lead->id }}</td>
                                            <td>{{ $lead->name }}</td>
                                            <td>{{ $lead->email }}</td>
                                            <td>{{ $lead->phone ?? 'N/A' }}</td>
                                            <td>{{ ucfirst($lead->source) }}</td>
                                            <td>
                                                <span class="badge badge-{{ $lead->status }}">
                                                    {{ ucfirst($lead->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('leads.show', $lead) }}" class="btn btn-sm btn-info">Ver</a>
                                                    <a href="{{ route('leads.edit', $lead) }}" class="btn btn-sm btn-warning">Editar</a>
                                                    <form action="{{ route('leads.destroy', $lead) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No hay leads registrados</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{ $leads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>