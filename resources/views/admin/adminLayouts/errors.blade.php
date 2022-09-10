@if (count($errors) > 0)
<h4 class="text-blueGray-600 text-lg font-semibold mx-auto">Please Fix The Errors Bellow</h4>
  @foreach ($errors->all() as $error)
    <div class="mb-0">
        <div class="text-center my-1 bg-red-100 py-2 rounded-md w-2/3 mx-auto">
        <h4 class="text-red-500 text-base font-medium">{{$error}}</h4>
        </div>
    </div>
  @endforeach
  <hr class="mt-6 border-b-1 border-blueGray-300 mx-5" />
@endif