<x-app-layout>

    @section('addt_styles')
        <style>
            #smallBusinessNav {
                background-color: #3f51b5 !important;
            }

            #smallBusinessNav a {
                color: white !important;
            }
        </style>
    @endsection

    @section('addt_scripts')
        <script type="text/javascript">
            $('#companyRecruiterNav').remove();
        </script>
    @endsection

    <div id="" class="container-fluid mt-5 pt-5">
        <div class="row my-5 py-5">
            <div class="col-8 text-center mx-auto">
                <h1 class="p-4 red accent-1 white-text">This page is not available. Please go back to previous page or
                    select a viewable page.</h1>
            </div>
        </div>
    </div>
</x-app-layout>

