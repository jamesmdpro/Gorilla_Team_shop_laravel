<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Lead #{{ $lead->id }} - GORILLA TEAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Oxanium', sans-serif; }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Editar Lead #{{ $lead->id }}</h1>
                    <a href="{{ route('leads.show', $lead) }}" class="btn btn-secondary">Cancelar</a>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Editar Información del Lead</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('leads.update', $lead) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre *</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $lead->name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $lead->email) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $lead->phone) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Estado *</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="new" {{ old('status', $lead->status) == 'new' ? 'selected' : '' }}>Nuevo</option>
                                            <option value="contacted" {{ old('status', $lead->status) == 'contacted' ? 'selected' : '' }}>Contactado</option>
                                            <option value="converted" {{ old('status', $lead->status) == 'converted' ? 'selected' : '' }}>Convertido</option>
                                            <option value="lost" {{ old('status', $lead->status) == 'lost' ? 'selected' : '' }}>Perdido</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Mensaje</label>
                                <textarea class="form-control" id="message" name="message" rows="4">{{ old('message', $lead->message) }}</textarea>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Actualizar Lead</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>