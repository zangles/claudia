<div class="col-lg-4 patientCard">
    <div class="contact-box">
        <a href="{{ route('patient.edit', $patient) }}">
            <div class="col-md-4 hidden-xs hidden-sm ">
                <div class="text-center ">
                    <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ asset('img/profile.png') }}">
                    <div class="m-t-xs font-bold"></div>
                </div>
            </div>
            <div class="col-md-8">
                <h3><strong>{{ $patient->name }}</strong></h3>
                <h3 class="patientName hidden"><strong>{{ strtoupper($patient->name) }}</strong></h3>
                <p><i class="fa fa-phone"></i> {{ $patient->phone }} </p>
                <address>
                    <strong>Edad: </strong>{{ $patient->age }}<br>
                    <strong>Peso: </strong>{{ $patient->getWeight() }} kg<br>
                    <strong>Altura: </strong>{{ $patient->getHeight() }} cm<br>
                    <strong>Email: </strong>{{ $patient->email }}<br>
                </address>
            </div>
            <div class="clearfix"></div>
        </a>
    </div>
</div>