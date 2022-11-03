@extends("layouts.master")

@section("contenue")

<div class="container">

    <div class="py-5 text-center">
        <h2>Ajout d'un étudiant </h2>
        <p class="lead border-bottom pb-3 mb-4">Information Edition.</p>
    </div>


    <div class="">

        @if((session())->has ("success"))
        <div class="alert alert-success" style="width:60% ;">
            <h4>{{session()->get('success')}}</h4>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form style="width:65%;" method="POST" action="{{route('etudiant.update', ['etudiant'=>$etudiant->id])}}">
           
                @csrf
                <input type="hidden" name="_method" value="put">
            <div class="form-group mb-3">


                <label for="exampleInputEmail1">Nom de l'etudiant</label>
                <input type="text" class="form-control" name="nom" value="{{$etudiant->nom}}">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="{{$etudiant->prenom}}">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Classe</label>
                <select class="form-control" name="classe_id">

                    <option value=""></option>
                    @foreach($classes as $classe)
                    @if ($classe->id == $etudiant->classe_id)
                    <option value="{{$classe->id}} selected">{{$classe->libelle}}</option>
                    @else
                    <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{route('etudiant')}}" type="submit" class="btn btn-danger">Annuler</a>
        </form>

    </div>
</div>












@endsection