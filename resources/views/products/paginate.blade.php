<div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Price</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                              
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }} TND</td>
                                <td><a class="button is-primary" href="{{ route('products.show', $product->id) }}">Voir</a></td>
                                <td><a class="button is-warning" href="{{ route('products.edit', $product->id) }}">Modifier</a></td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                  <footer class="card-footer">
                   {{ $products->links() }}
                </footer>