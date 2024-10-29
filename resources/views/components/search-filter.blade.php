<section class="filter-container container my-4">
    <form action="{{ route('forum') }}" method="GET" class="rounded" style="margin-top: 105px; border: 55px solid #ccc; padding: 20px; border-radius: 5px; background-color: #f9f9f9;">
        <div class="row">
            <!-- Búsqueda por título -->
            <div class="col-md-4">
                <label for="title" class="form-label">Buscar por título</label>
                <input type="text" id="title" name="title" class="form-control rounded" placeholder="Título de la noticia" value="{{ request('title') }}">
            </div>
            
            <!-- Filtrar por Autor -->
            <div class="col-md-4">
                <label for="author" class="form-label">Buscar por autor</label>
                <input type="text" id="author" name="author" class="form-control rounded" placeholder="Autor de la noticia" value="{{ request('author') }}">
            </div>

            <!-- Filtrar por Categoría -->
            <div class="col-md-4">
                <label for="created_at" class="form-label">Filtrar por fecha</label>
                <select id="created_at" name="created_at" class="form-control rounded">
                    <option value="">Todas las categorías</option>
                    <option value="Hoy" {{ request('created_at') == '' ? 'selected' : '' }}>Hoy</option>
                    <option value="Ultima semana" {{ request('created_at') == 'ultima semana' ? 'selected' : '' }}>Ultima Semana</option>
                    <option value="Ultimo mes" {{ request('created_at') == 'ultimo mes' ? 'selected' : '' }}>Ultimo mes</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="px-lg-3 py-1 py-lg-1 btn btn-info text-light rounded">Aplicar Busqueda</button>
            </div>
        </div>
    </form>
</section>