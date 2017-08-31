{!! Field::text('name'  , old('name'  , $patient->name)         , [ 'label' => 'Nombre' ]) !!}
{!! Field::text('age'   , old('age'   , $patient->age)          , [ 'label' => 'Edad' ]) !!}
{!! Field::text('phone' , old('phone' , $patient->phone)        , [ 'label' => 'Telefono' ]) !!}
{!! Field::text('email' , old('email' , $patient->email)        , [ 'label' => 'Email' ]) !!}
{!! Field::text('weight', old('weight', $patient->getWeight())  , [ 'label' => 'Peso' ] , [ 'inputGroupText' => 'Kg' ]) !!}
{!! Field::text('height', old('height', $patient->getHeight())  , [ 'label' => 'Altura' ] , [ 'inputGroupText' => 'cm' ]) !!}