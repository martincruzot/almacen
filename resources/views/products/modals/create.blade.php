<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <form id="createForm" action="{{ route('products.store') }}" method="post">
            {{ csrf_field() }}

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="name" class="control-label">Nombre</label>
                                <input name="name" type="text" class="form-control" placeholder="Ingrese nombre" required>
                            </div>
                            {{--
                            <div class="form-group has-success">
                                <label for="sale_price" class="control-label">Precio de venta</label>
                                <input name="sale_price" type="number" step="any" min="0" class="form-control" placeholder="Ingrese precio" required>
                            </div>
                            --}}
                            <div class="form-group">
                                <label for="category_id" class="control-label">Categoría</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>

        </form>

    </div>
</div>