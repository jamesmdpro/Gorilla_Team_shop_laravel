<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead #{{ $lead->id }} - GORILLA TEAM</title>
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
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Lead #{{ $lead->id }}</h1>
                    <div>
                        <a href="{{ route('leads.edit', $lead) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Información del Lead</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Datos Personales</h6>
                                <p><strong>Nombre:</strong> {{ $lead->name }}</p>
                                <p><strong>Email:</strong> {{ $lead->email }}</p>
                                <p><strong>Teléfono:</strong> {{ $lead->phone ?? 'No proporcionado' }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Información del Lead</h6>
                                <p><strong>Origen:</strong> {{ ucfirst($lead->source) }}</p>
                                <p><strong>Estado:</strong> 
                                    <span class="badge badge-{{ $lead->status }}">
                                        {{ ucfirst($lead->status) }}
                                    </span>
                                </p>
                                <p><strong>Fecha de registro:</strong> {{ $lead->created_at->format('d/m/Y H:i') }}</p>
                                <p><strong>Última actualización:</strong> {{ $lead->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        @if($lead->message)
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6>Mensaje</h6>
                                    <div class="alert alert-light">
                                        {{ $lead->message }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row mt-4">
                            <div class="col-12">
                                <h6>Cambiar Estado</h6>
                                <form action="{{ route('leads.updateStatus', $lead) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-group" style="max-width: 300px;">
                                        <select name="status" class="form-select">
                                            <option value="new" {{ $lead->status == 'new' ? 'selected' : '' }}>Nuevo</option>
                                            <option value="contacted" {{ $lead->status == 'contacted' ? 'selected' : '' }}>Contactado</option>
                                            <option value="converted" {{ $lead->status == 'converted' ? 'selected' : '' }}>Convertido</option>
                                            <option value="lost" {{ $lead->status == 'lost' ? 'selected' : '' }}>Perdido</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>