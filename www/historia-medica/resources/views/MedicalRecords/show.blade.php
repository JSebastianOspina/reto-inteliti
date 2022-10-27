<x-layout>
    <div class="d-flex justify-content-end">
        <a class="btn btn-dark align-self-end" href="{{route('medicalRecord.index')}}">Ir atras</a>
    </div>
    <div class="d-flex justify-content-center pb-5">
        <div class="card" style="width: 18rem;">

            <div class="card-body">
                <h5 class="card-title">{{$medicalRecord->name}}</h5>
                <p class="card-text">Fecha de nacimiento: {{$medicalRecord->birthDate}}</p>
                <p class="card-text">Edad: {{$medicalRecord->getAge()}}</p>
                <p class="card-text">Sexo: {{$medicalRecord->gender}}</p>
                <p class="card-text">Estatura: {{$medicalRecord->height}}</p>
                <p class="card-text">Peso: {{$medicalRecord->weight}}</p>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Ver recomendación de salud
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{$medicalRecord->getMessage()}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-layout>
