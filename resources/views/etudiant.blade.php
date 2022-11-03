@extends("layouts.master")

@section("contenue")

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Liste des étudiants inscrits </h2>
            <p class="lead border-bottom pb-3 mb-4">Information Checkout.</p>
        </div>


        @if((session())->has ("successDelete"))
        <div class="alert alert-success" style="width:60% ;">
            <h4>{{session()->get('successDelete')}}</h4>
        </div>
        @endif


        <table class="table table-bordered table-hover">
            <div class="d-flex justify-content-between mb-1">{{$etudiants->links()}}</div>
            <div class="d-flex justify-content-end mb-4">
                <a href="{{route('etudiant.create')}}" class="btn btn-primary">Ajouter un nouvelle etudiant</a>

                <thead>
                    <tr>
                        <th scope="col">#✨</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Classe</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$etudiant->nom}}</td>
                        <td>{{$etudiant->prenom}}</td>
                        <td>{{$etudiant->classe->libelle}}</td>
                        <td><a href="#" class="btn btn-info">Editer</a>
                            <a href="#" class="btn btn-danger" onclick="if(
                                confirm('voulez-vous vraiment supprimer cet étudiant ?')
                                ){document.getElementById('form-{{$etudiant->id}}').submit()}">Supprimer</a>
                        </td>
                    </tr>
                    <!-- <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr> -->
                <form id="form-{{$etudiant->id}}" method="post" action=" {{route('etudiant.supprimer', ['etudiant'=>$etudiant->id] )}}" >
                    @csrf
                    @method('delete') 
                    <input type="hidden" name="_method" value="delete">
                </form>
                    @endforeach
                </tbody>
                <!-- <form id="form-{{$etudiant->id}}" method="post" action=" {{route('etudiant.supprimer', ['etudiant'=>$etudiant->id] )}}" >
                    @csrf
                    @method('delete') 
                    <input type="hidden" name="_method" value="delete">
                </form> -->
            </div>
        </table>





</div>

@endsection