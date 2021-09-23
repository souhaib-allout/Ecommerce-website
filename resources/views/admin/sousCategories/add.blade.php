<x-app-layout>
    <style>

    </style>
    <div class="container-fluid">
        <div class="row">
            <x-admin.sidenavbar/>
            <form method="post" action="{{'/admin/addsouscategories'}}" class="container-fluid col-10 my-5">
                @csrf
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="font-semibold text-xl mb-0 text-gray leading-tight align-items-center"
                        style="font-size:30px;font-weight:600;color: #204f8c">
                        {{ __('Ajouter categorie') }}
                    </h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-1">
                        <x-label for="name" :value="__('Nom')"/>
                    </div>
                    <div class="col-3">
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                 required autofocus/>
                    </div>
                    <div class="col-1">
                        <x-label for="category" :value="__('Categorie')"/>
                    </div>
                    <div class="col-3">
                        <select name="category" class="form-select">
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row mt-5">
                    <div class="col-4">
                        <button class="ml-3 ms-0 btn text-light px-5" style="background-color: #204f8c ;border-radius: 0">
                            {{ __('Ajouter') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
