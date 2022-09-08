<x-app-layout>

    <div class="container" id="clients">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 text-center mx-auto">

                <div class="py-5" id="">

                    <!-- Title -->
                    <h2 class="display-2 text-center">Websites</h2>

                    <!-- Title -->
                    <p class="text-center">Total Websites: {{ $websites->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="">

        <div class="row my-5">

            <div class="col-12 my-4 mx-auto">
                <div class="userNavLinks d-flex justify-content-around">
                    <a href="{{ route('websites.create') }}" class="btn btn-outline-dark-green">Add New Website</a>
                </div>
            </div>

            @foreach($websites as $website)

                <div class="col-12 col-sm-6 col-lg-4 my-4">

                    <!-- Card -->
                    <div class="card card-image"
                         style="background-image: url({{ asset('storage/images/'. $website->logo .'') }});">

                        <!-- Content -->
                        <div
                            class="d-flex align-items-center flex-column text-white text-center rgba-black-strong py-5 px-4">

                            <div class="">
                                <!-- Title -->
                                <h3 class="card-title pt-2"><strong>{{ $website->title }}</strong></h3>

                                <!-- Website Descr/Bio -->
                                <p>{{ $website->description }}</p>
                            </div>

                            <div class="my-3">
                                <a href='/websites/{{ $website->id }}/edit'
                                   class="btn orange darken-1 white-text">Edit</a>
                            </div>
                        </div>
                        <!-- Card content -->
                    </div>
                    <!-- Card -->

                </div>

            @endforeach

        </div>
    </div>

</x-app-layout>
