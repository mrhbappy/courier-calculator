@if (Session::has('success'))
@push('scripts')
<script type="text/javascript">
    var data = "{!!Session::get('success')!!}";
    insertAlert(data);
    </script>
@endpush
@endif

@if (Session::has('unsuccess'))
@push('scripts')
<script type="text/javascript">
    var data = "{!!Session::get('unsuccess')!!}";
    errortAlert(data)
    </script>
@endpush
@endif

@if ($errors->any())
    @push('scripts')
        <script type="text/javascript">
            errortAlert("{{ implode('', $errors->all(':message')) }}")
        </script>
    @endpush
@endif
